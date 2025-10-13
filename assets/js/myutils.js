/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


MyUtils = {
    fnShowLoader : function() {
        $('#page_loader').removeClass('hidden');
    },
    
    fnHideLoader : function() {
        $('#page_loader').addClass('hidden');
    },
    
    fnShowToasts : function(type, title, msg){
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "1000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        
        toastr[type](msg, title);
    },
    
    fnObjectifyForm: function(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
          returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    },
    
    fnShowConfirmMessageDlg: function(title, msg, functionName, param) {

        title = (typeof title === 'undefined') ? 'Confirm' : title;
        msg   = (typeof   msg === 'undefined') ? 'Are you sure?' : msg;

        swal({
            title: title,
            text: msg,
            type: "warning",
            buttons: true,
            dangerMode: true,
            showCancelButton: true,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "Yes",
            closeOnConfirm: true
        },
        function(){
            if (MyUtils.fnIsFunction(functionName)) {
                if (param === null)
                    functionName();
                else
                    functionName(param);
            }
        });

    },


    fnIsFunction: function(funcName) {
      return Object.prototype.toString.call(funcName) == '[object Function]';
    },
    
    fnFormatUserType: function(val) {
        
        var userType = {};
        switch (parseInt(val)) {
            case 1:
                userType.clas = 'primary';
                userType.text = 'Administrator';
                break;
            case 2:
                userType.clas = 'info';
                userType.text = 'Staff';
                break;
            case 3:
                userType.clas = 'success';
                userType.text = 'Guest';
                break;
        }
        
        return userType;
    },
    

    fnFormatAnnouncementType: function(val) {
        
        var type = {};
        switch (parseInt(val)) {
            case 1:
                type.clas = 'primary';
                type.text = 'ALL';
                break;
            case 2:
                type.clas = 'info';
                type.text = 'STUDENTS ONLY';
                break;
            case 3:
                type.clas = 'success';
                type.text = 'SUPERVISORS ONLY';
                break;
        }
        
        return type;
    },
    
    fnClientType: function(val) {
        
        var type = {};
        switch (parseInt(val)) {
            case 1:
                type.clas = 'primary';
                type.text = 'CITIZEN';
                break;
            case 2:
                type.clas = 'info';
                type.text = 'STUDENT';
                break;
            case 3:
                type.clas = 'success';
                type.text = 'GOVT';
                break;
            case 4:
                type.clas = 'dark';
                type.text = 'FARMER';
                break;
            case 5:
                type.clas = 'warning';
                type.text = 'LANDOWNER';
                break;
            case 6:
                type.clas = 'danger';
                type.text = 'OTHER';
                break;
        }
        
        return type;
    },
    
    
    fnAgeGroup: function(val) {
        
        var type = {};
        switch (parseInt(val)) {
            case 1:
                type.clas = 'primary';
                type.text = '<30';
                break;
            case 2:
                type.clas = 'info';
                type.text = '31-40';
                break;
            case 3:
                type.clas = 'success';
                type.text = '41-50';
                break;
            case 4:
                type.clas = 'warning';
                type.text = '51-60';
                break;
            case 5:
                type.clas = 'danger';
                type.text = '>51';
                break;
        }
        
        return type;
    },
    
    fnOpenCamera: function(element) {
        Webcam.set({
            width: 350,
            height: 300,
            image_format: 'jpeg',
            jpeg_quality: 90,
            force_flash: false
        });

        var formID = $(element).closest('form').attr('id');
        Webcam.attach( '#' + formID + ' #the_camera' );

        $('#' + formID + ' .img-overlay').addClass('hidden');
        $('#' + formID + ' .btn-camera').addClass('hidden');
        $('#' + formID + ' .btn-capture').removeClass('hidden');
        $('#' + formID + ' .btn-cancel').removeClass('hidden');
        $('#' + formID + ' .btn-upload').addClass('hidden');
        $('#' + formID + ' .btn-save').addClass('hidden');
    },
    
    fnCapturePhoto: function(element) {
        Webcam.snap( function(data_uri) {
            var formID = $(element).closest('form').attr('id');
            $('#' + formID + ' #profile_uri').val(data_uri);
            $('#' + formID + ' #profile_url').val('');
            $('#' + formID + ' #the_camera').html('<img class="img-fluid rounded" style="width: 350px; height: 276px;" src="'+data_uri+'" alt="round-img" />');

            $('#' + formID + ' .img-overlay').removeClass('hidden');
            $('#' + formID + ' .btn-camera').removeClass('hidden');
            $('#' + formID + ' .btn-capture').addClass('hidden');
            $('#' + formID + ' .btn-cancel').addClass('hidden');
            $('#' + formID + ' .btn-upload').removeClass('hidden');
            $('#' + formID + ' .btn-save').removeClass('hidden');
        } );
    },

    fnCancelCamera: function(element) {
        
        var formID = $(element).closest('form').attr('id');

        var profileUrl = ($('#' + formID + ' #old_profile_url').val().trim() != '') ? $('#' + formID + ' #old_profile_url').val() : 'assets/img/no-image.png';

        $('#' + formID + ' #the_camera').html('<img class="img-fluid rounded" style="width: 350px; height: 276px;" src="'+BASE_URL+profileUrl+'" alt="round-img" />');

        $('#' + formID + ' .img-overlay').removeClass('hidden');
        $('#' + formID + ' .btn-camera').removeClass('hidden');
        $('#' + formID + ' .btn-capture').addClass('hidden');
        $('#' + formID + ' .btn-cancel').addClass('hidden');
        $('#' + formID + ' .btn-upload').removeClass('hidden');
        $('#' + formID + ' .btn-save').addClass('hidden');
        
    },
    
    fnAcceptNumbersOnly: function(fieldID) {
    
        $(fieldID).keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                 // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                 // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                     // let it happen, don't do anything
                     return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

    },
    
    
    fnFormatMySQLDate: function(theDate, dateFormat, dateSeparator) { 

        dateFormat = (typeof dateFormat === 'undefined') ? 'mdy' : dateFormat;
        dateSeparator = (typeof dateSeparator === 'undefined') ? '/' : dateSeparator;
        theDate = (typeof theDate === 'undefined') ? new Date() : theDate;

        var date = new Date(theDate);
        var newdate = new Date(date);

        var months = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];

        var month = newdate.getMonth()+1;
        var dd  = (parseInt(newdate.getDate())>9) ? newdate.getDate() : '0' + newdate.getDate();
        var mm  = (parseInt(month)>9) ? month : '0' + month;
        var y   = newdate.getFullYear();

        var hr  = newdate.getHours();
        var min = newdate.getMinutes();
        var sec = (parseInt(newdate.getSeconds())>9) ? newdate.getSeconds() : '0' + newdate.getSeconds();

        var ampm = hr >= 12 ? 'PM' : 'AM';
            hr = hr % 12;
            hr = hr ? hr : 12; // the hour '0' should be '12'
            min = min < 10 ? '0'+min : min;

        var result= '';

        switch(dateFormat) {
            case 'ymd':
                result = y + dateSeparator + mm + dateSeparator + dd;
                break;
            case 'y':
                result = y;
                break;
            case 'dmy':
                result = dd + dateSeparator + mm + dateSeparator + y;
                break;
            case 'mdy':
                result = mm + dateSeparator + dd + dateSeparator + y;
                break;
            case 'mdyHi':
                result = month + dateSeparator + dd + dateSeparator + y + ' ' + hr + ':' + min;
                break;
            case 'mdyHis':
                result = month + dateSeparator + dd + dateSeparator + y + ' ' + hr + ':' + min + ':' + sec;
                break;
            case 'mdyhia':
                result = month + dateSeparator + dd + dateSeparator + y + ' ' + hr + ':' + min + ' ' + ampm;
                break;
            case 'mdyhisa':
                result = month + dateSeparator + dd + dateSeparator + y + ' ' + hr + ':' + min + ':' + sec + ' ' + ampm;
                break;
            case 'Y M d h:i A':
                result = y + ' ' + months[month-1] + ' ' + dd + ' ' + hr + ':' + min + ' ' + ampm;
                break;
            case 'hia':
                result = hr + ':' + min + ' ' + ampm;
                break;
            case 'hi':
                result = hr + ':' + min;
                break;
        }

        return result;
    },
    
    fnCalculateDuration: function(timeIn, timeOut) {
        // Convert to Date objects
        const start = new Date(timeIn);
        const end = new Date(timeOut);

        // Calculate difference in milliseconds
        const diffMs = end - start;

        if (diffMs < 0) {
            return "Invalid: time out is earlier than time in";
        }

        // Convert to hours, minutes, seconds
        const hours = Math.floor(diffMs / (1000 * 60 * 60));
        const minutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diffMs % (1000 * 60)) / 1000);

        return `${hours}h ${minutes}m ${seconds}s`;
    },
    
    fnTruncate: function(string, length) {
        
        if (string.length > length)
            return string.substring(0,length)+'...';
        else
            return string;
        
    },
    
    fnTimeElapsedMysqlDate: function(mysqlDatetime) {
        
        // Convert MySQL datetime (YYYY-MM-DD HH:MM:SS) to JS Date
        let date = new Date(mysqlDatetime.replace(" ", "T")); 
        let now = new Date();
        let diff = Math.floor((now - date) / 1000); // in seconds

        if (diff < 60) return diff + " seconds ago";
        if (diff < 3600) return Math.floor(diff / 60) + " minutes ago";
        if (diff < 86400) return Math.floor(diff / 3600) + " hours ago";
        if (diff < 604800) return Math.floor(diff / 86400) + " days ago";
        if (diff < 2592000) return Math.floor(diff / 604800) + " weeks ago";
        if (diff < 31536000) return Math.floor(diff / 2592000) + " months ago";
        return Math.floor(diff / 31536000) + " years ago";

    },
    
};