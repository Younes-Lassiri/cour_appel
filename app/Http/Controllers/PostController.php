<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function addPost(Request $request)
{
    $tag = isset($request->tag) && $request->tag === 'قسم الأخبار' ? 'news' : 'report';
    $request->validate([
        'title' => 'required',
        'tag' => 'required'
    ]);
    $post = [
        'title' => $request->title,
        'description' => $request->description,
        'tag' => $tag,
    ];
    $newPost = Post::create($post);
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images_posts'), $imageName);
            Image::create([
                'image' => 'images_posts/' . $imageName,
                'post_id' => $newPost->id
            ]);
        }
    }
    return redirect()->route('dashboard')->with('addedPost', 'تم إضافة المنشور بنجاح');
}


    public function detailPost(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $relatedPosts = Post::where('tag', $post->tag)->get();
        return view('detailsPost', compact('post', 'relatedPosts'));
    }

    public function categorie(Request $request)
    {
        $months = [
            "Jan", 
            "Feb", 
            "Mar", 
            "Apr", 
            "May", 
            "Jun",
            "Jul", 
            "Aug", 
            "Sep", 
            "Oct", 
            "Nov", 
            "Dec"
        ];
        $categorie = $request->categorie;

        $posts = Post::where('tag', $categorie)->get();
        return view('post-galerie', compact('posts', 'categorie', 'months'));
    }

    public function postsIndex()
    {
        $posts = Post::withTrashed()->get();
        $months = [
            "Jan", 
            "Feb", 
            "Mar", 
            "Apr", 
            "May", 
            "Jun",
            "Jul", 
            "Aug", 
            "Sep", 
            "Oct", 
            "Nov", 
            "Dec"
        ]; 
        return view('gestionPosts', compact('posts', 'months'));
    }
    public function delete(Request $request)
    {
        $post = Post::findOrFail($request->id);

        $deleted = $post->delete();
        return redirect()->route('gestionPosts')->with('deletePost','تم حذف المنشور بنجاح');
    }

    public function postEditBlade(Request $request)
    {
        $post = Post::findOrFail($request->id);

        return view('editPost', compact('post'));
    }
    public function postUpdate(Request $request)
{
    $post = Post::findOrFail($request->id);
    $tag = isset($request->tag) && $request->tag === 'قسم الأخبار' ? 'news' : 'report';

    $request->validate([
        'title' => 'required',
        'tag' => 'required'
    ]);

    $updatedPost = [
        'title' => $request->title,
        'description' => $request->description,
        'tag' => $tag,
    ];
    $post->update($updatedPost);

    if ($request->hasFile('images')) {
        $post->images()->delete();
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('posts_images', 'public');
            $post->images()->create([
                'image' => $imagePath,
                'post_id' => $post->id,
            ]);
        }
    }
    return redirect()->route('gestionPosts')->with('updatePost','تم تعديل المنشور بنجاح');

}

    public function restore(Request $request)
    {
        $post = Post::withTrashed()->findOrFail($request->id);
        $post->restore();
        return redirect()->route('gestionPosts')->with('restore', 'تم استرجاع المنشور بنجاح');
    }

    public function force(Request $request)
{
    $post = Post::withTrashed()->findOrFail($request->id);
    
    DB::table('images')->where('post_id', $post->id)->delete();
    $post->forceDelete();
    return redirect()->route('gestionPosts')->with('force', 'تم الحذف النهائي للمنشور بنجاح');
}


    
}
