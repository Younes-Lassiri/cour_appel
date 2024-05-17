<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;

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
                $imagePath = $image->store('posts_images', 'public');
                Image::create([
                    'image' => $imagePath,
                    'post_id' => $newPost->id
                ]);
            }
        }
        return redirect()->route('dashboard')->with('addedPost','تم إضافة المنشور بنجاح');
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
        $posts = Post::get();
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

    
}
