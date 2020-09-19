<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
        $admin_students_add_route   = '/admin/students/add';
        $admin_students_edit_route   = '/admin/students/edit';
        $admin_students_delete_route   = '/admin/students/delete';
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All students           
        </h2>
    </x-slot> 
    <div class="m-3">
        @if(Session::has('student_deleted'))
            <div class="alert alert-success" role="alert">
                {{Session::get('student_deleted')}}
            </div>
        @endif
        @if (count($students) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Birthdate</th>
                        <th>Nationality</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>{{$student->birthdate}}</td>
                            <td>{{$student->nationality}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->created_at}}</td>
                            <td>{{$student->updated_at}}</td>
                            <td class="text-right">
                                <a href="<?=$admin_students_edit_route?>/{{$student->id}}"><input type="button" class="btn btn-info" value="Edit"></a>
                                <a href="<?=$admin_students_delete_route?>/{{$student->id}}"><input type="button" class="btn btn-danger" value="Delete"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr><td><a href="/dashboard" class="btn btn-secondary">Back</a></td></tr>
                </tfoot>
            </table>
        @else
            No students    
        @endif
    </div>

</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

