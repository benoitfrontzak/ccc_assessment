<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
        $admin_subjects_add_route   = '/admin/subjects/add';
        $admin_subjects_edit_route   = '/admin/subjects/edit';
        $admin_subjects_delete_route   = '/admin/subjects/delete';
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           All subjects           
        </h2>
    </x-slot> 
    <div class="m-3">        
        @if(Session::has('subject_deleted'))
            <div class="alert alert-success" role="alert">
                {{Session::get('subject_deleted')}}
            </div>
        @endif
        @if (count($request) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Grade</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th class="text-right"><a href="<?=$admin_subjects_add_route?>"><input type="button" class="btn btn-success" value="Add"></a></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($request as $subject)
                        <tr>
                            <td>{{$subject->subject}}</td>
                            <td>{{$subject->semester}}</td>
                            <td>{{$subject->status}}</td>
                            <td>{{$subject->grade}}</td>
                            <td>{{$subject->created_at}}</td>
                            <td>{{$subject->updated_at}}</td>
                            <td class="text-right">
                                <a href="<?=$admin_subjects_edit_route?>/{{$subject->id}}"><input type="button" class="btn btn-info" value="Edit"></a>
                                <a href="<?=$admin_subjects_delete_route?>/{{$subject->id}}"><input type="button" class="btn btn-danger" value="Delete"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr><td><a href="/dashboard" class="btn btn-secondary">Back</a></td></tr>
                </tfoot>
            </table>
        @else
            No subjects    
        @endif
    </div>

</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

