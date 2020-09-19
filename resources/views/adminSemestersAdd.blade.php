<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Add semester      
        </h2>
    </x-slot> 
    <div class="m-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form id="addSemesterForm" method="POST" action="{{route('adminsemesters.addsubmit')}}">
                    @csrf
                    <input type="hidden" id="semester" name="semester"/>
                    <input type="hidden" id="course_id" name="course_id"/>
                    <div class="card" style="width:80%">
                        <div class="card-header">
                            Add semester
                        </div>
                        <div class="card-body">
                            @if(Session::has('semester_created'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('semester_created')}}
                                </div>
                            @endif
                            <div class="alert alert-danger" id="errors_feedback" role="alert" style="display:none;"></div>
                            <!--Semester-->
                            <div class="row">
                                <div class="col">
                                    Semester
                                </div>
                                <div class="col text-right">
                                    <div class="p-2 bd-highlight">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="semester_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Semester
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="semester_dropdown" style="max-height: 12em; overflow-y: auto;">
                                                <a class="dropdown-item oneSemester" href="#" data-value="semester-1">semester-1</a>                      
                                                <a class="dropdown-item oneSemester" href="#" data-value="semester-2">semester-2</a>                      
                                                <a class="dropdown-item oneSemester" href="#" data-value="semester-3">semester-3</a>                      
                                                <a class="dropdown-item oneSemester" href="#" data-value="semester-4">semester-4</a>                      
                                                <a class="dropdown-item oneSemester" href="#" data-value="semester-4">semester-4</a>                      
                                                <a class="dropdown-item oneSemester" href="#" data-value="semester-6">semester-6</a>                      
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <!--Course-->
                            <div class="row">
                                <div class="col">Course</div>
                                <div class="col text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="course_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Course
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="course_dropdown" style="max-height: 12em; overflow-y: auto;">
                                            @foreach ($request as $course)
                                            <a class="dropdown-item oneCourse" href="#" data-value="{{$course->id}}">{{$course->intake}} {{$course->user}} {{$course->status}}</a>
                                            @endforeach                                                                  
                                        </div>
                                    </div>
                                </div>                                
                            </div>                            
                            <!--Term-->
                            <div class="row mt-3">
                                <div class="col">Term</div>
                                <div class="col text-right">
                                    <input id="term" name="term" type="text" class="form-control" placeholder="Term" aria-label="Term" required/>
                                </div>
                            </div>
                            <!--Status-->
                            <div class="row mt-3">
                                <div class="col">Status</div>
                                <div class="col text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="Active" checked/>
                                        <label class="form-check-label" for="status_active">Active</label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_defer" value="Defer"/>
                                        <label class="form-check-label" for="status_defer">Defer</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Save"/>
                            <a href="/admin/semesters/all" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/AdminSemestersAddUI.js')}}"></script>
    <script src="{{asset('js/adminSemestersAdd.js')}}"></script>
</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

