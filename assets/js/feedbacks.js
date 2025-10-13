/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var feedbackFormID = '#feedback_form';
var feedbackTable = null;
$(function(){
    
    showFeedbackDatatables();
    
});


function showFeedbackDatatables() {
    
    feedbackTable = $("#feedback_table").DataTable({
        "columnDefs": [
            { "targets": 1, 
                "render": function ( data, type, row ) {
                    return MyUtils.fnFormatMySQLDate(data);
                },
                "sortable": true, "searchable": true, "className": 'text-center'
            },
            { "targets": 2, 
                "render": function ( data, type, row ) {
                    var type = MyUtils.fnClientType(data);
                    return `<span class="badge badge-${type.clas}">${type.text}</span>`;
                },
                "sortable": true, "searchable": true, "className": 'text-center'
            },
            { "targets": 3, 
                "render": function ( data, type, row ) {
                    var age = MyUtils.fnAgeGroup(data);
                    return `<span class="badge badge-${age.clas}">${age.text}</span>`;
                },
                "sortable": true, "searchable": true, "className": 'text-center'
            },
            { "sortable": false, "searchable": false, "className": 'text-center v-align-mid', "targets": [7] },
            { "visible": false, "searchable": false, "targets": [0] }
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
             "url"   : BASE_URL + "feedbacks/loadFeedbacksDT/",
             "type"  : "POST"
        },
    });
    
}


function showPDFModal(feedbackID) {
    
    alert('Coming soon!');
    
    var link = 'pdf/feedbacks/' + feedbackID;

    console.log(link);
    
    $('#THE_PDF').attr('src', BASE_URL+link);
    
    $('#pdf_modal .modal-dialog').addClass('modal-xl');
    $('#pdf_modal').modal('show');

}


//function showFeedbackFormModal(feedbackID) {
//    
//    $(feedbackFormID).data('validator').resetForm();
//    $(feedbackFormID)[0].reset();
//    
//    $(feedbackFormID + '_modal .modal-title').text('Add Feedback');
//    $(feedbackFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-plus"></i> Add Feedback');
//    
//    (parseInt(feedbackID)>0) ? populateFeedbackData(feedbackID) : '';
//    
//    $(feedbackFormID + '_modal').modal('show');
//    
//}
//
//
//function submitFeedbackData() {
//    
//    $(feedbackFormID + ' button[type=submit]').attr('disabled', true).html('Saving...');
//
//    var formData = MyUtils.fnObjectifyForm($(feedbackFormID).serializeArray());
//
//    $.ajax({
//        type: 'POST',
//        data: formData,
//        dataType: 'json',
//        url: BASE_URL + 'feedbacks/saveFeedback'
//    })
//    .done(function(data) {
//
//        if (data.status) {
//
//            feedbackTable.draw();
//
//            var msg = (parseInt($(feedbackFormID + ' #id').val())>0) ? 'Feedback updated!.' : 'New feedback added!';
//
//            MyUtils.fnShowToasts('success', 'Success', msg);
//
//            $('#feedback_form_modal').modal('hide');
//
//        }
//
//    });
//
//}
//
//
//function populateFeedbackData(profileID) {
//    
//    $('#feedback_form_modal .modal-title').text('Edit Feedback');
//    $(feedbackFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-check"></i> Update Feedback');
//    
//    MyUtils.fnShowLoader();
//    
//    $.ajax({
//        type: 'POST',
//        data: { 
//            id : profileID
//        },
//        dataType: 'json',
//        url: BASE_URL + 'feedbacks/getFeedbackDetails'
//    })
//    .done(function(data) {
//        
//        console.log(data)
//
//        if (data.feedback) {
//            
//            $.each(data.feedback, function(key, value) {
//                console.log(key + ": " + value);
//                $(feedbackFormID + ' #' + key).val(value);
//            });
//            
//        }
//
//        MyUtils.fnHideLoader();
//
//    });
//    
//}


function confirmDeleteFeedback(compID) {
    
    MyUtils.fnShowConfirmMessageDlg(`Delete Feedback?`, `Are you sure you want to delete this feedback?`, 
        function(compID) {
            MyUtils.fnShowLoader();

            $.ajax({
                type: 'POST',
                data: { 
                    id: compID
                },
                dataType: 'json',
                url: BASE_URL + 'feedbacks/deleteFeedback'
            })
            .done(function(data) {

                if(data.status) {

                    feedbackTable.draw();

                    MyUtils.fnShowToasts('success', 'Success', 'Feedback deleted!');

                }

                MyUtils.fnHideLoader();

            });
        }, 
    compID);
    
}