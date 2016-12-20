$(document).ready(function () {
	//do not show when upgrade is in progress or an error message
	//is visible on the login page
	if (jQuery('#upgrade').length === 0 && jQuery('#body-login .error').length === 0) {
		showSetPassword();
	}
});

// Done when "colorBox" is displayed
function showSetPasswordComplete() {
    $("#userSetPassword #passwordform").on('submit', function(e){

        // TODO: implement basic tests (fields must be set, fields must be same)
        if (($('#pass1').val() == '') || ($('#pass2').val() == '')) {
            $('#passworderror').html(t('user_set_password', 'Both password fields must be set.'));
            $('#passworderror').show();
            return false;
        }

        if ($('#pass1').val() != $('#pass2').val()) {
            $('#passworderror').html(t('user_set_password', 'Passwords differs.'));
            $('#passworderror').show();
            return false;
        }

        if ($('#pass1').val() !== '') {
            var password = $('#pass1').val();
            $.ajax({
                type: 'POST',
                url: OC.generateUrl('/apps/password_policy/policy/set_password'),
                data: {password: password},
                async: false
            }).
            done(function(data) {
                if (data.status == 'success') {
                    var post = $( "#passwordform" ).serialize();
                    $('#passwordchanged').hide();
                    $('#passworderror').hide();
                    // Ajax foo
                    $.post(OC.generateUrl('/apps/user_set_password/api/1.0/changepassword'), post, function(data){
                        if ( data.status === "success" ){
                            $('.strengthify-wrapper').tipsy('hide');
                            OC.Notification.showTemporary( t('user_set_password', 'Password successfully changed') );
                            e.stopImmediatePropagation();
                            e.stopPropagation();
                            e.preventDefault();
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
                    $('#passworderror').html(t('password_policy', 'Password does not comply with the Password Policy.'));
                    $('#passworderror').show();

                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                    return false;
                }
            });
        }
        else {
            $('#passwordchanged').hide();
            $('#passworderror').show();
            return false;
        }

        return false;
    });

    $('#pass1').strengthify({
        zxcvbn: OC.linkTo('core','vendor/zxcvbn/dist/zxcvbn.js'),
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
}

function check_password_policy(e) {
    var password = $('#pass1').val();

    $.ajax({
        type: 'POST',
        url: OC.generateUrl('/apps/password_policy/policy/set_password'),
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
