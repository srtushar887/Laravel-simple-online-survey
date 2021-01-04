<?php

namespace App\Http\Livewire\User;

use App\Models\post_comment;
use App\Models\post_like;
use App\Models\survey_question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Userpost extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $question;


    public function userpostquestion(){
        $this->validate(['question' => 'required'],[
           'question.required' => 'Please Enter Your Question'
        ]);

        $new_ques = survey_question::create([
            'question'=>$this->question,
            'user_id' => Auth::user()->id
        ]);

        $this->question = '';
        session()->flash('message', 'Your Question Successfully Created');

    }

    public function render()
    {


        $likes = array();
        $comments = array();

        $exist_post_like = post_like::where('user_id',Auth::user()->id)->get();
        foreach ($exist_post_like as $post_like){
            array_push($likes,$post_like->post_id);
        }

        $exist_post_comment = post_comment::where('user_id',Auth::user()->id)->get();
        foreach ($exist_post_comment as $post_coment){
            array_push($comments,$post_coment->post_id);
        }

        $a = implode("','",$likes);
        $b = implode("','",$comments);

        return view('livewire.user.userpost',['posts' => survey_question::orderBy('id','desc')
            ->whereNotIn('id',$likes)
            ->OrwhereNotIn('id',$comments)
            ->paginate(10)]);
    }
}
