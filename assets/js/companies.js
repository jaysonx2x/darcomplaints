/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var companyFormID = '#company_form';
var companyTable = null;
$(function(){
    
    showCompanyDatatables();
    
    $(companyFormID).validate({
        errorClass: "js-error",
        ignore: [],
        errorPlacement: function(error, element) {
            $( element ).closest( "form" ) .find( "small." + element.attr( "id" )).append( error );
        },
        rules : {
            company_name : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            address : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            phone : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
        },
        errorElement: "span",
        submitHandler: function() {
            
            submitCompanyData();
            
        }
    });
    
    MyUtils.fnAcceptNumbersOnly('#phone');
    
});


function showCompanyDatatables() {
    
    companyTable = $("#company_table").DataTable({
        "columnDefs": [
            { "sortable": false, "searchable": false, "className": 'text-center v-align-mid', "targets": [5] },
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
             "url"   : BASE_URL + "companies/loadCompaniesDT/",
             "type"  : "POST"
        },
    });
    
}


function showPDFModal() {
    
    var link = 'pdf/companies';

    console.log(link);
    
    $('#THE_PDF').attr('src', BASE_URL+link);
    
    $('#pdf_modal .modal-dialog').addClass('modal-xl');
    $('#pdf_modal').modal('show');

}


function showCompanyFormModal(companyID) {
    
    $(companyFormID).data('validator').resetForm();
    $(companyFormID + ' #passw_strength').removeClass().text('');
    
    if(parseInt(companyID) === 0) { /* ADD */
        
        $(companyFormID).validate();
        $(companyFormID + ' #passw').rules('add',  { minlength : 8, required: true });
        $(companyFormID + ' #confirm_passw').rules('add',  { minlength : 8, required: true, equalTo: "#passw" });
        
    } else {
        
        $(companyFormID).validate();
        $(companyFormID + ' #passw').rules('add',  { required: false });
        $(companyFormID + ' #confirm_passw').rules('add',  { required: false });
        
    }
    
    $(companyFormID)[0].reset();
    $(companyFormID + ' .username').text('');
    $(companyFormID + ' #BTN_EDIT_CONTAINER').addClass('hidden');
    $(companyFormID + ' .PASSW_CONTAINER').removeClass('hidden');
    
    $(companyFormID + '_modal .modal-title').text('Add Company');
    $(companyFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-plus"></i> Add Company');
    
    (parseInt(companyID)>0) ? populateCompanyData(companyID) : '';
    
    $(companyFormID + '_modal').modal('show');
    
}


function submitCompanyData() {
    
    $(companyFormID + ' button[type=submit]').attr('disabled', true).html('Saving...');

    var formData = MyUtils.fnObjectifyForm($(companyFormID).serializeArray());

    $.ajax({
        type: 'POST',
        data: formData,
        dataType: 'json',
        url: BASE_URL + 'companies/saveCompany'
    })
    .done(function(data) {

        if (data.status) {

            companyTable.draw();

            var msg = (parseInt($(companyFormID + ' #id').val())>0) ? 'Company updated!.' : 'New company added!';

            MyUtils.fnShowToasts('success', 'Success', msg);

            $('#company_form_modal').modal('hide');

        }

    });

}


function populateCompanyData(profileID) {
    
    $(companyFormID + ' #IS_PASSW_EDITED').val('0');
    $(companyFormID + ' #BTN_EDIT_CONTAINER').removeClass('hidden');
    $(companyFormID + ' .PASSW_CONTAINER').addClass('hidden');
    
    $('#company_form_modal .modal-title').text('Edit Company');
    $(companyFormID + ' button[type=submit]').attr('disabled', false).html('<i class="fa fa-check"></i> Update Company');
    
    MyUtils.fnShowLoader();
    
    $.ajax({
        type: 'POST',
        data: { 
            id : profileID
        },
        dataType: 'json',
        url: BASE_URL + 'companies/getCompanyDetails'
    })
    .done(function(data) {
        
        console.log(data)

        if (data.company) {
            
            var company = data.company;

            $.each(data.company, function(key, value) {
                console.log(key + ": " + value);
                $(companyFormID + ' #' + key).val(value);
            });
            
        }

        MyUtils.fnHideLoader();

    });
    
}


function confirmDeleteCompany(compID, name) {
    
    MyUtils.fnShowConfirmMessageDlg(`Delete ${name}?`, `Are you sure you want to delete this company?`, 
        function(compID) {
            MyUtils.fnShowLoader();

            $.ajax({
                type: 'POST',
                data: { 
                    id: compID
                },
                dataType: 'json',
                url: BASE_URL + 'companies/deleteCompany'
            })
            .done(function(data) {

                if(data.status) {

                    companyTable.draw();

                    MyUtils.fnShowToasts('success', 'Success', 'Company deleted!');

                }

                MyUtils.fnHideLoader();

            });
        }, 
    compID);
    
}