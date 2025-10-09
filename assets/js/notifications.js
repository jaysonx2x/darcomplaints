/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


$(function() {
    loadUserNotifications();
    
    setInterval(loadUserNotifications, 1500);
    
});


function loadUserNotifications() {
    
    MyUtils.fnShowLoader();
    
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: BASE_URL + 'notifications/getUserNotifications'
    })
    .done(function(data) {

        var html = '';
        
        if(data.notifications.length>0) {
            
            var notis = data.notifications;
            var noti_count = data.noti_count;
            
            $('#noti_count').text(parseInt(noti_count)>0 ? noti_count : '');
            
            for(var i=0; i<notis.length; i++) {
                
                var noti = notis[i];
                
                html += `<a class="dropdown-item d-flex align-items-start" href="javascript:void(0);" onclick="showNotificationDetailModal(${noti.id})">
                        <div class="mr-2">
                            <img src="${BASE_URL+noti.profile_url}" class="rounded-circle" style="width: 60px;" alt="Profile">
                        </div>
                        <div class="flex-grow-1">
                            <div class="font-weight-bold">${noti.title}</div>
                            <small class="text-muted d-block text-truncate" style="max-width: 250px;">
                                ${noti.message}
                            </small>
                            <small class="text-muted">${MyUtils.fnTimeElapsedMysqlDate(noti.noti_date)}</small>
                        </div>
                    </a>
                    <div class="dropdown-divider m-0"></div>
                `;
                
            }
            
        } else {
            html = `
                <a class="dropdown-item d-flex align-items-start" href="javascript:void(0);" >
                    <div class="mr-3">
                        <i ></i>
                    </div>
                    <div class="flex-grow-1 text-center">
                        <small class="text-muted d-block text-truncate p-1" style="max-width: 250px;">
                            No notifications.
                        </small>
                    </div>
                </a>
            `;
        }

        $('#notifications').empty().append(html);
        
        MyUtils.fnHideLoader();

    });

}

function showNotificationDetailModal(notiID) {
    MyUtils.fnShowLoader();
    
    $.ajax({
        type: 'POST',
        data: { 
            id : notiID
        },
        dataType: 'json',
        url: BASE_URL + 'notifications/getNotificationDetails'
    })
    .done(function(data) {

        console.log(data)

        if (data.notification) {
            
            var noti = data.notification;
            var detail = data.detail;
            var attachments = data.attachments;
            
            var title = '';
            var content = '';
            switch (parseInt(noti.noti_type)) {
                case 1:
                    title = 'REPORT';
                    content = `
                        <h5 class="mb-3">${title}</h5>
                        <p style="white-space: pre-line;">${detail.notes}</p>
                    `;
                    break;
                case 2:
                    title = 'ANNOUNCEMENT';
                    var type = MyUtils.fnFormatAnnouncementType(detail.announcement_type);
                    content = `
                        <h5 class="mb-3">${title}</h5>
                        <p><strong></strong> <span class="badge badge-${type.clas} mb-2">${type.text}</span></p>
                        <p style="white-space: pre-line;">${detail.content}</p>
                    `;
                    break;
                case 3:
                    title = 'SENT FILES';
                    content = `
                        <h5 class="mb-3">${title}</h5>
                        <p style="white-space: pre-line;">${detail.remarks}</p>
                    `;
                    break;
            }
            
            var html = `<div class="card shadow-sm">
                <!-- Header with profile -->
                <div class="card-header bg-white d-flex align-items-center">
                    <img src="${BASE_URL+detail.profile_url}" class="rounded-circle mr-3" style="width: 60px;" alt="Profile">
                    <div class="flex-grow-1">
                        <h6 class="mb-0">${detail.fullname}</h6>
                        <small class="text-muted">${detail.username}</small>
                    </div>
                    <div>
                        <small class="text-muted">${MyUtils.fnFormatMySQLDate(noti.noti_date)} · ${MyUtils.fnFormatMySQLDate(noti.noti_date, 'hia')}</small>
                    </div>
                </div>

                <!-- Message -->
                <div class="card-body">
                    ${content}
                </div>`;

                if(attachments.length>0) {
                    html += `
                        <!-- Attachments -->
                        <div class="card-footer bg-light">
                            <h6 class="mb-3"><i class="fa fa-paperclip"></i> Attachments</h6>
                            <div class="d-flex flex-wrap mt-2">`;

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

                                html += '</div>';
                            }

                        html += `</div>
                            </div>`;
                }
            html += `</div>`;
                  
            $('#noti_container').empty().append(html);
            
        }
        
        
        $('#noti_detail_modal').modal('show');

        MyUtils.fnHideLoader();

    });
    
}