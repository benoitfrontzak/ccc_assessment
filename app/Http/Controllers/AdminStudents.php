<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Students;

class AdminStudents extends Controller
{
    //All students 
    public function index(){
        $students = DB::table('users')->where('current_team_id', '2')->get();
        return view('adminStudents', compact('students'));
    }
    //Add student (TODO)
    /*
        use jetstream system to create user and root to assign to his team : Admin | Students
        admin team can edit and delete...
    */
    //Edit student
    public function update($id){
        $user = DB::table('users')->where('id', $id)->first();
        return view('adminStudentsEdit', compact('user'));
    }
    public function updateSubmit(Request $request){
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'nationality' => $request->nationality,
            'phone' => $request->phone,
            'email' => $request->email,
            'current_team_id' => $request->current_team_id,
        ]);
        return back()->with('student_updated', 'Student has been updated successfully!');
    }
    //Delete student (TODO soft deleted)
    
    public function delete($id){
        DB::table('users')->where('id', $id)->delete();
        return back()->with('student_deleted', 'Student has been deleted successfully!');
    }
}
