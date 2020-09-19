// Classes
const StudentsUI = new Students_UI(),
      StudentsAPI = new Students_API()

// App
window.addEventListener('DOMContentLoaded', function () {
    //When course is click fetch semester
    $('.oneCourse').on('click', function(){
        const course_id =$(this)[0].dataset.value,
              course = $(this)[0].text;
        $('#course_dropdown')[0].innerHTML = course
        StudentsAPI.fetchSemestersGET(course_id).then(response => {
            StudentsUI.populateSemesters(response);
            StudentsUI.listenerSemesters();
        })
    })
})