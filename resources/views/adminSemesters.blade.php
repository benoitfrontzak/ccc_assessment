<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
        $admin_semesters_add_route   = '/admin/semesters/add';
        $admin_semesters_edit_route   = '/admin/semesters/edit';
        $admin_semesters_delete_route   = '/admin/semesters/delete';
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All semesters           
        </h2>
    </x-slot> 
    <div class="m-3">        
        @if(Session::has('semester_deleted'))
            <div class="alert alert-success" role="alert">
                {{Session::get('semester_deleted')}}
            </div>
        @endif
        @if (count($request) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>User</th>
                        <th>Intake</th>
                        <th>Course status</th>
                        <th>Term</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th class="text-right"><a href="<?=$admin_semesters_add_route?>"><input type="button" class="btn btn-success" value="Add"></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($request as $semester)
                        <tr>
                            <td>{{$semester->semester}}</td>
                            <td>{{$semester->name}}</td>
                            <td>{{$semester->intake}}</td>
                            <td>{{$semester->cstatus}}</td>
                            <td>{{$semester->term}}</td>
                            <td>{{$semester->sstatus}}</td>
                            <td>{{$semester->created_at}}</td>
                            <td>{{$semester->updated_at}}</td>
                            <td class="text-right">
                                <a href="<?=$admin_semesters_edit_route?>/{{$semester->id}}"><input type="button" class="btn btn-info" value="Edit"></a>
                                <a href="<?=$admin_semesters_delete_route?>/{{$semester->id}}"><input type="button" class="btn btn-danger" value="Delete"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr><td><a href="/dashboard" class="btn btn-secondary">Back</a></td></tr>
                </tfoot>
            </table>
        @else
            No semesters    
        @endif
    </div>

</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

