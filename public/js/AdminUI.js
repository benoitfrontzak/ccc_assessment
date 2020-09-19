class Admin_UI{
     //populateSemesters
     populateSemesters(response){
        if(response.length >0){
            for (let index = 0; index < response.length; index++) {
                const element = response[index];
                const link = document.createElement('a')
                link.classList.add("dropdown-item", "oneSemester")
                link.href = '#'
                link.setAttribute('data-value', element.id)
                link.innerHTML = `${element.semester}`
                document.getElementById('semester_dd_links').appendChild(link)
            }
            $('#semester_row').show()
        }else{
            $('#semester_row').hide()
        }
    }
    //listenerSemesters
    listenerSemesters(){
        $('.oneSemester').on('click', function(){
            const semester_id =$(this)[0].dataset.value,
                  semester = $(this)[0].text;
            $('#semester_dropdown')[0].innerHTML = semester
            AdminAPI.fetchSubjectsGET(semester_id).then(response => {
                AdminUI.populateSubjects(response);
            })
        })
    }
    //populateSubjects
    populateSubjects(response){
        if(response.length >0){
            for (let index = 0; index < response.length; index++) {
                const element = response[index];
                const link = document.createElement('tr')
                link.setAttribute('data-value', element.id)
                link.innerHTML = `<td>${element.subject}</td>
                                  <td>${element.semester}</td>
                                  <td>${element.status}</td>
                                  <td>${element.grade}</td>`
                document.getElementById('tbody_subjects').appendChild(link)
            }
            $('#table_subjects').show()
        }else{
            $('#table_subjects').hide()
        }
    }
}