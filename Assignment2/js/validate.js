$(document).ready(function() {
	$('#username').after('<span class=\'info\' id=\'userid\'></span>'); //Add new element after the specified nodeId element
    $('#userid').hide();

    $('#password').after('<span class=\'info\' id=\'pswd\'></span>');
    $('#pswd').hide();

    $('#email').after('<span class=\'info\' id=\'emailid\'></span>');
    $('#emailid').hide();

    $('#username').focusin(function() {
        $('#userid').removeClass('ok'); //Removes the class name (class = "ok") becomes (class)
        $('#userid').removeClass('error');
        $('#userid').addClass('info'); //Adds the class name (class) becomes (class="info")
        $('#userid').html('Enter valid username'); //Replaces the html element after the userId id with the following line (<span> Enter...</span>)
        $('#userid').show();
    });

    $('#password').focusin(function() {
        $('#pswd').removeClass('ok');
        $('#pswd').removeClass('error');
        $('#pswd').addClass('info');
        $('#pswd').html('Enter valid password');
        $('#pswd').show();
    });

    $('#email').focusin(function() {
        $('#emailid').removeClass('ok');
        $('#emailid').removeClass('error');
        $('#emailid').addClass('info');
        $('#emailid').html('Enter valid email');
        $('#emailid').show();
    });

    $('#username').focusout(function() {
        $('#userid').hide();
        if ($('#username').val().length > 0) {
            if (!$(this).val().match(/^[0-9a-zA-Z]+$/)) {
                $('#userid').html('Error. Username must contain only alphabetical or numeric characters.');
                $('#userid').removeClass('ok');
                $('#userid').removeClass('info');       
                $('#userid').addClass('error');
                $('#userid').show();
            } else {
                $('#userid').html('OK');
                $('#userid').removeClass('error');
                $('#userid').removeClass('info');
                $('#userid').addClass('ok');
                $('#userid').show();
            }
        }
    });

    $('#password').focusout(function() {
        $('#pswd').hide();
        if ($(this).val().length > 0) {
            if ($(this).val().length < 6) {
                $('#pswd').html('Error. Password should be at least 6 characters long.');
                $('#pswd').removeClass('ok');
                $('#pswd').removeClass('info');
                $('#pswd').addClass('error');
                $('#pswd').show();
            } else {
                $('#pswd').html('OK');
                $('#pswd').removeClass('error');
                $('#pswd').removeClass('info');
                $('#pswd').addClass('ok');
                $('#pswd').show();
            }
        }
    });

    $('#email').focusout(function() {
        $('#emailid').hide();   
        if ($(this).val().length > 0) {
            if (!$(this).val().match(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{3}$/)) {
                $('#emailid').html('Error. Email should be a valid email address.');
                $('#emailid').removeClass('ok');
                $('#emailid').removeClass('info');
                $('#emailid').addClass('error');
                $('#emailid').show();
                } else {
                $('#emailid').html('OK');
                $('#emailid').removeClass('error');
                $('#emailid').removeClass('info');
                $('#emailid').addClass('ok');
                $('#emailid').show();
            }
        }
    });
	
});
