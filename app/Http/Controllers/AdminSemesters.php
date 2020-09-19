<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Semesters;

class AdminSemesters extends Controller
{
    //All semesters 
    public function index(){
        $request = DB::table('semesters')
                 ->join('courses', 'courses.id', '=', 'semesters.course_id')
                 ->join('users', 'users.id', '=', 'courses.user_id')
                 ->select('users.name', 'courses.intake', 'courses.status as cstatus', 'semesters.id', 'semesters.semester', 'semesters.term', 'semesters.status as sstatus', 'semesters.created_at', 'semesters.updated_at')
                 ->get();
        return view('adminSemesters', compact('request'));
    }

    //Add semester
    public function add(){
        $request = DB::table('courses')
                 ->join('users', 'users.id', '=', 'courses.user_id')
                 ->select('courses.*', 'users.name as user')
                 ->get();
        return view('adminSemestersAdd', compact('request'));
    }
    public function addSubmit(Request $request){
        DB::table('semesters')->insert([
            'semester' => $request->semester,
            'course_id' => $request->course_id,
            'term' => $request->term,
            'status' => $request->status,
        ]);
        return back()->with('semester_created', 'Semester has been created successfully!');
    }
    //Edit student
    public function update($id){
        $request = DB::table('semesters')
                 ->join('courses', 'courses.id', '=', 'semesters.course_id')
                 ->join('users', 'users.id', '=', 'courses.user_id')
                 ->select('users.name', 'courses.intake', 'courses.status as cstatus', 'semesters.*')
                 ->where('semesters.id', $id)->first();
        $dropdown = DB::table('courses')
        ->join('users', 'users.id', '=', 'courses.user_id')
        ->select('courses.*', 'users.name as user')
        ->get();
        return view('adminSemestersEdit', compact('request', 'dropdown'));
    }
    public function updateSubmit(Request $request){
        $semester = Semesters::find($request->id);
        if($semester){
            $semester->semester = $request->semester;
            $semester->course_id = $request->course_id;
            $semester->term = $request->term;
            $semester->status = $request->status;
            $semester->save();
            return back()->with('semester_updated', 'Semester has been updated successfully!');
        }else{
            return back()->with('semester_updated', 'Something went wrong!' . $semester);
        }
    }
    //Delete course (TODO soft deleted)    
    public function delete($id){
        DB::table('semesters')->where('id', $id)->delete();
        return back()->with('semester_deleted', 'Semester has been deleted successfully!');
    }
}
