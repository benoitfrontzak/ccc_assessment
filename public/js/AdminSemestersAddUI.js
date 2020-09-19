class AdminSemestersAdd_UI{
    populate_semester(semester){
        $('#semester_dropdown')[0].innerHTML = semester;
        $('#semester').val(semester);
    }
    populate_course(course_id, course){
        $('#course_dropdown')[0].innerHTML = course;
        $('#course_id').val(course_id);
    }
    validate_form(){        
        let validate_semester = false,
            validate_course = false,
            validate_term = false;
        ($('#semester').val() == '') ? validate_semester = false : validate_semester = true;
        ($('#course_id').val() == '') ? validate_course = false : validate_course = true;
        ($('#term').val() == '') ? validate_term = false : validate_term = true;        
        if(validate_semester && validate_course && validate_term){
            return true;
        }else{
            return false;   
        }
    }
}