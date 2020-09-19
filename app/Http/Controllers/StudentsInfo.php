<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Students;

class StudentsInfo extends Controller
{
    //index
    public function index(){
        $request = auth()->user();
        $user_id = $request->id;
        $info =  DB::table('courses')
        ->select('courses.*')
        ->where('courses.user_id', $user_id)
        ->get();
        return view('studentsInfo', compact('request', 'info', 'user_id'));
    }
    //fetchSemesters
    public function fetchSemesters($course_id){
        $info =  DB::table('semesters')
        ->join('courses', 'courses.id', '=', 'semesters.course_id')
        ->select('semesters.*', 'courses.intake', 'courses.status as cstatus')
        ->where('semesters.course_id', $course_id)
        ->get();
        return json_encode($info);
    }
    //fetchSubjects
    public function fetchSubjects($semester_id){
        $info =  DB::table('subjects')
        ->join('semesters', 'semesters.id', '=', 'subjects.semester_id')
        ->select('subjects.*', 'semesters.semester')
        ->where('subjects.semester_id', $semester_id)
        ->get();
        return json_encode($info);
    }
}
