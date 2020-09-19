<?php
/*
-   ADMIN CRUD ROUTE 
-                       Students
-                       Courses
-                       Semesters
-                       Subjects
-   For dashboard links
*/
    $admin_students_all_route   = '/admin/students/all';
    $admin_students_pdf_route   = '/downloadPDF';

    $admin_courses_add_route    = '/admin/courses/add';
    $admin_courses_all_route    = '/admin/courses/all';

    $admin_semesters_add_route  = '/admin/semesters/add';
    $admin_semesters_all_route  = '/admin/semesters/all';

    $admin_subjects_add_route   = '/admin/subjects/add';
    $admin_subjects_all_route   = '/admin/subjects/all';

/*
-   STUDENTS CRUD ROUTE 
-                       Student info
-                       Subjects
-   For dashboard links
*/
    $student_info_route         = '/student/info/';
?>

<x-app-layout>
    <x-slot name="header">
        <input type="hidden" id="current_team" name="current_team" value="{{auth()->user()->currentTeam->name}}"/>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{auth()->user()->currentTeam->name}}
        </h2>
        
        <!--Students dasboard-->
        <?php if(e(auth()->user()->currentTeam->name) === 'Students'): ?>
            <div class="row">
                <!-- Students featurette -->
                <div class="col">
                    <div class="card" style="width:auto">
                        <div class="card-header">
                            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            Students
                        </div>
                        <div class="card-body">
                            <p>
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?=$student_info_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                <circle cx="8" cy="4.5" r="1"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>  
            </div>
        <?php endif; ?>

        <!--Admin dasboard-->
        <?php if(e(auth()->user()->currentTeam->name) === 'Admin'):?>
            <div class="row">
                <!-- Students featurette -->
                <div class="col">
                    <div class="card" style="width:auto">
                        <div class="card-header">
                            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            Students
                        </div>
                        <div class="card-body">
                            <p>
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?=$admin_students_all_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                <circle cx="8" cy="4.5" r="1"/>
                                            </svg>
                                        </a>
                                        <a href="<?=$admin_students_pdf_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Courses featurette -->
                <div class="col">
                    <div class="card" style="width:auto">
                        <div class="card-header">
                            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-clipboard-data" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                                <path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                                <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                            </svg>
                            Courses
                        </div>
                        <div class="card-body">
                            <p>
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?=$admin_courses_add_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </a>
                                        <a href="<?=$admin_courses_all_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                <circle cx="8" cy="4.5" r="1"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Semesters featurette -->
                <div class="col">
                    <div class="card" style="width:auto">
                        <div class="card-header">
                            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-calendar-range-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 7V5H0v5h5a1 1 0 1 1 0 2H0v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9h-6a1 1 0 1 1 0-2h6z"/>
                            </svg>
                            Semesters
                        </div>
                        <div class="card-body">
                            <p>
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?=$admin_semesters_add_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </a>
                                        <a href="<?=$admin_semesters_all_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                <circle cx="8" cy="4.5" r="1"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Subjects featurette -->
                <div class="col">
                    <div class="card" style="width:auto">
                        <div class="card-header">
                            <svg width="4em" height="4em" viewBox="0 0 16 16" class="bi bi-chat-left-dots-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            Subjects
                        </div>
                        <div class="card-body">
                            <p>
                                <div class="row">
                                    <div class="col text-right">
                                        <a href="<?=$admin_subjects_add_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </a>
                                        <a href="<?=$admin_subjects_all_route?>" class="btn btn-outline-primary">
                                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                                                <circle cx="8" cy="4.5" r="1"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
    </x-slot>

    <!-- Body (for admin) -->
    <div id="dashboard_body" class="m-3">
        <?php if(e(auth()->user()->currentTeam->name) === 'Admin'):?>
        <div class="m-3">
            <div class="row my-3">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">Courses</div>
                        <div class="card-body">
                            <!--Courses-->
                            <div class="row">
                                <div class="col">Course</div>
                                <div class="col text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="course_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Course
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="course_dropdown" style="max-height: 12em; overflow-y: auto;">
                                            @foreach ($info as $course)
                                            <a class="dropdown-item oneCourse" href="#" data-value="{{$course->id}}">{{$course->intake}} {{$course->status}}</a>
                                            @endforeach                                                                  
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <!--Semesters-->
                            <div class="row my-3" id="semester_row" style="display: none;">
                                <div class="col">Semester</div>
                                <div class="col text-right">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="semester_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Semester
                                        </button>
                                        <div class="dropdown-menu" id="semester_dd_links" aria-labelledby="semester_dropdown" style="max-height: 12em; overflow-y: auto;"></div>
                                </div>                                
                            </div>
                            <!--Subjects-->
                            <table class="table my-3" id="table_subjects" style="display: none;">
                                <thead>
                                    <tr>
                                        <td>Subject</td>
                                        <td>Semester</td>
                                        <td>Status</td>
                                        <td>Grade</td>
                                    </tr>
                                </thead>
                                <tbody id="tbody_subjects">
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
    </div>

    <?php if(e(auth()->user()->currentTeam->name) === 'Admin'):?>
        <script src="{{asset('js/AdminUI.js')}}"></script>
        <script src="{{asset('js/AdminAPI.js')}}"></script>
        <script src="{{asset('js/admin.js')}}"></script>
    <?php endif;?>
</x-app-layout>

<script>
    const current_team = document.getElementById('current_team').value
</script>