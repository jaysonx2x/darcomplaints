/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var selectedUpdateAnnouncementArr = [];
var uploadedFiles = []; // Used in property-image-uploader.js file (global variable)
var formId = '#announcement_form';
var attachment_type = 2;

const departmentsArr = [];

$(function(){
    
    $(formId).validate({
        errorClass: "js-error",
        ignore: [],
        errorPlacement: function(error, element) {
            $( element ).closest( "form" ) .find( "span." + element.attr( "id" )).append( error );
        },
        rules : {
            announcement_type : {
                required : true,
                min: 1
            },
            title : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            content : {
                minlength : 1,
                required : true,
                normalizer: function( value ) {
                    return $.trim( value );
                }
            },
            publish_date : {
                required : true,
            },
        },
        errorElement: "span",
        submitHandler: function() {
            submitAnnouncementData();
        }
    });
    
});


function showAnnouncementFormModal(announcementID) {
    
    uploadedFiles = [];
    
    // Remove all uploaded images
    $('.jFiler-items-list li').remove();
    
    $(formId).data('validator').resetForm();
    $(formId)[0].reset();
    
    $('#images_container').addClass('hidden');
    $('#images').empty();
    $(formId + ' #uploader_container').removeClass('hidden');
    
    $('#announcement_form_modal .modal-title').text('New Announcement');
    
    (parseInt(announcementID)>0) ? populateAnnouncementData(announcementID) : '';
    
    $('#announcement_form_modal').modal('show');
    
}


function submitAnnouncementData() {
    
    $(formId + ' button[type=submit]').attr('disabled', true).html('Saving...');

    $.ajax({
        type: 'POST',
        data: { 
            id              : $(formId + ' #id').val(),
            publish_date    : $(formId + ' #publish_date').val(),
            title           : $(formId + ' #title').val(),
            content         : $(formId + ' #content').val(),
            announcement_type: $(formId + ' #announcement_type').val(),
            UPLOADED_FILES  : uploadedFiles,
            attachment_type : attachment_type
        },
        dataType: 'json',
        url: BASE_URL + 'announcements/saveAnnouncement'
    })
    .done(function(data) {

        if (data.status) {

            var msg = (parseInt($(formId + ' #id').val())>0) ? 'Record updated successfully.' : 'New record successfully added.';

            MyUtils.fnShowToasts('success', 'Success', msg);

            setTimeout(function() {
                window.location.reload();
            }, 300);
    
            $('#announcement_form_modal').modal('hide');

        }

        $(formId + ' button[type=submit]').attr('disabled', false).html('Submit');

    });
        
}


function populateAnnouncementData(announcementID) {
    
    MyUtils.fnShowLoader();
    
    $('#announcement_form_modal .modal-title').text('Update Announcement');
    
    $.ajax({
        type: 'POST',
        data: { 
            id : announcementID
        },
        dataType: 'json',
        url: BASE_URL + 'announcements/getAnnouncementDetails'
    })
    .done(function(data) {

        if (data.announcement) {

            var announcement = data.announcement;
            var attachments = data.attachments;
    
            $(formId + ' #id').val(announcement.id);
            $(formId + ' #title').val(announcement.title);
            $(formId + ' #publish_date').val(MyUtils.fnFormatMySQLDate(announcement.publish_date, 'ymd', '-'));
            $(formId + ' #announcement_type').val(announcement.announcement_type);
            $(formId + ' #content').val(announcement.content);
                        
            var html = '';
            if(attachments.length>0) {
                
                for(var i=0; i<attachments.length; i++) {
                    
                    var file_url = attachments[i].file_url.split('/');
                    var ext = attachments[i].file_url.split('.').pop();
                    
                    html += '<div url="'+ attachments[i].file_url +'" class="gallery">';
                    
                        html += '<a target="_blank" href="'+ BASE_URL + attachments[i].file_url +'">';
                        
                        if(ext === 'mp4' || ext === 'avi' || ext === 'mkv') {
                            html += '<video width="174" controls muted>';
                                html += '<source src="'+ BASE_URL + attachments[i].file_url +'" type="video/mp4">';
                                html += 'Your browser does not support the video tag.';
                            html += '</video>';
                        } else {
                            html += '<img src="'+ BASE_URL + attachments[i].file_url +'" alt="Image" width="800">';
                        }
                        html += '</a>';
                        html += '<div class="desc" title="' + file_url[file_url.length-1] + '">' + MyUtils.fnTruncate(file_url[file_url.length-1], 15) + '</div>';
                        
                        if(parseInt($('#sess_user_type').val()) === 1) {
                            html += `<button class="delete-btn btn btn-sm btn-danger rounded-pill" 
                                        onclick="confirmDeleteAnnouncementAttachment(\''+ attachments[i].file_url +'\', '+attachments[i].id+');">
                                        <i class="fa fa-trash"></i>
                                    </button>`;
                        }
                    html += '</div>';
                }
                
                $(formId + ' #images_container').removeClass('hidden');
                $(formId + ' #images').empty().append(html);
            }
            
        }

        MyUtils.fnHideLoader();

    });
    
}


function confirmDeleteAnnouncementAttachment(fileUrl, fileId) {
    
    MyUtils.fnShowConfirmMessageDlg('Delete Image?', 'Do you want to delete this image? \n\nNOTE: This is a permanent delete and is NOT recoverable.', doDeleteAnnouncementAttachment, fileUrl+','+fileId);
    
}


function doDeleteAnnouncementAttachment(params) {
    
    MyUtils.fnShowLoader();

    $.ajax({
        type: 'POST',
        data: { 
            id         : params.split(',')[1],
            file_url   : params.split(',')[0],
        },
        dataType: 'json',
        url: BASE_URL + 'announcements/deleteAttachment'
    })
    .done(function(data) {

        if (data.status) {
            
            MyUtils.fnShowToasts('success', 'Success', 'Image deleted successfully.');
    
            $('#images div[url=\''+params.split(',')[0]+'\']').remove();
            
            $(formId + ' #uploader_container').removeClass('hidden');
        }
            
        MyUtils.fnHideLoader();
        
    });
    
}



function confirmDeleteAnnouncement(announcementID) {
    
    MyUtils.fnShowConfirmMessageDlg('Confirm?', 'Do you want to delete this announcement?', doDeleteAnnouncement, announcementID);
    
}


function doDeleteAnnouncement(announcementID) {
    
    MyUtils.fnShowLoader();

    $.ajax({
        type: 'POST',
        data: { 
            id : announcementID,
        },
        dataType: 'json',
        url: BASE_URL + 'announcements/doDeleteAnnouncement'
    })
    .done(function(data) {

        if (data.status) {
            
            MyUtils.fnShowToasts('success', 'Success', 'Announcement deleted successfully.');
            setTimeout(function() {
                window.location.reload();
            }, 300);
    
        }
            
        MyUtils.fnHideLoader();
        
    });
    
}