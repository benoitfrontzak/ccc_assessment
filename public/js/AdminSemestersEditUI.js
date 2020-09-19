class AdminSemestersEdit_UI{
    populate_course(course_id, course){
        $('#course_dropdown')[0].innerHTML = course;
        $('#course_id').val(course_id);
    }
}