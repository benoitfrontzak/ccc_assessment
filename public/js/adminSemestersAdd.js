// Classes
const AdminSemestersAddUI = new AdminSemestersAdd_UI();

window.addEventListener('DOMContentLoaded', function () {
    //When semester is clicked
    $('.oneSemester').on('click', function(){
        //Reset error_feedback
        $('#errors_feedback').hide();
        const semester =  $(this)[0].dataset.value;        
        AdminSemestersAddUI.populate_semester(semester);
    })
    //When course is clicked
    $('.oneCourse').on('click', function(){
        //Reset error_feedback
        $('#errors_feedback').hide();
        const course_id =  $(this)[0].dataset.value,
              course = $(this)[0].text;
        AdminSemestersAddUI.populate_course(course_id, course);
    })
    //When form is submit
    $('#addSemesterForm').on('submit', function(e){
        //Reset error_feedback & prevent submit
        $('#errors_feedback').hide();
        e.preventDefault();
        //Validate form
        const isValid = AdminSemestersAddUI.validate_form();
        if(isValid){
            document.getElementById('addSemesterForm').submit()
        }else{
            $('#errors_feedback').show()
            $('#errors_feedback')[0].innerHTML = `You must set all field!`
        }
    })
    

})