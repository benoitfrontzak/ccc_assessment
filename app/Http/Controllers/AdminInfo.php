<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminInfo extends Controller
{
    //index
    public function index(){
        $request = auth()->user();
        $user_id = $request->id;
        $info =  DB::table('courses')
        ->select('courses.*')
        ->get();
        return view('dashboard', compact('request', 'info', 'user_id'));
    }
    public function downloadPDF() {
        $request = DB::table('subjects')
                 ->join('semesters', 'semesters.id', '=', 'subjects.semester_id')
                 ->join('courses', 'courses.id', '=', 'semesters.course_id')
                 ->join('users', 'users.id', '=', 'courses.user_id')
                 ->select('subjects.subject', 
                          'subjects.status',
                          'subjects.grade',
                          'semesters.semester',
                          'semesters.term',
                          'semesters.status as sstatus',
                          'courses.intake',
                          'courses.status as cstatus',
                          'users.name as user')
                 ->get();
        $show =  DB::table('courses')
        ->select('courses.*')
        ->get();
        $pdf = PDF::loadView('pdf', compact('request'));
        return $pdf->download('students_report_ccc_assessment.pdf');
    }
}
