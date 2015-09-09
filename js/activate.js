$(document).ready(function () {
	//do not show when upgrade is in progress or an error message
	//is visible on the login page
	if (jQuery('#upgrade').length === 0 && jQuery('#body-login .error').length === 0) {
		showSetPassword();
	}

    $("#userSetPassword #passwordbutton").click( function(){
        alert('hop');
        return false;

        if ($('#pass1').val() !== '' && $('#pass2').val() !== '') {
            // Serialize the data
            var post = $( "#passwordform" ).serialize();
            $('#passwordchanged').hide();
            $('#passworderror').hide();
            // Ajax foo
            $.post(OC.generateUrl('/settings/personal/changepassword'), post, function(data){
                if( data.status === "success" ){
                    $('#pass1').val('');
                    $('#pass2').val('');
                    $('#passwordchanged').show();
                } else{
                    if (typeof(data.data) !== "undefined") {
                        $('#passworderror').html(data.data.message);
                    } else {
                        $('#passworderror').html(t('Unable to change password'));
                    }
                    $('#passworderror').show();
                }
            });
            return false;
        } else {
            $('#passwordchanged').hide();
            $('#passworderror').show();
            return false;
        }

    });

    $('#pass2').strengthify({
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
    setShowPassword($('#pass2'), $('label[for=personal-show]'));
});
