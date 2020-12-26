<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\survey_question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdminSurveyController extends Controller
{
    public function survey()
    {
        return view('admin.survey.surveyList');
    }


    public function survey_get(Request $request)
    {
        $survey = DB::table('survey_questions')->get();
        return DataTables::of($survey)
            ->addColumn('action',function ($survey){
                return ' <a href="'.route('admin.edit.survey',$survey->id).'"> <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                         <button id="'.$survey->id .'" onclick="surveydelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#delsurvey"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }



    public function survey_create()
    {
        return view('admin.survey.surveyCreate');
    }


    public function survey_save(Request $request)
    {
        $new_survey = new survey_question();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().uniqid().'.'."jpeg";
            $directory = 'assets/admin/images/survey/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $new_survey->image = $imgUrl;
        }

        $new_survey->user_type = 1;
        $new_survey->user_id = Auth::user()->id;
        $new_survey->title = $request->title;
        $new_survey->question = $request->question;
        $new_survey->save();

        return back()->with('success','Survey Question Successfully Created');

    }

    public function survey_edit($id)
    {
        $survey = survey_question::where('id',$id)->first();
        return view('admin.survey.surveyEdit',compact('survey'));
    }


    public function survey_update(Request $request)
    {
        $survey_update = survey_question::where('id',$request->survey_edit)->first();

        if($request->hasFile('image')){
            @unlink($survey_update->image);
            $image = $request->file('image');
            $imageName = time().uniqid().'.'."jpeg";
            $directory = 'assets/admin/images/survey/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $survey_update->image = $imgUrl;
        }

        $survey_update->title = $request->title;
        $survey_update->question = $request->question;
        $survey_update->save();

        return back()->with('success','Survey Question Successfully Updated');

    }

    public function survey_delete(Request $request)
    {
        $delete_survey = survey_question::where('id',$request->delete_survey)->first();
        $delete_survey->delete();
        return back()->with('success','Survey Question Successfully Deleted');
    }






}
