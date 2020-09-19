class Admin_API{
    async getInfo(user_id){
        const url = path + 'agenda/getWagesBooking/';
        const payload = {
          user_id: user_id
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