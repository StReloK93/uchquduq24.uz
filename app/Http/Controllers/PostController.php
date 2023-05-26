<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use File;
class PostController extends Controller
{
    public function index(){
        return Post::orderBy('created_at', 'desc')->paginate(10);
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


    }

    // update
    public function update(Request $request, $id)
    {


    }

    // delete
    public function destroy($id)
    {

    }
}
