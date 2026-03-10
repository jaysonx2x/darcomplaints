/**
 * Navbar Notifications Handler
 * Handles real-time notification display and mark as read functionality
 */

$(document).ready(function() {
    
    // Load notifications on page load
    loadNotifications();
    
    // Refresh notifications every 30 seconds
    setInterval(loadNotifications, 30000);
    
    // Reload notifications when dropdown is opened
    $('#notifDropdown').on('click', function() {
        loadNotifications();
    });
    
});

/**
 * Load notifications from server
 */
function loadNotifications() {
    $.ajax({
        url: BASE_URL + 'notification/getUserNotifications',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.notifications) {
                displayNotifications(response.notifications, response.unread_count);
            }
        },
        error: function() {
            $('#notificationList').html(
                '<div class="text-center py-3 text-muted">' +
                '<i class="fa fa-exclamation-triangle"></i> Failed to load notifications' +
                '</div>'
            );
        }
    });
}

/**
 * Display notifications in the dropdown
 */
function displayNotifications(notifications, unreadCount) {
    var html = '';
    
    // Update unread count badge
    if (unreadCount > 0) {
        $('#notificationCount').text(unreadCount).show();
        $('#unreadCount').text(unreadCount + ' unread');
    } else {
        $('#notificationCount').hide();
        $('#unreadCount').text('No unread');
    }
    
    // Display notifications
    if (notifications.length > 0) {
        notifications.forEach(function(notification) {
            var isUnread = parseInt(notification.is_read) === 0;
            var bgClass = isUnread ? 'bg-light' : '';
            var boldClass = isUnread ? 'font-weight-bold' : '';
            var icon = getNotificationIcon(notification.noti_type);
            var timeAgo = formatTimeAgo(notification.noti_date);
            
            html += '<a href="#" class="dropdown-item notification-item ' + bgClass + '" ' +
                    'data-id="' + notification.id + '" ' +
                    'data-type="' + notification.noti_type + '" ' +
                    'data-owner="' + notification.owner_id + '" ' +
                    'onclick="handleNotificationClick(event, ' + notification.id + ', ' + notification.noti_type + ', ' + notification.owner_id + ')">' +
                    '<div class="d-flex align-items-start">' +
                        '<i class="' + icon + ' mt-1 mr-2"></i>' +
                        '<div class="flex-grow-1">' +
                            '<div class="' + boldClass + '">' + notification.title + '</div>' +
                            '<small class="text-muted">' + notification.message + '</small>' +
                            '<div><small class="text-muted"><i class="fa fa-clock-o"></i> ' + timeAgo + '</small></div>' +
                        '</div>' +
                    '</div>' +
                    '</a>';
        });
    } else {
        html = '<div class="text-center py-3 text-muted">' +
               '<i class="fa fa-bell-slash-o fa-2x mb-2"></i><br>' +
               'No notifications yet' +
               '</div>';
    }
    
    $('#notificationList').html(html);
}

/**
 * Get icon based on notification type
 */
function getNotificationIcon(type) {
    switch(parseInt(type)) {
        case 1: // NOTI_TYPE_ANNOUNCEMENT
            return 'fa fa-bullhorn text-info';
        case 2: // NOTI_TYPE_COMPLAINT
            return 'fa fa-exclamation-circle text-danger';
        case 3: // NOTI_TYPE_FEEDBACK
            return 'fa fa-comment text-success';
        default:
            return 'fa fa-bell text-secondary';
    }
}

/**
 * Format time ago
 */
function formatTimeAgo(dateString) {
    var date = new Date(dateString);
    var now = new Date();
    var seconds = Math.floor((now - date) / 1000);
    
    var intervals = {
        year: 31536000,
        month: 2592000,
        week: 604800,
        day: 86400,
        hour: 3600,
        minute: 60
    };
    
    for (var key in intervals) {
        var interval = Math.floor(seconds / intervals[key]);
        if (interval >= 1) {
            return interval + ' ' + key + (interval > 1 ? 's' : '') + ' ago';
        }
    }
    
    return 'Just now';
}

/**
 * Handle notification click
 */
function handleNotificationClick(event, notificationId, notificationType, ownerId) {
    event.preventDefault();
    
    // Close the dropdown
    $('#notifDropdown').dropdown('hide');
    
    // Mark as read
    markNotificationAsRead(notificationId);
    
    // // Show notification detail modal
    // showNotificationDetailModal(notificationId);

    switch(parseInt(notificationType)) {
        case 2: // NOTI_TYPE_COMPLAINT
            showComplaintDetailModal(ownerId);
            break;
        case 3: // NOTI_TYPE_FEEDBACK
            showFeedbackDetailModal(ownerId);
            break;
    }


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
            
            $('#feedback_detail_'+data.feedback.lang+'_modal .modal-title').text('Feedback - ' + MyUtils.fnFormatMySQLDate(data.feedback.feedback_date));
            
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


/**
 * Display notification detail in modal
 */
function displayNotificationDetail(response) {
    var notification = response.notification;
    var detail = response.detail;
    var notificationType = parseInt(notification.noti_type);
    
    var icon = getNotificationIcon(notificationType);
    var typeBadge = getNotificationTypeBadge(notificationType);
    var dateFormatted = formatDate(notification.noti_date);
    
    var html = '<div class="text-center mb-4">' +
               '<i class="' + icon + ' notification-modal-icon"></i>' +
               '</div>';
    
    html += '<div class="notification-detail-label">Type</div>' +
            '<div class="notification-detail-value">' + typeBadge + '</div>';
    
    html += '<div class="notification-detail-label">Title</div>' +
            '<div class="notification-detail-value">' + notification.title + '</div>';
    
    html += '<div class="notification-detail-label">Message</div>' +
            '<div class="notification-detail-value">' + notification.message + '</div>';
    
    html += '<div class="notification-detail-label">Date</div>' +
            '<div class="notification-detail-value">' + dateFormatted + '</div>';
    
    // Add specific details based on notification type
    if (detail) {
        html += '<hr class="my-4">';
        html += '<h5 class="mb-3">Details</h5>';
        
        switch(notificationType) {
            case 2: // NOTI_TYPE_COMPLAINT
                html += '<div class="notification-detail-label">Control Number</div>' +
                        '<div class="notification-detail-value">' + detail.control_no + '</div>';
                
                html += '<div class="notification-detail-label">Complainant</div>' +
                        '<div class="notification-detail-value">' + detail.fullname + '</div>';
                
                html += '<div class="notification-detail-label">Email</div>' +
                        '<div class="notification-detail-value">' + detail.email + '</div>';
                
                html += '<div class="notification-detail-label">Phone</div>' +
                        '<div class="notification-detail-value">' + detail.phone1 + '</div>';
                
                html += '<div class="notification-detail-label">Address</div>' +
                        '<div class="notification-detail-value">' + detail.address + '</div>';
                
                html += '<div class="notification-detail-label">Concerns</div>' +
                        '<div class="notification-detail-value">' + detail.concerns + '</div>';
                
                html += '<div class="notification-detail-label">Status</div>' +
                        '<div class="notification-detail-value">' + getComplaintStatus(detail.status) + '</div>';
                
                html += '<div class="mt-3">' +
                        '<a href="' + BASE_URL + 'complaint" class="btn btn-primary">' +
                        '<i class="fa fa-external-link"></i> View in Complaints' +
                        '</a></div>';
                break;
                
            case 3: // NOTI_TYPE_FEEDBACK
                html += '<div class="notification-detail-label">Language</div>' +
                        '<div class="notification-detail-value">' + detail.lang.toUpperCase() + '</div>';
                
                html += '<div class="notification-detail-label">Service Availed</div>' +
                        '<div class="notification-detail-value">' + detail.service_availed + '</div>';
                
                html += '<div class="notification-detail-label">Region</div>' +
                        '<div class="notification-detail-value">' + detail.region + '</div>';
                
                if (detail.suggestions) {
                    html += '<div class="notification-detail-label">Suggestions</div>' +
                            '<div class="notification-detail-value">' + detail.suggestions + '</div>';
                }
                
                html += '<div class="mt-3">' +
                        '<a href="' + BASE_URL + 'feedback" class="btn btn-primary">' +
                        '<i class="fa fa-external-link"></i> View in Feedbacks' +
                        '</a></div>';
                break;
        }
    }
    
    $('#notificationDetailContent').html(html);
}

/**
 * Get notification type badge HTML
 */
function getNotificationTypeBadge(type) {
    switch(parseInt(type)) {
        case 1:
            return '<span class="notification-type-badge notification-type-announcement">Announcement</span>';
        case 2:
            return '<span class="notification-type-badge notification-type-complaint">Complaint</span>';
        case 3:
            return '<span class="notification-type-badge notification-type-feedback">Feedback</span>';
        default:
            return '<span class="notification-type-badge">Unknown</span>';
    }
}

/**
 * Format date
 */
function formatDate(dateString) {
    var date = new Date(dateString);
    var options = { 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric', 
        hour: '2-digit', 
        minute: '2-digit' 
    };
    return date.toLocaleDateString('en-US', options);
}

/**
 * Get complaint status text
 */
function getComplaintStatus(status) {
    switch(parseInt(status)) {
        case 0:
            return '<span class="badge badge-warning">Pending</span>';
        case 2:
            return '<span class="badge badge-success">Resolved</span>';
        case 3:
            return '<span class="badge badge-danger">Rejected</span>';
        default:
            return '<span class="badge badge-secondary">Unknown</span>';
    }
}

/**
 * Mark notification as read
 */
function markNotificationAsRead(notificationId) {
    $.ajax({
        url: BASE_URL + 'notification/markNotificationAsRead',
        type: 'POST',
        data: { id: notificationId },
        dataType: 'json',
        success: function(response) {
            if (response.status) {
                // Reload notifications to update count
                loadNotifications();
            }
        }
    });
}
