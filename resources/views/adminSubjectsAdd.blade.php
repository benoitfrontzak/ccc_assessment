<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Add subject      
        </h2>
    </x-slot> 
    <div class="m-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form id="addSubjectForm" method="POST" action="{{route('adminsubjects.addsubmit')}}">
                    @csrf
                    <input type="hidden" id="semester_id" name="semester_id"/>
                    <div class="card" style="width:80%">
                        <div class="card-header">
                            Add subject
                        </div>
                        <div class="card-body">
                            @if(Session::has('subject_created'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('subject_created')}}
                                </div>
                            @endif
                            <div class="alert alert-danger" id="errors_feedback" role="alert" style="display:none;"></div>
                            <!--Subject-->
                            <div class="row mt-3">
                                <div class="col">Subject</div>
                                <div class="col text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject" value="Module-A" checked/>
                                        <label class="form-check-label">Module-A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject" value="Module-B"/>
                                        <label class="form-check-label">Module-B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject" value="Module-C"/>
                                        <label class="form-check-label">Module-C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject" value="Module-D"/>
                                        <label class="form-check-label">Module-D</label>
                                    </div>
                                </div>
                            </div>                           
                            <!--Semester-->
                            <div class="row">
                                <div class="col">Semester</div>
                                <div class="col text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="semester_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Semester
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="semester_dropdown" style="max-height: 12em; overflow-y: auto;">
                                            @foreach ($request as $semester)
                                            <a class="dropdown-item oneSemester" href="#" data-value="{{$semester->id}}">{{$semester->semester}} {{$semester->term}} {{$semester->status}}</a>
                                            @endforeach                                                                  
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <!--Status-->
                            <div class="row mt-3">
                                <div class="col">Status</div>
                                <div class="col text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Taken" checked/>
                                        <label class="form-check-label">Taken</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Drop"/>
                                        <label class="form-check-label">Drop</label>
                                    </div>
                                </div>
                            </div>                                                        
                            <!--Grade-->
                            <div class="row mt-3">
                                <div class="col">Grade</div>
                                <div class="col text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="grade" value="A" checked/>
                                        <label class="form-check-label">A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="grade" value="B"/>
                                        <label class="form-check-label">B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="grade" value="C"/>
                                        <label class="form-check-label">C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="grade" value="D"/>
                                        <label class="form-check-label">D</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Save"/>
                            <a href="/admin/subjects/all" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/AdminSubjectsAddUI.js')}}"></script>
    <script src="{{asset('js/adminSubjectsAdd.js')}}"></script>
</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

