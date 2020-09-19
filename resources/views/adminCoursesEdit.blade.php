<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
        $admin_students_edit_submit   = '/admin/students/edit';
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Edit course      
        </h2>
    </x-slot> 
    <div class="m-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form method="POST" action="{{route('admincourses.editsubmit')}}">
                    @csrf
                    <input type="hidden" id="user_id" name="user_id" value="{{$request->user_id}}"/>
                    <input type="hidden" id="id" name="id" value="{{$request->id}}"/>
                    <div class="card" style="width:80%">
                        <div class="card-header">
                            Edit course
                        </div>
                        <div class="card-body">
                            @if(Session::has('course_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('course_updated')}}
                                </div>
                            @endif
                            <!--Name-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Intake</span>
                                </div>
                                <input name="intake" type="text" class="form-control" placeholder="Intake" value="{{$request->intake}}" required/>
                            </div>
                            <!--Birthdate-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Status</span>
                                </div>
                                <input name="status" type="text" class="form-control" placeholder="status" value="{{$request->status}}" required/>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Save"/>
                            <a href="/admin/courses/all" class="btn btn-info">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

