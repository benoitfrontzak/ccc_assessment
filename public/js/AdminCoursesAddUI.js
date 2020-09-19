class AdminCoursesAdd_UI{
    populate_user(user_id, user_name){
        $('#user_dropdown')[0].innerHTML = user_name
        $('#user_id').val(user_id)
    }
    populate_intake(wanted, selectedValue){
        let fyear, fmonth, fday;
        let year, month, day;
        //Set variable for wanted
        switch (wanted) {
            case 'year':
                year    = selectedValue;
                month   = $('#intake_month').val();
                day     = $('#intake_day').val();
                break;
            case 'month':
                year    = $('#intake_year').val();
                month   = selectedValue;
                day     = $('#day').val();
                break;
            case 'day':
                year    = $('#intake_year').val();
                month   = $('#intake_month').val();
                day     = selectedValue;
                break;
            default:
                year    = $('#intake_year').val();
                month   = $('#intake_month').val();
                day     = $('#intake_day').val();
                break;
        }
        //Check if field undefined
        (typeof(year) === 'undefined')  ? fyear  = '' : fyear  = year;
        (typeof(month) === 'undefined') ? fmonth = '' : fmonth = month;
        (typeof(day) === 'undefined')   ? fday   = '' : fday   = day;
        //Reset error_feedback
        $('#errors_feedback').hide();
        //Hidden field
        $('#intake_year').val(year);
        $('#intake_month').val(month);
        $('#intake_day').val(day);        
        //Public field
        $('#intake').val(fyear+'-'+fmonth+'-'+fday);         //Ref field use to insert record to DB
        $('#intake_public').val(fyear+'-'+fmonth+'-'+fday);  //Disable field (public view purpose)
        //Dropdown selected value
        if(fyear !== '') $('#year_dropdown')[0].innerHTML = fyear
        if(fmonth !== '') $('#month_dropdown')[0].innerHTML = fmonth
        if(fday !== '') $('#day_dropdown')[0].innerHTML = fday
    }
    validate_form(){        
        let validate_user = false,
            validate_intake = false,
            validate_status = false;

        ($('#user_id').val() == '') ? validate_user = false : validate_user = true;
        ($('#intake').val() == '') ? validate_intake = false : validate_intake = true;
        ($('#status').val() == '') ? validate_status = false : validate_status = true;

        
        if(validate_user && validate_intake && validate_status){
            return true;
        }else{
            return false;   
        }
    }
}