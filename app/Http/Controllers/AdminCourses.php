<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Courses;


class AdminCourses extends Controller
{
    //All courses 
    public function index(){
        $request = DB::table('courses')
                 ->join('users', 'users.id', '=', 'courses.user_id')
                 ->select('users.name', 'users.email', 'courses.id', 'courses.user_id', 'courses.intake', 'courses.status', 'courses.created_at', 'courses.updated_at')
                 ->get();
        return view('adminCourses', compact('request'));
    }

    //Add course
    public function add(){
        $request = DB::table('users')->where('current_team_id', '2')->get();
        return view('adminCoursesAdd', compact('request'));
    }
    public function addSubmit(Request $request){
        DB::table('courses')->insert([
            'user_id' => $request->user_id,
            'intake' => $request->intake,
            'status' => $request->status
        ]);
        return back()->with('course_created', 'Course has been created successfully!');
    }
    //Edit student
    public function update($id){
        $request = DB::table('courses')->where('id', $id)->first();
        return view('adminCoursesEdit', compact('request'));
    }
    public function updateSubmit(Request $request){
        $course = Courses::find($request->id);
        if($course){
            $course->user_id = $request->user_id;
            $course->intake = $request->intake;
            $course->status = $request->status;
            $course->save();
            return back()->with('course_updated', 'Course has been updated successfully!');
        }else{
            return back()->with('course_updated', 'Something went wrong!' . $course);
        }
    }
    //Delete course (TODO soft deleted)
    
    public function delete($id){
        DB::table('courses')->where('id', $id)->delete();
        return back()->with('course_deleted', 'Course has been deleted successfully!');
    }
}
