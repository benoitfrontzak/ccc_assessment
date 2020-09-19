// Classes
const AdminSubjectsAddUI = new AdminSubjectsAdd_UI();

window.addEventListener('DOMContentLoaded', function () {
    //When semester is clicked
    $('.oneSemester').on('click', function(){
        //Reset error_feedback
        $('#errors_feedback').hide();
        const semester_id =  $(this)[0].dataset.value,
              semester = $(this)[0].text;        
        AdminSubjectsAddUI.populate_semester(semester_id, semester);
    })    
    //When form is submit
    $('#addSubjectForm').on('submit', function(e){
        //Reset error_feedback & prevent submit
        $('#errors_feedback').hide();
        e.preventDefault();
        //Validate form
        const isValid = AdminSubjectsAddUI.validate_form();
        if(isValid){
            document.getElementById('addSubjectForm').submit()
        }else{
            $('#errors_feedback').show()
            $('#errors_feedback')[0].innerHTML = `You must set all field!`
        }
    })
    

})