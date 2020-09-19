<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit subject      
        </h2>
    </x-slot> 
    <div class="m-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="{{route('adminsubjects.editsubmit')}}">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$request->id}}"/>
                    <input type="hidden" id="semester_id" name="semester_id" value="{{$request->semester_id}}"/>
                    <div class="card" style="width:80%">
                        <div class="card-header">
                            Edit subject
                        </div>
                        <div class="card-body">
                            @if(Session::has('subject_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('subject_updated')}}
                                </div>
                            @endif
                            <!--Subject-->
                            <?php
                                ($request->subject === 'Module-A') ? $checked_A = 'checked' : $checked_A = '';
                                ($request->subject === 'Module-B') ? $checked_B = 'checked' : $checked_B = '';
                                ($request->subject === 'Module-C') ? $checked_C = 'checked' : $checked_C = '';
                                ($request->subject === 'Module-D') ? $checked_D = 'checked' : $checked_D = '';
                            ?>
                            <div class="row mt-3">
                                <div class="col">Subject</div>
                                <div class="col text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject" value="Module-A" <?=$checked_A?>/>
                                        <label class="form-check-label">Module-A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject" value="Module-B" <?=$checked_B?>/>
                                        <label class="form-check-label">Module-B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject" value="Module-C" <?=$checked_C?>/>
                                        <label class="form-check-label">Module-C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="subject" value="Module-D" <?=$checked_D?>/>
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
                                            {{$request->semester}}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="semester_dropdown" style="max-height: 12em; overflow-y: auto;">
                                            @foreach ($dropdown as $semester)
                                            <a class="dropdown-item oneSemester" href="#" data-value="{{$semester->id}}">{{$semester->semester}} {{$semester->term}} {{$semester->status}}</a>
                                            @endforeach                                                                  
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <!--Status-->
                            <?php
                                ($request->status === 'Taken') ? $checked_taken = 'checked' : $checked_taken = '';
                                ($request->status === 'Drop') ? $checked_drop = 'checked' : $checked_drop = '';
                            ?>
                            <div class="row mt-3">
                                <div class="col">Status</div>
                                <div class="col text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Taken" <?=$checked_taken?>/>
                                        <label class="form-check-label">Taken</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Drop" <?=$checked_drop?>/>
                                        <label class="form-check-label">Drop</label>
                                    </div>
                                </div>
                            </div>                                                        
                            <!--Grade-->
                            <?php
                                ($request->grade === 'A') ? $checked_gradeA = 'checked' : $checked_gradeA = '';
                                ($request->grade === 'B') ? $checked_gradeB = 'checked' : $checked_gradeB = '';
                                ($request->grade === 'C') ? $checked_gradeC = 'checked' : $checked_gradeC = '';
                                ($request->grade === 'D') ? $checked_gradeD = 'checked' : $checked_gradeD = '';
                            ?>
                            <div class="row mt-3">
                                <div class="col">Grade</div>
                                <div class="col text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="grade" value="A" <?=$checked_gradeA?>/>
                                        <label class="form-check-label">A</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="grade" value="B" <?=$checked_gradeB?>/>
                                        <label class="form-check-label">B</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="grade" value="C" <?=$checked_gradeC?>/>
                                        <label class="form-check-label">C</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="grade" value="D" <?=$checked_gradeD?>/>
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
    <script src="{{asset('js/AdminSubjectsEditUI.js')}}"></script>
    <script src="{{asset('js/adminSubjectsEdit.js')}}"></script>
</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

