<?php 
    if(e(auth()->user()->currentTeam->name) == 'Students'){
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Information  {{$request->name}}
        </h2>
    </x-slot> 

    <div class="m-3">
        <div class="row my-3">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">Courses</div>
                    <div class="card-body">
                        <!--Courses-->
                        <div class="row">
                            <div class="col">Course</div>
                            <div class="col text-right">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="course_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Course
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="course_dropdown" style="max-height: 12em; overflow-y: auto;">
                                        @foreach ($info as $course)
                                        <a class="dropdown-item oneCourse" href="#" data-value="{{$course->id}}">{{$course->intake}} {{$course->status}}</a>
                                        @endforeach                                                                  
                                    </div>
                                </div>
                            </div>                                
                        </div>
                        <!--Semesters-->
                        <div class="row my-3" id="semester_row" style="display: none;">
                            <div class="col">Semester</div>
                            <div class="col text-right">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="semester_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Semester
                                    </button>
                                    <div class="dropdown-menu" id="semester_dd_links" aria-labelledby="semester_dropdown" style="max-height: 12em; overflow-y: auto;"></div>
                            </div>                                
                        </div>
                        <!--Subjects-->
                        <table class="table my-3" id="table_subjects" style="display: none;">
                            <thead>
                                <tr>
                                    <td>Subject</td>
                                    <td>Semester</td>
                                    <td>Status</td>
                                    <td>Grade</td>
                                </tr>
                            </thead>
                            <tbody id="tbody_subjects">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/StudentsUI.js')}}"></script>
    <script src="{{asset('js/StudentsAPI.js')}}"></script>
    <script src="{{asset('js/students.js')}}"></script>
</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

