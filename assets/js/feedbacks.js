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
                    return `<a href="javascript:void(0);" onclick="showFeedbackDetailModal(${row[0]});" class="">${MyUtils.fnFormatMySQLDate(data)}</a>`;
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
            { "targets": 6, 
                "render": function ( data, type, row ) {
                    return `<p title="${data}">${MyUtils.fnTruncate(data, 100)}</p>`;;
                },
                "sortable": true, "searchable": true, "className": 'text-left'
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


function showPDFModal(link) {
    
    console.log(link);
    
    // Show loader
    $("#pdf_loader").show();

    // Clear previous PDF
    $("#THE_PDF").empty();

    // Create iframe + load handler
    const iframe = $(`<iframe class="w-100 h-100" src="${BASE_URL + link}"></iframe>`);

    // When PDF finishes loading → hide loader
    iframe.on("load", function () {
        $("#pdf_loader").hide();
    });

    // Append iframe
    $("#THE_PDF").append(iframe);

    $('#pdf_modal .modal-dialog').addClass('modal-xl');
    $('#pdf_modal').modal('show');

}



function showFeedbackDetailModal(feedbackID) {
    
    MyUtils.fnShowLoader();
    
    $.ajax({
        type: 'POST',
        data: { 
            id : feedbackID
        },
        dataType: 'json',
        url: BASE_URL + 'feedbacks/getFeedbackDetails'
    })
    .done(function(data) {
        
        console.log(data);

        if (data.feedback) {
            
            $('#feedback_detail_'+data.feedback.lang+'_modal .modal-title').text('Feedback - ' + data.feedback.feedback_date);
            
            $.each(data.feedback, function(key, value) {
                $('#feedback_detail_'+data.feedback.lang+'_modal #' + key).attr('disabled', true).val(value);
                
                var $el = $("#feedback_detail_"+data.feedback.lang+"_modal [name='" + key + "']");
                var tag = $el.prop("nodeName");
                
                switch (tag) {
                    case 'INPUT':
                    case 'input':
                        var inputType = $el.attr("type");
                        switch (inputType) {
                            case 'checkbox':
                                break;
                            case 'radio':
                                console.log(key + ": " + value);
                                $("#feedback_detail_"+data.feedback.lang+"_modal [name='" + key + "'][value='" + value + "']").attr('disabled', true).attr('checked', true);
                                break;
                        }
                        break;
                }
                
            });
            
        }
        
        $('#feedback_detail_'+data.feedback.lang+'_modal').modal('show');

        MyUtils.fnHideLoader();

    });
    
}



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