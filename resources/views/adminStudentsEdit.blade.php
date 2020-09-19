<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
        $admin_students_edit_submit   = '/admin/students/edit';
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{$user->name}}           
        </h2>
    </x-slot> 
    <div class="m-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form id="updateStudentForm" method="POST" action="{{route('adminstudents.editsubmit')}}">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$user->id}}"/>
                    <input type="hidden" id="birthdate_year" name="birthdate_year"/>
                    <input type="hidden" id="birthdate_month" name="birthdate_month"/>
                    <input type="hidden" id="birthdate_day" name="birthdate_day"/>
                    <input type="hidden" id="birthdate" name="birthdate" value="{{$user->birthdate}}"/>
                    <div class="card" style="width:80%">
                        <div class="card-header">
                            Edit {{$user->name}}
                        </div>
                        <div class="card-body">
                            @if(Session::has('student_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('student_updated')}}
                                </div>
                            @endif
                            <div class="alert alert-danger" id="errors_feedback" role="alert" style="display:none;">

                            </div>
                            <!--Name-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" title="Name">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                      </svg>
                                  </span>
                                </div>
                                <input name="name" type="text" class="form-control" placeholder="Username" value="{{$user->name}}" required/>
                            </div>
                            <!--Birthdate-->
                            <div class="row">
                                <div class="col text-right">
                                    <div class="d-flex flex-row-reverse bd-highlight mb-3">
                                        <!--Day dropdown-->
                                        <div class="p-2 bd-highlight">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="day_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Day
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="day_dropdown" style="max-height: 12em; overflow-y: auto;">
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="01">01</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="02">02</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="03">03</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="04">04</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="05">05</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="06">06</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="07">07</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="08">08</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="09">09</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="10">10</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="11">11</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="12">12</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="13">13</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="14">14</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="15">15</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="16">16</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="17">17</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="18">18</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="19">19</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="20">20</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="21">21</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="22">22</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="23">23</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="24">24</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="25">25</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="26">26</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="27">27</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="28">28</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="29">29</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="30">30</a>
                                                    <a class="dropdown-item birthdate_day" href="#" data-value="31">31</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Month dropdown-->
                                        <div class="p-2 bd-highlight">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="month_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Month
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="month_dropdown" style="max-height: 12em; overflow-y: auto;">
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="01">01 - January</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="02">02 - February</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="03">03 - March</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="04">04 - April</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="05">05 - May</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="06">06 - June</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="07">07 - July</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="08">08 - August</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="09">09 - September</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="10">10 - October</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="11">11 - November</a>
                                                  <a class="dropdown-item birthdate_month" href="#" data-value="12">12 - December</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Year dropdown-->
                                        <div class="p-2 bd-highlight">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="year_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Year
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="year_dropdown" style="max-height: 12em; overflow-y: auto;">
                                                    <?php for ($i=1950; $i < 2020; $i++): ?>
                                                        <a class="dropdown-item birthdate_year" href="#" value="<?=$i?>"><?=$i?></a>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>                                
                            <div class="input-group mb-3">
                                <span class="input-group-text" title="Birthdate">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-calendar-date-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm.066-2.544c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2zm-2.957-2.89v5.332H5.77v-4.61h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z"/>
                                    </svg>
                                </span>
                                <input id="birthdate_public" type="text" class="form-control" placeholder="Birthdate" value="{{$user->birthdate}}" disabled/>
                            </div>
                            <!--Nationality-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" title="Nationality">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-flag-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                                    </svg>
                                  </span>
                                </div>
                                <input name="nationality" type="text" class="form-control" placeholder="Nationality" value="{{$user->nationality}}"/>
                            </div>
                            <!--Phone-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" title="Phone">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
                                    </svg>
                                  </span>
                                </div>
                                <input name="phone" type="text" class="form-control" placeholder="Phone" value="{{$user->phone}}"/>
                            </div>
                            <!--Email-->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" title="Email">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                                    </svg>
                                  </span>
                                </div>
                                <input name="email" type="text" class="form-control" placeholder="Email" value="{{$user->email}}" required/>
                            </div>
                            <!--Team-->
                            <?php
                                ($user->current_team_id === '1') ? $checked_admin = 'checked' : $checked_admin = '';
                                ($user->current_team_id === '2') ? $checked_students = 'checked' : $checked_students = '';
                            ?>
                            <div class="row">
                                <div class="col text-right">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="current_team_id" id="team_admin" value="1" <?=$checked_admin?>/>
                                        <label class="form-check-label" for="team_admin">Admin</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="current_team_id" id="team_students" value="2" <?=$checked_students?>/>
                                        <label class="form-check-label" for="team_students">Students</label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Save"/>
                            <a href="/admin/students/all" class="btn btn-info">Back</a>                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/AdminStudentsEditUI.js')}}"></script>
    <script src="{{asset('js/adminStudentsEdit.js')}}"></script>
</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

