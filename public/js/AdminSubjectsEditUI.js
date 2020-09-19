class AdminSubjectsEdit_UI{
    populate_semester(semester_id, semester){
        $('#semester_dropdown')[0].innerHTML = semester;
        $('#semester_id').val(semester_id);
    }
}