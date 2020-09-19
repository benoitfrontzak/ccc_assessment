<?php 
    if(e(auth()->user()->currentTeam->name) == 'Admin'){
        $admin_students_edit_submit   = '/admin/students/edit';
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Add course      
        </h2>
    </x-slot> 
    <div class="m-3">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form id="addCourseForm" method="POST" action="{{route('admincourses.addsubmit')}}">
                    @csrf
                    <input id="user_id" name="user_id" type="hidden"/>
                    <input type="hidden" id="intake_year" name="intake_year"/>
                    <input type="hidden" id="intake_month" name="intake_month"/>
                    <input type="hidden" id="intake_day" name="intake_day"/>
                    <input type="hidden" id="intake" name="intake"/>
                    <div class="card" style="width:80%">
                        <div class="card-header">
                            Add course
                        </div>
                        <div class="card-body">
                            @if(Session::has('course_created'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('course_created')}}
                                </div>
                            @endif
                            <div class="alert alert-danger" id="errors_feedback" role="alert" style="display:none;"></div>
                            <!--User-->
                            <div class="row">
                                <div class="col">
                                    User
                                </div>
                                <div class="col text-right">
                                    <div class="p-2 bd-highlight">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="user_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              User
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="user_dropdown" style="max-height: 12em; overflow-y: auto;">
                                                @foreach ($request as $user)
                                                <a class="dropdown-item oneUser" href="#" data-value="{{$user->id}}">{{$user->name}}</a>
                                                @endforeach                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!--intake-->
                            <div class="row">
                                <div class="col">Intake</div>
                                <div class="col text-right">
                                    <div class="d-flex flex-row-reverse bd-highlight mb-3">
                                        <!--Day dropdown-->
                                        <div class="p-2 bd-highlight">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="day_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Day
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="day_dropdown" style="max-height: 12em; overflow-y: auto;">
                                                    <a class="dropdown-item intake_day" href="#" data-value="01">01</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="02">02</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="03">03</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="04">04</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="05">05</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="06">06</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="07">07</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="08">08</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="09">09</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="10">10</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="11">11</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="12">12</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="13">13</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="14">14</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="15">15</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="16">16</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="17">17</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="18">18</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="19">19</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="20">20</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="21">21</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="22">22</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="23">23</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="24">24</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="25">25</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="26">26</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="27">27</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="28">28</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="29">29</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="30">30</a>
                                                    <a class="dropdown-item intake_day" href="#" data-value="31">31</a>
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
                                                  <a class="dropdown-item intake_month" href="#" data-value="01">01 - January</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="02">02 - February</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="03">03 - March</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="04">04 - April</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="05">05 - May</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="06">06 - June</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="07">07 - July</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="08">08 - August</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="09">09 - September</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="10">10 - October</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="11">11 - November</a>
                                                  <a class="dropdown-item intake_month" href="#" data-value="12">12 - December</a>
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
                                                    <?php for ($i=2020; $i < 2030; $i++): ?>
                                                        <a class="dropdown-item intake_year" href="#" value="<?=$i?>"><?=$i?></a>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <!--intake public (disabled)-->
                            <div class="row mt-n3">
                                <div class="col text-right"><input id="intake_public" name="intake_public" type="text" placeholder="Use dropdown to populate" disabled/></div>
                            </div>
                            
                            <!--Status-->
                            <div class="row mt-3">
                                <div class="col">Status</div>
                                <div class="col text-right">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_active" value="Active" checked/>
                                        <label class="form-check-label" for="status_active">Active</label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status_graduated" value="Graduated"/>
                                        <label class="form-check-label" for="status_graduated">Graduated</label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" name="status_withdrawn" value="Withdrawn"/>
                                        <label class="form-check-label" for="status_withdrawn">Withdrawn</label>
                                      </div>
                                </div>
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
    <script src="{{asset('js/AdminCoursesAddUI.js')}}"></script>
    <script src="{{asset('js/adminCoursesAdd.js')}}"></script>
</x-app-layout>
<?php
    }else{
        echo 'Unauthorized access!';
    }
?>

