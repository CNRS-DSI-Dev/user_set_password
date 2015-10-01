$(document).ready(function () {
	//do not show when upgrade is in progress or an error message
	//is visible on the login page
	if (jQuery('#upgrade').length === 0 && jQuery('#body-login .error').length === 0) {
		showSetPassword();
	}
});

// Done when "colorBox" is displayed
function showSetPasswordComplete() {
    $("#userSetPassword #passwordform").on('submit', function(){

        // TODO: implement basic tests (fields must be set, fields must be same)

        if ($('#pass1').val() !== '') {
            // Serialize the data
            var post = $( "#passwordform" ).serialize();
            $('#passwordchanged').hide();
            $('#passworderror').hide();
            // Ajax foo
            $.post(OC.generateUrl('/apps/user_set_password/api/1.0/changepassword'), post, function(data){
                if ( data.status === "success" ){
                    $('.strengthify-wrapper').tipsy('hide');
                    OC.Notification.show( t('user_set_password', 'Password successfully changed') );
                    setTimeout(OC.Notification.hide, 7000);
                    $.colorbox.close();
                }
                else {
                    if (typeof(data.data) !== "undefined") {
                        $('#passworderror').html(data.data.msg);
                    } else {
                        $('#passworderror').html(t('user_set_password', 'Unable to change password'));
                    }
                    $('#passworderror').show();
                }
            });
            return false;
        }
        else {
            $('#passwordchanged').hide();
            $('#passworderror').show();
            return false;
        }
    });

    $('#pass1').strengthify({
        zxcvbn: OC.linkTo('3rdparty','zxcvbn/js/zxcvbn.js'),
        titles: [
            t('core', 'Very weak password'),
            t('core', 'Weak password'),
            t('core', 'So-so password'),
            t('core', 'Good password'),
            t('core', 'Strong password')
        ]
    });

    var setShowPassword = function(input, label) {
        input.showPassword().keyup();
    };
    setShowPassword($('#pass1'), $('label[for=personal-show]'));
    setShowPassword($('#pass2'), $('label[for=personal-confirm-show]'));

    $("#userSetPassword #passwordbutton").bindFirst('click',function(e){
        check_password_policy(e);
    });
}

function check_password_policy(e) {
    var password = $('#pass1').val();

    $.ajax({
        type: 'POST',
        url: OC.filePath('password_policy', 'ajax', 'testPassword.php'),
        data: {password: password},
        success: function(data){
            if (data.status == 'success') {
                return true;
            }
            else {
                $('#passworderror').html(t('password_policy', 'Password does not comply with the Password Policy.'));
                $('#passworderror').show();

                e.stopImmediatePropagation();
                e.stopPropagation();
                e.preventDefault();
                return false;
            }
        }
    });

}

$.fn.bindFirst = function(name, fn) {
    this.on(name, fn);

    this.each(function() {
        var handlers = $._data(this, 'events')[name.split('.')[0]];
        var handler = handlers.pop();
        handlers.splice(0, 0, handler);
    });
};
