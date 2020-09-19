<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <style>      
        table{
            font-family: Arial, Helvetica, sans-serif; 
        }   
        table thead tr td{           
            font-size: 2em;
            font-weight: bold;
        }
        table tbody tr td{
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <table class="table table-sm table-striped table-bordered">
        <thead>
            <tr class="bg-primary">
                <th colspan="3">Subjects</th>
                <th colspan="3">Semester</th>
                <th colspan="3">Course</th>
            </tr>
            <tr class="bg-primary">
                <th>Name</th>
                <th>Status</th>
                <th>Grade</th>
                <th>Name</th>
                <th>Term</th>
                <th>Status</th>
                <th>Intake</th>
                <th>Status</th>
                <th>Student</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($request as $info)
                <tr>
                    <td>{{$info->subject}}</td>
                    <td>{{$info->status}}</td>
                    <td>{{$info->grade}}</td>
                    <td>{{$info->semester}}</td>
                    <td>{{$info->term}}</td>
                    <td>{{$info->sstatus}}</td>
                    <td>{{$info->intake}}</td>
                    <td>{{$info->cstatus}}</td>
                    <td>{{$info->user}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>