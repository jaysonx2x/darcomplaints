/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var userFormID = '#user_form';
$(function(){
    
    $(userFormID).validate({
        errorClass: "js-error",
        ignore: [],
        errorPlacement: function(error, element) {
            $( element ).closest( "form" ) .find( "small." + element.attr( "id" )).append( error );
        },
        rules : {
            firstname : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            lastname : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            phone : {
                minlength : 1,
                required : true,
            },
            gender : {
                required : true,
                min: 1
            },
            email : {
                email: true
            },
        },
        errorElement: "span",
        submitHandler: function() {
            saveUser();
        }
    });
    
    MyUtils.fnAcceptNumbersOnly('#phone');
    
});


function saveUser() {
    
    $(userFormID + ' button[type=submit]').attr('disabled', true).html('Updating...');

    var formData = MyUtils.fnObjectifyForm($(userFormID).serializeArray());

    $.ajax({
        type: 'POST',
        data: formData,
        dataType: 'json',
        url: BASE_URL + 'users/saveUser'
    })
    .done(function(data) {

        if (data.status) {

            var msg = (parseInt($(userFormID + ' #id').val())>0) ? 'Record updated successfully.' : 'New record successfully added.';

            MyUtils.fnShowToasts('success', 'Success', msg);
            
            $(userFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-check"></i> Update Profile');

        } else {
            $(userFormID + ' .username').text(data.errors);
        }

    });

}


function showHidePasswordContainer() {
    
    $(userFormID + ' .PASSW_CONTAINER').toggleClass('hidden');
    $(userFormID + ' #passw').focus();
    $(userFormID + ' #IS_PASSW_EDITED').val(($('.PASSW_CONTAINER').hasClass('hidden')) ? 0 : 1);
    
    if(($('.PASSW_CONTAINER').hasClass('hidden'))) { 
        $(userFormID + ' #BTN_EDIT_CONTAINER span').addClass('btn-primary').removeClass('btn-danger').html('<i class="fa fa-pencil"> Edit Password</a>');
        $(userFormID).validate();
        $(userFormID + ' #passw').rules('add',  { required: false });
        $(userFormID + ' #confirm_passw').rules('add',  { required: false });
        
    } else { 
        
        $(userFormID + ' #BTN_EDIT_CONTAINER span').removeClass('btn-primary').addClass('btn-danger').html('<i class="fa fa-close"> Cancel</a>');
        $(userFormID).validate();
        $(userFormID + ' #passw').rules('add',  { minlength : 8, required: true });
        $(userFormID + ' #confirm_passw').rules('add',  { minlength : 8, required: true, equalTo: "#passw" });
        
    }
    
}


function checkPasswordStrength(passw) {
    
    var strength = 0;
    
    //if length is 9 characters or more, increase strength value
    if (passw.length > 9) strength += 1
 
    //if password contains both lower and uppercase characters, increase strength value
    if (passw.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1
 
    //if it has numbers and characters, increase strength value
    if (passw.match(/([a-zA-Z])/) && passw.match(/([0-9])/))  strength += 1 
 
    //if it has one special character, increase strength value
    if (passw.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1
 
    //if it has two special characters, increase strength value
    if (passw.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1

    
    //now we have calculated strength value, we can return messages
 
    //if value is less than 2
    if (strength < 3 ) {
        $('#passw_strength').removeClass().addClass('text-danger').text('Weak');
    } else if (strength == 3 ) {
        $('#passw_strength').removeClass().addClass('text-warning').text('Medium');
    } else {
        $('#passw_strength').removeClass().addClass('text-success').text('Strong');
    }
    
}



function showHidePassword(fieldID) {
    
    if($('#btn_show_' + fieldID + ' i').hasClass('fa-eye')) {
        
        $('#btn_show_' + fieldID + ' i').removeClass('fa-eye').addClass('fa-eye-slash');
        $('#btn_show_' + fieldID).attr('title', 'Hide Password');
        $('#' + fieldID).attr('type', 'text');
        
    } else {
        
        $('#btn_show_' + fieldID + ' i').removeClass('fa-eye-slash').addClass('fa-eye');
        $('#btn_show_' + fieldID).attr('title', 'Show Password');
        $('#' + fieldID).attr('type', 'password');
        
    }
    
}