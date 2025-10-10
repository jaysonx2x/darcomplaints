/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var complaintFormID = '#complaint_form';
var complaintTable = null;
$(function(){
    
    showComplaintDatatables();
    
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


function showComplaintDatatables() {
    
    complaintTable = $("#complaint_table").DataTable({
        "columnDefs": [
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


function showComplaintFormModal(complaintID) {
    
    $(complaintFormID).data('validator').resetForm();
    $(complaintFormID)[0].reset();
    
    $(complaintFormID + '_modal .modal-title').text('Add Complaint');
    $(complaintFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-plus"></i> Add Complaint');
    
    (parseInt(complaintID)>0) ? populateComplaintData(complaintID) : '';
    
    $(complaintFormID + '_modal').modal('show');
    
}


function submitComplaintData() {
    
    $(complaintFormID + ' button[type=submit]').attr('disabled', true).html('Saving...');

    var formData = MyUtils.fnObjectifyForm($(complaintFormID).serializeArray());

    $.ajax({
        type: 'POST',
        data: formData,
        dataType: 'json',
        url: BASE_URL + 'complaints/saveComplaint'
    })
    .done(function(data) {

        if (data.status) {

            complaintTable.draw();

            var msg = (parseInt($(complaintFormID + ' #id').val())>0) ? 'Complaint updated!.' : 'New complaint added!';

            MyUtils.fnShowToasts('success', 'Success', msg);

            $('#complaint_form_modal').modal('hide');

        }

    });

}


function populateComplaintData(profileID) {
    
    $('#complaint_form_modal .modal-title').text('Edit Complaint');
    $(complaintFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-check"></i> Update Complaint');
    
    MyUtils.fnShowLoader();
    
    $.ajax({
        type: 'POST',
        data: { 
            id : profileID
        },
        dataType: 'json',
        url: BASE_URL + 'complaints/getComplaintDetails'
    })
    .done(function(data) {
        
        console.log(data)

        if (data.complaint) {
            
            $.each(data.complaint, function(key, value) {
                console.log(key + ": " + value);
                $(complaintFormID + ' #' + key).val(value);
            });
            
        }

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