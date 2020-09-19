// Classes
const AdminStudentsUI = new AdminStudentsEdit_UI();

window.addEventListener('DOMContentLoaded', function () {
    //When change year is clicked
    $('.birthdate_year').on('click', function(){
        const year =  $(this)[0].text;
        AdminStudentsUI.populate_birthdate('year', year);
    })
    //When change month is clicked
    $('.birthdate_month').on('click', function(){
        const month = $(this)[0].dataset.value;
        AdminStudentsUI.populate_birthdate('month', month);
    })
    //When change day is clicked
    $('.birthdate_day').on('click', function(){
        const day = $(this)[0].dataset.value;
        AdminStudentsUI.populate_birthdate('day', day);
    })
    //When form is submit
    $('#updateStudentForm').on('submit', function(e){
        //Reset error_feedback & prevent submit
        $('#errors_feedback')[0].innerHTML = '';
        e.preventDefault();
        //Validate form
        const isValid = AdminStudentsUI.validate_form();
        if(isValid){
            document.getElementById('updateStudentForm').submit()
        }else{
            $('#errors_feedback').show()
            $('#errors_feedback')[0].innerHTML = `You must set a proper birthdate`
        }
    })

    

})