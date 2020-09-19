// Classes
const AdminCoursesAddUI = new AdminCoursesAdd_UI();

window.addEventListener('DOMContentLoaded', function () {
    //When user is clicked
    $('.oneUser').on('click', function(){
        const user_id =  $(this)[0].dataset.value,
              user_name = $(this)[0].text;
        AdminCoursesAddUI.populate_user(user_id, user_name);
    })
    //When change year is clicked
    $('.intake_year').on('click', function(){
        const year =  $(this)[0].text;
        AdminCoursesAddUI.populate_intake('year', year);
    })
    //When change month is clicked
    $('.intake_month').on('click', function(){
        const month = $(this)[0].dataset.value;
        AdminCoursesAddUI.populate_intake('month', month);
    })
    //When change day is clicked
    $('.intake_day').on('click', function(){
        const day = $(this)[0].dataset.value;
        AdminCoursesAddUI.populate_intake('day', day);
    })
    //When form is submit
    $('#addCourseForm').on('submit', function(e){
        //Reset error_feedback & prevent submit
        $('#errors_feedback')[0].innerHTML = '';
        e.preventDefault();
        //Validate form
        const isValid = AdminCoursesAddUI.validate_form();
        if(isValid){
            document.getElementById('addCourseForm').submit()
        }else{
            $('#errors_feedback').show()
            $('#errors_feedback')[0].innerHTML = `You must set all field!`
        }
    })
    

})