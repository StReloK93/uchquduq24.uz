<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use App\Library\Library;
use File;
use DB;
use Image;
class PostController extends Controller
{
    public function index(){
        return Post::orderBy('created_at', 'desc')->paginate(9);
    }

    public function random(){
        return Post::where('post_type', 'photo')->inRandomOrder()->limit(5)->get();
    }

    public function show($id){
        return Post::find($id);
    }

    // create
    public function store(Request $request)
    {
        $post = Post::create([
            'post_name' => $request->name,
            'post_desc' => $request->description,
            'post_type' => 'photo',
            'post_img' => 'strelok',
            'created_at' => $request->created_at,
        ]);

        $images = Library::createImages($request->images, $post->id);

        foreach ($images as $key => $image) {
            PostImage::create([
                'post_id' => $post->id,
                'src' => $image,
            ]);
        }

        return $post->fresh();
    }

    // update
    public function update(Request $request, $id)
    {

        $post = Post::find($id);

        $post->post_name = $request->name;
        $post->post_desc = $request->description;
        $post->created_at = $request->created_at;
        $post->save();
        // Images
        if($request->images){
            $images = PostImage::where('post_id', $post->id)->whereNotIn('id', $request->images)->get();

            foreach ($images as $key => $image) {
                Library::clearImgFile($image->src);
            }
            PostImage::where('post_id', $post->id)->whereNotIn('id', $request->images)->delete();
        }
        else{
            $images = PostImage::where('post_id', $post->id)->get();
            foreach ($images as $key => $image) {
                Library::clearImgFile($image->src);
            }
            PostImage::where('post_id', $post->id)->delete();
        }

        if($request->imgs){
            $imgs = Library::createImages($request->imgs, $id);
            foreach ($imgs as $key => $image) {
                PostImage::create([
                    'post_id' => $post->id,
                    'src' => $image,
                ]);
            }
        }

        return $post->fresh();
    }

    // delete
    public function destroy($id)
    {
        $post = Post::find($id);

        foreach ($post->images  as $key => $img) {
            Library::clearImgFile($img->src);
        }

        $post->delete();
    }
}
