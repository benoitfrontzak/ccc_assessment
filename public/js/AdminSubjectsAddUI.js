class AdminSubjectsAdd_UI{
    populate_semester(semester_id, semester){
        $('#semester_dropdown')[0].innerHTML = semester;
        $('#semester_id').val(semester_id);
    }
    populate_course(course_id, course){
        $('#course_dropdown')[0].innerHTML = course;
        $('#course_id').val(course_id);
    }
    validate_form(){        
        let validate_semester = false;
        ($('#semester_id').val() == '') ? validate_semester = false : validate_semester = true;      
        if(validate_semester){
            return true;
        }else{
            return false;   
        }
    }
}