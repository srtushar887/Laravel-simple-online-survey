<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\post_comment;
use App\Models\post_like;
use App\Models\survey_question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserPostController extends Controller
{
    public function create_post()
    {
        return view('user.post.createPost');
    }

    public function create_post_save(Request $request)
    {
        $new_post = new survey_question();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().uniqid().'.'."jpeg";
            $directory = 'assets/admin/images/survey/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_post->image = $imgUrl;
        }

        $new_post->user_type = 2;
        $new_post->user_id = Auth::user()->id;
        $new_post->title = $request->title;
        $new_post->question = $request->question;
        $new_post->save();

        return back()->with('success','Survey Question Successfully Created');
    }


    public function post_details($id)
    {
        $post_details = survey_question::where('id',$id)->first();
        $post_cmments = post_comment::where('post_id',$id)->orderBy('id','desc' )->paginate(10);
        return view('user.post.postDetails',compact('post_details','post_cmments'));
    }



    public function post_like_save(Request $request)
    {
        $post = survey_question::where('id',$request->postid)->first();
        $exists_post = post_like::where('user_id',Auth::user()->id)
            ->where('post_id',$request->postid)
            ->where('user_type',2)
            ->count();


        if ($exists_post > 0) {
            return 'alreadylike';
        }else{
            if ($post->user_type == 2 && $post->user_id == Auth::user()->id) {
                return 'mypost';
            }else{
                $new_post_like = new post_like();
                $new_post_like->user_id = Auth::user()->id;
                $new_post_like->post_id = $request->postid;
                $new_post_like->user_type = 2;
                $new_post_like->save();

                return 'postlike';
            }
        }

    }


    public function post_comment_save(Request $request)
    {

        $exists_comment = post_comment::where('user_id',Auth::user()->id)
            ->where('post_id',$request->post_id_comment)->count();


        if ($exists_comment > 0) {
            return back()->with('alert','You already comment this post');
        }else{
            $new_comment = new post_comment();
            $new_comment->user_id = Auth::user()->id;
            $new_comment->post_id = $request->post_id_comment;
            $new_comment->user_type = 2;
            $new_comment->comment = $request->comment;
            $new_comment->save();

            return back()->with('success','Comment Successfully Created');
        }

    }




}
