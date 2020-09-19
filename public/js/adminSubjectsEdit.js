// Classes
const AdminSubjectsEditUI = new AdminSubjectsEdit_UI();

window.addEventListener('DOMContentLoaded', function () {
    //When course is clicked
    $('.oneSemester').on('click', function(){
        //Reset error_feedback
        $('#errors_feedback').hide();
        const semester_id =  $(this)[0].dataset.value,
              semester = $(this)[0].text;
        AdminSubjectsEditUI.populate_semester(semester_id, semester);
    })
})