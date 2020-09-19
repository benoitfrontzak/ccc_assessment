<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit semester      
        </h2>
    </x-slot> 
    <div class="m-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="{{route('adminsemesters.editsubmit')}}">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$request->id}}"/>
                    <input type="hidden" id="course_id" name="course_id" value="{{$request->course_id}}"/>
                    <div class="card" style="width:80%">
                        <div class="card-header">
                            Edit semester
                        </div>
                        <div class="card-body">
                            @if(Session::has('semester_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('semester_updated')}}
                                </div>
                            @endif
                            <!--Semester-->
                            <div class="row my-3">
                                <div class="col">Semester</div>
                                <div class="col">
                                    <input name="semester" type="text" class="form-control" placeholder="Semester" value="{{$request->semester}}" required/>
                                </div>
                            </div>
                            <!--Course-->
                            <div class="row my-3">
                                <div class="col">Course</div>
                                <div class="col text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="course_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          {{$request->intake}} {{$request->name}} {{$request->cstatus}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="course_dropdown" style="max-height: 12em; overflow-y: auto;">
                                            @foreach ($dropdown as $course)
                                            <a class="dropdown-item oneCourse" href="#" data-value="{{$course->id}}">{{$course->intake}} {{$course->user}} {{$course->status}}</a>
                                            @endforeach                                                                  
                                        </div>
                                    </div>
                                </div>                                
                            </div>                            
                            <!--Term-->
                            <div class="row my-3">
                                <div class="col">Term</div>
                                <div class="col text-right">
                                    <input id="term" name="term" type="text" class="form-control" placeholder="Term" value="{{$request->term}}" required/>
                                </div>
                            </div>
                            <!--Status-->
                            <div class="row my-3">
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
    <script src="{{asset('js/AdminSemestersEditUI.js')}}"></script>
    <script src="{{asset('js/adminSemestersEdit.js')}}"></script>
</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

