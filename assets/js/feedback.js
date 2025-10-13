/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var feedbackFormID = '#feedback_form';
$(function(){
    
    $(feedbackFormID).validate({
        errorClass: "js-error",
        ignore: [],
        errorPlacement: function(error, element) {
            if (element.attr("type") === "radio") {
                $( element ).closest( "form" ).find( "small." + element.attr( "name" )).append( error );
            } else {
                $( element ).closest( "form" ).find( "small." + element.attr( "id" )).append( error );
            }
        },
        messages: {
            client_type: {
                required: "Please select the client type."
            }
        },
        rules : {
            client_type : {
                required : true,
            },
            feedback_date : {
                required : true,
            },
            sex : {
                min: 1,
                required : true,
            },
            age_group : {
                min: 1,
                required : true,
            },
            service_availed : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            time_in : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            time_out : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            cc1 : {
                required : true
            },
            cc2 : {
                required : true
            },
            cc3 : {
                required : true
            },
        },
        errorElement: "span",
        submitHandler: function() {
            
            submitFeedbackData();
            
        }
    });
    
    MyUtils.fnAcceptNumbersOnly('#phone1');
    
});


function submitFeedbackData() {
    
    $(feedbackFormID + ' button[type=submit]').attr('disabled', true).html('Saving...');

    var formData = MyUtils.fnObjectifyForm($(feedbackFormID).serializeArray());

    $.ajax({
        type: 'POST',
        data: formData,
        dataType: 'json',
        url: BASE_URL + 'outside/saveFeedback'
    })
    .done(function(data) {

        if (data.status) {

            MyUtils.fnShowToasts('success', 'Success', 'Feedback submitted!');
    
            $(feedbackFormID).data('validator').resetForm();
            $(feedbackFormID)[0].reset();
            
            setTimeout(function() {
                $(feedbackFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-check"></i> Submit Feedback');

                window.location.replace(BASE_URL);
            }, 2000);

        }

    });

}