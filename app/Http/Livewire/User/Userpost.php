<?php

namespace App\Http\Livewire\User;

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
        return view('livewire.user.userpost',['posts' => survey_question::orderBy('id','desc')->paginate(10)]);
    }
}
