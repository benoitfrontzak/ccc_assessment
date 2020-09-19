// Classes
const AdminUI = new Admin_UI(),
      AdminAPI = new Admin_API()

window.addEventListener('DOMContentLoaded', function () {
    //When course is click fetch semester
    $('.oneCourse').on('click', function(){
        const course_id =$(this)[0].dataset.value,
              course = $(this)[0].text;
        $('#course_dropdown')[0].innerHTML = course
        AdminAPI.fetchSemestersGET(course_id).then(response => {
            AdminUI.populateSemesters(response);
            AdminUI.listenerSemesters();
        })
    })    
})