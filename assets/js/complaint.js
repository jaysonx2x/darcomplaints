/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var complaintFormID = '#complaint_form';
$(function(){
    
    $(complaintFormID).validate({
        errorClass: "js-error",
        ignore: [],
        errorPlacement: function(error, element) {
            $( element ).closest( "form" ) .find( "small." + element.attr( "id" )).append( error );
        },
        rules : {
            fullname : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            complaint_date : {
                required : true,
            },
            address : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            id_no : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            phone1 : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            email : {
                required : true,
                email : true,
            },
            concerns : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
        },
        errorElement: "span",
        submitHandler: function() {
            
            submitComplaintData();
            
        }
    });
    
    MyUtils.fnAcceptNumbersOnly('#phone1');
    
});


function submitComplaintData() {
    
    $(complaintFormID + ' button[type=submit]').attr('disabled', true).html('Saving...');

    var formData = MyUtils.fnObjectifyForm($(complaintFormID).serializeArray());

    $.ajax({
        type: 'POST',
        data: formData,
        dataType: 'json',
        url: BASE_URL + 'outside/saveComplaint'
    })
    .done(function(data) {

        if (data.status) {

            MyUtils.fnShowToasts('success', 'Success', 'Complaint submitted!');
    
            $(complaintFormID).data('validator').resetForm();
            $(complaintFormID)[0].reset();
            
            setTimeout(function() {
                $(complaintFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-check"></i> Submit Complaint');

                window.location.replace(BASE_URL);
            }, 2000);

        }

    });

}