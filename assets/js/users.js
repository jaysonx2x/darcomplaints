/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var userFormID = '#user_form';
var usersTable = null;
$(function(){
    
    showUserDatatables();
    
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
            user_type : {
                required : true,
                min: 1
            },
            email : {
                email: true
            },
            username : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
        },
        errorElement: "span",
        submitHandler: function() {
            saveUser();
        }
    });
    
    MyUtils.fnAcceptNumbersOnly('#phone');
    
});


function showUserDatatables() {
    
    usersTable = $("#user_table").DataTable({
        "columnDefs": [
            { "targets": 3, 
                "render": function ( data, type, row ) {
                    return `<div class="d-flex">
                        <img src="${BASE_URL + row[1]}" alt="Avatar" class="rounded-circle mr-2" width="50" height="50" />
                        <div>
                            <div class="font-weight-bold">${data}</div>
                            <div class="text-muted">${row[2]}</div>
                        </div>
                    </div>`;
                },
                "sortable": true, "searchable": false, 
            },
            { "targets": 4, 
                "render": function ( data, type, row ) {
                    return (data) ? data : '-';
                },
                "sortable": true, "searchable": true, 
            },
            { "targets": 5, 
                "render": function ( data, type, row ) {
                    var userType = MyUtils.fnFormatUserType(data);
                    return `<span class="badge badge-${userType.clas}">${userType.text}</span>`;
                },
                "sortable": true, "searchable": true, "className": 'text-center'
            },
            { "sortable": false, "searchable": false, "className": 'text-center v-align-mid', "targets": [6] },
            { "visible": false, "searchable": false, "targets": [0,1,2] }
        ],
        "order": [[ 2, "asc" ]],
        "paginationType": "full_numbers",
        "autoWidth": false,
        "destroy": true,
        "processing": true,
        "jQueryUI": false,
        "serverSide": true,
        "displayLength" : 30 , // number of rows to display
        "lengthMenu": [[30, 50, 100, -1], [30, 50, 100, "All"]],
        "ajax": {
             "url"   : BASE_URL + "users/loadUsersDT/",
             "type"  : "POST"
        },
    });
    
}


function showPDFModal() {
    
    var link = 'pdf/users';

    console.log(link);
    
    $('#THE_PDF').attr('src', BASE_URL+link);
    
    $('#pdf_modal .modal-dialog').addClass('modal-xl');
    $('#pdf_modal').modal('show');

}


function showUserFormModal(userID) {
    
    $(userFormID).data('validator').resetForm();
    $(userFormID + ' #passw_strength').removeClass().text('');
    
    if(parseInt(userID) === 0) { /* ADD */
        
        $(userFormID).validate();
        $(userFormID + ' #passw').rules('add',  { minlength : 8, required: true });
        $(userFormID + ' #confirm_passw').rules('add',  { minlength : 8, required: true, equalTo: "#passw" });
        
    } else {
        
        $(userFormID).validate();
        $(userFormID + ' #passw').rules('add',  { required: false });
        $(userFormID + ' #confirm_passw').rules('add',  { required: false });
        
    }
    
    $(userFormID)[0].reset();
    $(userFormID + ' .username').text('');
    $(userFormID + ' #BTN_EDIT_CONTAINER').addClass('hidden');
    $(userFormID + ' #BTN_EDIT_CONTAINER span').addClass('btn-primary').removeClass('btn-danger').html('<i class="fa fa-pencil"> Edit Password</a>');
    $(userFormID + ' .PASSW_CONTAINER').removeClass('hidden');
    
    $(userFormID + '_modal .modal-title').text('Add User');
    $(userFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-plus"></i> Add User');
    
    (parseInt(userID)>0) ? populateUserData(userID) : '';
    
    $(userFormID + '_modal').modal('show');
    
}


function saveUser() {
    
    $(userFormID + ' button[type=submit]').attr('disabled', true).html('Saving...');

    var formData = MyUtils.fnObjectifyForm($(userFormID).serializeArray());

    $.ajax({
        type: 'POST',
        data: formData,
        dataType: 'json',
        url: BASE_URL + 'users/saveUser'
    })
    .done(function(data) {

        if (data.status) {

            usersTable.draw();

            var msg = (parseInt($(userFormID + ' #profiles_id').val())>0) ? 'Record updated successfully.' : 'New record successfully added.';

            MyUtils.fnShowToasts('success', 'Success', msg);

            $('#user_form_modal').modal('hide');

        } else {
            $(userFormID + ' .username').text(data.errors);
        }

    });

}


function populateUserData(profileID) {
    
    $(userFormID + ' #IS_PASSW_EDITED').val('0');
    $(userFormID + ' #BTN_EDIT_CONTAINER').removeClass('hidden');
    $(userFormID + ' .PASSW_CONTAINER').addClass('hidden');
    
    $('#user_form_modal .modal-title').text('Edit User');
    $(userFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-check"></i> Update User');
    
    MyUtils.fnShowLoader();
    
    $.ajax({
        type: 'POST',
        data: { 
            id : profileID
        },
        dataType: 'json',
        url: BASE_URL + 'users/getUserDetails'
    })
    .done(function(data) {
        
        console.log(data)

        if (data.user) {
            
            var user = data.user;

            $(userFormID + ' #the_camera').html('<img id="profile_picture" class="img-fluid img-circle mb-2" style="width: 340px; height: 300px;" src="'+BASE_URL+user.profile_url+'" alt="round-img">');
            $(userFormID + ' #id').val(user.id);
            $(userFormID + ' #old_profile_url').val(user.profile_url);

            $.each(data.user, function(key, value) {
                console.log(key + ": " + value);
                $(userFormID + ' #' + key).val(value);
            });
            
            $(userFormID + ' #profile_url').val('');
            $(userFormID + ' #passw').val('');
            
            setTimeout(function() {
                onchangeUserType(user.user_type);
            }, 300);
            
        }

        MyUtils.fnHideLoader();

    });
    
}


function onchangeUserType(userType) {
    
    $(userFormID).validate();
    switch (parseInt(userType)) {
        case 2: // Supervisor
            $(userFormID + ' #company_container').removeClass('hidden');
            $(userFormID + ' #company_id').rules('add',  { min: 1, required: true });
            break;
        default :
            $(userFormID + ' #company_container').addClass('hidden');
            $(userFormID + ' #company_id').rules('add',  { required: false });
    }
    
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


function confirmDeleteUser(userID, name) {
    
    MyUtils.fnShowConfirmMessageDlg(`Delete ${name}?`, `Are you sure you want to delete this user?`, 
        function(compID) {
            MyUtils.fnShowLoader();

            $.ajax({
                type: 'POST',
                data: { 
                    id: compID
                },
                dataType: 'json',
                url: BASE_URL + 'users/deleteUser'
            })
            .done(function(data) {

                if(data.status) {

                    usersTable.draw();

                    MyUtils.fnShowToasts('success', 'Success', 'User deleted!');

                }

                MyUtils.fnHideLoader();

            });
        }, 
    userID);
    
}