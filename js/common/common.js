/* 
 * Include common Js code here
 */

//This section initialize the all elements

$('.numeric').on('input', function (event) {
    var val = $(this).val();
    if (isNaN(val)) {
        val = val.replace(/[^0-9\.]/g, '');
        if (val.split('.').length > 2)
            val = val.replace(/\.+$/, "");
    }
    $(this).val(val);
});

function addDays(date, amount) {
    var tzOff = date.getTimezoneOffset() * 60 * 1000,
            t = date.getTime(),
            d = new Date(),
            tzOff2;

    t += (1000 * 60 * 60 * 24) * amount;
    d.setTime(t);

    tzOff2 = d.getTimezoneOffset() * 60 * 1000;
    if (tzOff != tzOff2) {
        var diff = tzOff2 - tzOff;
        t += diff;
        d.setTime(t);
    }

    return d;
}

function get_format(date) {
     if('01-01-1970'==date || '1970-01-01'==date || date=='' || date==null)
    return '';
    else{
    var today = new Date(date);
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    return dd + '/' + mm + '/' + yyyy;
    }
}
function dateToDMY(date) {
    if('01-01-1970'==date || '1970-01-01'==date || date=='' || date==null || date=='0000-00-00')
    return '';
    else{
    date = new Date(date)
    var d = date.getDate();
    var m = date.getMonth() + 1; //Month from 0 to 11
    var y = date.getFullYear();
    return '' + (d <= 9 ? '0' + d : d) + '-' + (m <= 9 ? '0' + m : m) + '-' + y;
    }
}
function dateToYMD(date) {
    if('01-01-1970'==date || '1970-01-01'==date || date=='' || date==null || date=='0000-00-00')
    return '';
    else{
    date = new Date(date)
    var d = date.getDate();
    var m = date.getMonth() + 1; //Month from 0 to 11
    var y = date.getFullYear();
    return '' + y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);
    }
}
function getUTCDate(date) {
    return moment(date).utc().format('YYYY-MM-DD');
}
function validate_password() {
    var pass = prompt("Please enter password", "");

    var validate = false;
    if (pass == null || pass == "") {
        alert('Please Enter Password');
        return false;
    } else {
        $.ajax({
            type: "POST",
            url: "user/validate_user",
            data: {"pass": pass},
            async: false,
            dataType: "json",
            success: function (result) {
                if (result.status == 'success') {
                    validate = true;
                } else {
                    alert('You have entered incorrect Password');
                    validate = false;
                }
            }
        });
        return validate;
    }
}

function validate_password_b() {

    //var pass = prompt("Please enter password", "");
    return new Promise(function (resolve, reject) {
        bootbox.prompt({
            title: "Enter Password!",
            inputType: 'password',
            async: false,
            callback: function (pass) {
                var validate = false;
                //     alert(pass);
                if (pass == "") {
                    alert('Please Enter Password');
                    validate = false;
                } else if (pass == null) {
                    $('.bootbox').modal('hide');
                    return false;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "user/validate_user",
                        data: {"pass": pass},
                        async: false,
                        dataType: "json",
                        success: function (result) {
                            if (result.status == 'success') {
                                validate = true;
                            } else {
                                alert('You have entered incorrect Password');
                               
                                validate = false;
                            }

                        }
                    });

                }
                resolve(validate)
                return validate;
            }
        });

    });
    // alert('test') ;
};