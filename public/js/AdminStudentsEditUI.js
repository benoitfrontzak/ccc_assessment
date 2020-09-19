class AdminStudentsEdit_UI{
    /*
        When change birthdate (dropdown year, month, day)
        populate hidden field 
    */
    populate_birthdate(wanted, selectedValue){
        let fyear, fmonth, fday;
        let year, month, day;
        //Set variable for wanted
        switch (wanted) {
            case 'year':
                year    = selectedValue;
                month   = $('#birthdate_month').val();
                day     = $('#birthdate_day').val();
                break;
            case 'month':
                year    = $('#birthdate_year').val();
                month   = selectedValue;
                day     = $('#day').val();
                break;
            case 'day':
                year    = $('#birthdate_year').val();
                month   = $('#birthdate_month').val();
                day     = selectedValue;
                break;
            default:
                year    = $('#birthdate_year').val();
                month   = $('#birthdate_month').val();
                day     = $('#birthdate_day').val();
                break;
        }
        //Check if field undefined
        (typeof(year) === 'undefined')  ? fyear  = '' : fyear  = year;
        (typeof(month) === 'undefined') ? fmonth = '' : fmonth = month;
        (typeof(day) === 'undefined')   ? fday   = '' : fday   = day;
        //Reset error_feedback
        $('#errors_feedback').hide();
        //Hidden field
        $('#birthdate_year').val(year);
        $('#birthdate_month').val(month);
        $('#birthdate_day').val(day);        
        //Public field
        $('#birthdate').val(fyear+'-'+fmonth+'-'+fday);         //Ref field use to insert record to DB
        $('#birthdate_public').val(fyear+'-'+fmonth+'-'+fday);  //Disable field (public view purpose)
        //Dropdown selected value
        if(fyear !== '') $('#year_dropdown')[0].innerHTML = fyear
        if(fmonth !== '') $('#month_dropdown')[0].innerHTML = fmonth
        if(fday !== '') $('#day_dropdown')[0].innerHTML = fday
    }

    /*
        We only have to validate birthdate
        Check if hidden birthdate value is a date format YYYY-MM-DD
        Check if all dropdown (hidden year, hidden month,  hidden day) are not empty
        return bool
    */
    validate_form(){        
        let validate_birthdate  = false,
            validate_year       = false,
            validate_month      = false,
            validate_day        = false;
        const regEx = /^\d{4}-\d{2}-\d{2}$/;

        ($('#birthdate').val().match(regEx)) ? validate_birthdate = true : validate_birthdate = false;
        ($('#birthdate_year').val() == '') ? validate_year = false : validate_year = true;
        ($('#birthdate_month').val() == '') ? validate_month = false : validate_month = true;
        ($('#birthdate_day').val() == '') ? validate_day = false : validate_day = true;

        
        if( (validate_year && validate_month && validate_day) || validate_birthdate ){
            return true;
        }else{
            return false;   
        }
    }
}