// Classes
const AdminSemestersEditUI = new AdminSemestersEdit_UI();

window.addEventListener('DOMContentLoaded', function () {
    //When course is clicked
    $('.oneCourse').on('click', function(){
        //Reset error_feedback
        $('#errors_feedback').hide();
        const course_id =  $(this)[0].dataset.value,
              course = $(this)[0].text;
        AdminSemestersEditUI.populate_course(course_id, course);
    })
})