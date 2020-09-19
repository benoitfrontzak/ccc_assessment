class Students_API{
    async fetchSemestersPOST(course_id){
        const url = '/student/fetchSemesters';
        const payload = {
          course_id: course_id
        }
        const data = new FormData()
        data.append( "json", JSON.stringify( payload ) )
        const response = await fetch(url, {
          method: 'POST',
          body: data
        })
        const result = await response.json()
        return result
    }
    async fetchSemestersGET(course_id){
      const url = '/student/fetchSemesters/' + course_id 
      const response = await fetch(url)
      const data = await response.json()
      return data
    }
    async fetchSubjectsGET(semester_id){
        const url = '/student/fetchSubjects/' + semester_id 
        const response = await fetch(url)
        const data = await response.json()
        return data
      }
}