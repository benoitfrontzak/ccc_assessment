<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subjects;

class AdminSubjects extends Controller
{
    //All subjects 
    public function index(){
        $request = DB::table('subjects')
                 ->join('semesters', 'semesters.id', '=', 'subjects.semester_id')
                 ->select('subjects.*', 'semesters.semester', 'semesters.term', 'semesters.status as sstatus')
                 ->get();
        return view('adminSubjects', compact('request'));
    }
    //Add subject
    public function add(){
        $request = DB::table('semesters')
                 ->select('semesters.*')
                 ->get();
        return view('adminSubjectsAdd', compact('request'));
    }
    public function addSubmit(Request $request){
        DB::table('subjects')->insert([
            'subject' => $request->subject,
            'semester_id' => $request->semester_id,
            'grade' => $request->grade,
            'status' => $request->status,
        ]);
        return back()->with('subject_created', 'Subject has been created successfully!');
    }
    //Edit subject
    public function update($id){
        $request = DB::table('subjects')
                 ->join('semesters', 'semesters.id', '=', 'subjects.semester_id')
                 ->select('subjects.*', 'semesters.semester')
                 ->where('subjects.id', $id)->first();
        $dropdown = DB::table('semesters')
                 ->select('semesters.*')
                 ->get();
        return view('adminSubjectsEdit', compact('request', 'dropdown'));
    }
    public function updateSubmit(Request $request){
        $subject = Subjects::find($request->id);
        if($subject){
            $subject->subject = $request->subject;
            $subject->semester_id = $request->semester_id;
            $subject->grade = $request->grade;
            $subject->status = $request->status;
            $subject->save();
            return back()->with('subject_updated', 'Subject has been updated successfully!');
        }else{
            return back()->with('subject_updated', 'Something went wrong!' . $subject);
        }
    }
    //Delete course (TODO soft deleted)    
    public function delete($id){
        DB::table('subjects')->where('id', $id)->delete();
        return back()->with('subject_deleted', 'Subject has been deleted successfully!');
    }
}
