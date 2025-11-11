/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var complaintFormID = '#complaint_form';
var complaintTable = null;
$(function(){
    
    showComplaintDatatables();
    
});


function showComplaintDatatables() {
    
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
            { "sortable": false, "searchable": false, "className": 'text-center v-align-mid', "targets": [7] },
            { "visible": false, "searchable": false, "targets": [0,4,5] }
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
             "url"   : BASE_URL + "complaints/loadComplaintsDT/",
             "type"  : "POST"
        },
    });
    
}


function showPDFModal(complaintID) {
    
    alert('Coming soon!');
    
    var link = 'pdf/complaints/' + complaintID;

    console.log(link);
    
    $('#THE_PDF').attr('src', BASE_URL+link);
    
    $('#pdf_modal .modal-dialog').addClass('modal-xl');
    $('#pdf_modal').modal('show');

}


function showComplaintDetailModal(feedbackID) {
    
    MyUtils.fnShowLoader();
    
    $.ajax({
        type: 'POST',
        data: { 
            id : feedbackID
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