<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\general_setting;
use App\Models\post_comment;
use App\Models\post_like;
use App\Models\survey_question;
use App\Models\transaction;
use App\Models\User;
use App\Models\user_earning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserPostController extends Controller
{
    public function create_post()
    {
        return view('user.post.createPost');
    }

    public function create_post_save(Request $request)
    {

        $gen = general_setting::first();
        if (Auth::user()->balance < $gen->create_post) {
            return back()->with('alert','Insufficient Balance');
        }else{
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

            $user_bal = User::where('id',Auth::user()->id)->first();
            $user_bal->balance = $user_bal->balance - $gen->create_post;
            $user_bal->save();

            return back()->with('success','Survey Question Successfully Created');
        }

    }


    public function post_details($id)
    {
        $post_details = survey_question::where('id',$id)->first();
        $post_cmments = post_comment::where('post_id',$id)->orderBy('id','desc' )->paginate(10);
        return view('user.post.postDetails',compact('post_details','post_cmments'));
    }



    public function post_like_save($id)
    {
        $post = survey_question::where('id',$id)->first();
        $exists_post = post_like::where('user_id',Auth::user()->id)
            ->where('post_id',$id)
            ->where('user_type',2)
            ->count();


        if ($exists_post > 0) {
            return back()->with('alert','You Already Like this post');
        }else{
            if ($post->user_type == 2 && $post->user_id == Auth::user()->id) {
                return back()->with('alert','You can not like your post');
            }else{


                if (Auth::user()->account_type == 1) {
                    $privious_count_like = post_like::where('user_id',Auth::user()->id)
                        ->where('user_type',2)
                        ->count();

                    if ($privious_count_like == 2) {
                        return back()->with('alert','You are not active user');
                    }else{
                        $new_post_like = new post_like();
                        $new_post_like->user_id = Auth::user()->id;
                        $new_post_like->post_id = $id;
                        $new_post_like->user_type = 2;
                        $new_post_like->save();

                        $gen = general_setting::first();
                        $user_bal = User::where('id',Auth::user()->id)->first();
                        $user_bal->balance = $user_bal->balance + $gen->per_like_money;
                        $user_bal->save();


                        $id = Str::random(3).Auth::user()->id.rand(1,9).Str::random(3);

                        $user_tran = new user_earning();
                        $user_tran->earning_id = $id;
                        $user_tran->user_id = Auth::user()->id;
                        $user_tran->amount = $gen->per_like_money;
                        $user_tran->message = "Post Like";
                        $user_tran->type = 1;
                        $user_tran->save();

                        return back()->with('success','You Liked this post');
                    }

                }else{
                    $new_post_like = new post_like();
                    $new_post_like->user_id = Auth::user()->id;
                    $new_post_like->post_id = $id;
                    $new_post_like->user_type = 2;
                    $new_post_like->save();

                    $gen = general_setting::first();
                    $user_bal = User::where('id',Auth::user()->id)->first();
                    $user_bal->balance = $user_bal->balance + $gen->per_like_money;
                    $user_bal->save();


                    $id = Str::random(3).Auth::user()->id.rand(1,9).Str::random(3);

                    $user_tran = new user_earning();
                    $user_tran->earning_id = $id;
                    $user_tran->user_id = Auth::user()->id;
                    $user_tran->amount = $gen->per_like_money;
                    $user_tran->message = "Post Like";
                    $user_tran->type = 1;
                    $user_tran->save();

                    return back()->with('success','You Liked this post');
                }

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

            if (Auth::user()->account_type == 1) {
                $privious_count_comment = post_comment::where('user_id',Auth::user()->id)
                    ->where('user_type',2)
                    ->count();

                if ($privious_count_comment == 2) {
                    return back()->with('alert','You are not active user');
                }else{
                    $new_comment = new post_comment();
                    $new_comment->user_id = Auth::user()->id;
                    $new_comment->post_id = $request->post_id_comment;
                    $new_comment->user_type = 2;
                    $new_comment->comment = $request->comment;
                    $new_comment->save();


                    $gen = general_setting::first();
                    $user_bal = User::where('id',Auth::user()->id)->first();
                    $user_bal->balance = $user_bal->balance + $gen->per_post_money;
                    $user_bal->save();


                    $id = Str::random(3).Auth::user()->id.rand(1,9).Str::random(3);

                    $user_tran = new user_earning();
                    $user_tran->earning_id = $id;
                    $user_tran->user_id = Auth::user()->id;
                    $user_tran->amount = $gen->per_post_money;
                    $user_tran->message = "Post Comment";
                    $user_tran->type = 2;
                    $user_tran->save();

                    return back()->with('success','Comment Successfully Created');
                }



            }else{
                $new_comment = new post_comment();
                $new_comment->user_id = Auth::user()->id;
                $new_comment->post_id = $request->post_id_comment;
                $new_comment->user_type = 2;
                $new_comment->comment = $request->comment;
                $new_comment->save();


                $gen = general_setting::first();
                $user_bal = User::where('id',Auth::user()->id)->first();
                $user_bal->balance = $user_bal->balance + $gen->per_post_money;
                $user_bal->save();


                $id = Str::random(3).Auth::user()->id.rand(1,9).Str::random(3);

                $user_tran = new user_earning();
                $user_tran->earning_id = $id;
                $user_tran->user_id = Auth::user()->id;
                $user_tran->amount = $gen->per_post_money;
                $user_tran->message = "Post Comment";
                $user_tran->type = 2;
                $user_tran->save();

                return back()->with('success','Comment Successfully Created');
            }



        }

    }




}
