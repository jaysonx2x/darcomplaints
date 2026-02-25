/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var complaintFormID = '#complaint_form';
var statusFormID = '#change_status_form';
var complaintTable = null;
$(function(){
    
    showComplaintDatatables(10, 'btn_0');
    
    $(statusFormID).validate({
        errorClass: "js-error",
        ignore: [],
        errorPlacement: function(error, element) {
            $( element ).closest( "form" ) .find( "small." + element.attr( "id" )).append( error );
        },
        rules : {
            addressed_by : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            status : {
                min: 0,
                required : true,
            },
            addressed_date : {
                required : true,
            },
        },
        errorElement: "span",
        submitHandler: function() {
            
            submitComplaintStatusData();
            
        }
    });
    
});


function showComplaintDatatables(status, buttonID) {
    
    $('#filter_container > button').removeClass('active');
    $('#'+buttonID).addClass('active');
    
    complaintTable = $("#complaint_table").DataTable({
        "columnDefs": [
            { "targets": 1, 
                "render": function ( data, type, row ) {
                    return `<a href="javascript:void(0);" onclick="showComplaintDetailModal(${row[0]});" class="">${data}</a>`;
                },
                "sortable": true, "searchable": true, "className": 'text-center'
            },
            { "targets": 2, 
                "render": function ( data, type, row ) {
                    return MyUtils.fnFormatMySQLDate(data);
                },
                "sortable": true, "searchable": true, "className": 'text-center'
            },
            { "targets": 3, 
                "render": function ( data, type, row ) {
                    return `<div class="d-flex">
                        <div>
                            <div class="font-weight-bold">${data}</div>
                            <small class="text-muted">${row[4]}</small><br>
                            <small class="text-muted">${row[5]}</small>
                        </div>
                    </div>`;
                },
                "sortable": true, "searchable": true, 
            },
            { "targets": 6, 
                "render": function ( data, type, row ) {
                    return MyUtils.fnComplaintStatus(data, row[7], row[8]);
                },
                "sortable": true, "searchable": true, "className": 'text-center'
            },
            { "sortable": false, "searchable": false, "className": 'text-center v-align-mid', "targets": [7] },
            { "visible": false, "searchable": false, "targets": [0,4,5,7,8] }
        ],
        "order": [[ 2, "desc" ]],
        "paginationType": "full_numbers",
        "autoWidth": false,
        "destroy": true,
        "processing": true,
        "jQueryUI": false,
        "serverSide": true,
        "displayLength" : 30 , // number of rows to display
        "lengthMenu": [[30, 50, 100, -1], [30, 50, 100, "All"]],
        "ajax": {
             "url"   : BASE_URL + "complaints/loadComplaintsDT/"+status,
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


function showComplaintDetailModal(complaintID) {
    
    MyUtils.fnShowLoader();
    
    $.ajax({
        type: 'POST',
        data: { 
            id : complaintID
        },
        dataType: 'json',
        url: BASE_URL + 'complaints/getComplaintDetails'
    })
    .done(function(data) {
        
        console.log(data);

        if (data.complaint) {
            
            $('#complaint_detail_modal .modal-title').text('Complaint - ' + data.complaint.control_no);
            
            $.each(data.complaint, function(key, value) {
                console.log(key + ": " + value);
                $('#complaint_detail_modal #' + key).attr('disabled', true).val(value);
            });
            
        }
        
        $('#complaint_detail_modal').modal('show');

        MyUtils.fnHideLoader();

    });
    
}


function showStatusFormModal(complaintID, status, addressed_by, addressed_date) {
    
    $('#change_status_modal').modal('show');
    $(statusFormID + ' #id').val(complaintID);
    $(statusFormID + ' #status').val(status);
    $(statusFormID + ' #addressed_by').val(addressed_by);
    $(statusFormID + ' #addressed_date').val(MyUtils.fnFormatMySQLDate(addressed_date, 'ymd', '-'));
    
}


function submitComplaintStatusData() {
    
    $(statusFormID + ' button[type=submit]').attr('disabled', true).html('Saving...');

    $.ajax({
        type: 'POST',
        data: {
            id              : $(statusFormID + ' #id').val(),
            status          : $(statusFormID + ' #status').val(),
            addressed_by    : $(statusFormID + ' #addressed_by').val(),
            addressed_date  : $(statusFormID + ' #addressed_date').val()
        },
        dataType: 'json',
        url: BASE_URL + 'complaints/saveComplaintStatus'
    })
    .done(function(data) {

        if (data.status) {

            MyUtils.fnShowToasts('success', 'Success', 'Complaint status updated!');
    
            $(statusFormID).data('validator').resetForm();
            $(statusFormID)[0].reset();
            
            complaintTable.draw();
            
            $('#change_status_modal').modal('hide');
            
            $(statusFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-check"></i> Submit');
            
        }

    });

}


function confirmDeleteComplaint(compID) {
    
    MyUtils.fnShowConfirmMessageDlg(`Delete Complaint?`, `Are you sure you want to delete this complaint?`, 
        function(compID) {
            MyUtils.fnShowLoader();

            $.ajax({
                type: 'POST',
                data: { 
                    id: compID
                },
                dataType: 'json',
                url: BASE_URL + 'complaints/deleteComplaint'
            })
            .done(function(data) {

                if(data.status) {

                    complaintTable.draw();

                    MyUtils.fnShowToasts('success', 'Success', 'Complaint deleted!');

                }

                MyUtils.fnHideLoader();

            });
        }, 
    compID);
    
}