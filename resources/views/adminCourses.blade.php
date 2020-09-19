<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
        $admin_courses_add_route   = '/admin/courses/add';
        $admin_courses_edit_route   = '/admin/courses/edit';
        $admin_courses_delete_route   = '/admin/courses/delete';
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All courses           
        </h2>
    </x-slot> 
    <div class="m-3">        
        @if(Session::has('course_deleted'))
            <div class="alert alert-success" role="alert">
                {{Session::get('course_deleted')}}
            </div>
        @endif
        @if (count($request) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Intake</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th class="text-right"><a href="<?=$admin_courses_add_route?>"><input type="button" class="btn btn-success" value="Add"></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($request as $course)
                        <tr>
                            <td>{{$course->name}}</td>
                            <td>{{$course->email}}</td>
                            <td>{{$course->intake}}</td>
                            <td>{{$course->status}}</td>
                            <td>{{$course->created_at}}</td>
                            <td>{{$course->updated_at}}</td>
                            <td class="text-right">
                                <a href="<?=$admin_courses_edit_route?>/{{$course->id}}"><input type="button" class="btn btn-info" value="Edit"></a>
                                <a href="<?=$admin_courses_delete_route?>/{{$course->id}}"><input type="button" class="btn btn-danger" value="Delete"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr><td><a href="/dashboard" class="btn btn-secondary">Back</a></td></tr>
                </tfoot>
            </table>
        @else
            No courses    
        @endif
    </div>

</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

