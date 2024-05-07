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
}
