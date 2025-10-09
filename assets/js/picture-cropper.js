/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var currentFormID = null;

function showLogoCropperModal(dir, formID) {
    
    currentFormID = (typeof formID != 'undefined') ? formID : null;
    
    $('#image_cropper_modal .modal-title').html('Upload Profile Picture');
    
    $('#image_cropper_modal #dir').val(dir);
    $('#image_cropper_modal').modal('show');
    
}


function peviewImage(files) {
    
    var dir = $('#image_cropper_modal #dir').val();
    
    var canvas  = $("#canvas"),
        context = canvas.get(0).getContext("2d"),
        result  = $('#result');
    
    if (files && files[0]) {
        if (files[0].type.match(/^image\//)) {
            
            console.log(files)
            var reader = new FileReader();
            console.log(reader)
            
            reader.onload = function (evt) {
                
                var img = new Image();
                console.log(img)
                
                img.onload = function () {
                    
                    context.canvas.height = img.height;
                    context.canvas.width = img.width;
                    context.drawImage(img, 0, 0);
                    canvas.cropper({ aspectRatio: 1 / 1 });

                    $('#btnCrop').click(function () {

                        // Get a string base 64 data url
                        var croppedImageDataURL = canvas.cropper('getCroppedCanvas').toDataURL("image/png");
                        result.empty().append($('<img style="width: 100%;">').attr('src', croppedImageDataURL));

                        $('#cropped_preview_modal').modal('show');

                    });

                    $('#btnRestore').click(function () {

                        canvas.cropper('reset');
                        result.empty();
                        
                    });

                };
                
                img.src = evt.target.result;
                
            };
            
            reader.readAsDataURL(files[0]);
            
        } else {
            alert("Invalid file type! Please select an image file.");
        }
    } else {
        alert('No file(s) selected.');
    }

}


function uploadImage() {
    
    $.ajax({
        type: 'POST',
        data: { 
            file    : $('#result img').attr('src'),
            dir     : $('#image_cropper_modal #dir').val()
        },
        dataType: 'json',
        url: BASE_URL + 'fileUploader/uploadLogo'
    })
    .done(function(data) {

        console.log(data)
        if (data.status) {
            
            $('#result').empty();
            
            MyUtils.fnShowToasts('success', 'Success', 'Picture has been successfully uploaded.');
            
            if(currentFormID != null) {
                
                $('#' + currentFormID + ' #profile_url').val(data.image_url);
                $('#' + currentFormID + ' #profile_uri').val('');
                $('#' + currentFormID + ' #the_camera img').attr('src', BASE_URL + data.image_url);
                
            } else {
                $('#' + $('#image_cropper_modal #dir').val()).attr('src', BASE_URL + data.image_url);
            }
            
            // For system logo only
            if($('#image_cropper_modal #dir').val().trim() == 'logo_url') {
                $('#system_logo').attr('src', BASE_URL + data.image_url);
            }
            
            // For profile only
            if($('#image_cropper_modal #dir').val().trim() == 'profile') {
                $('.profile-url').attr('src', BASE_URL + data.image_url);
            }
            
            $('#image_cropper_modal').modal('hide');
            $('#cropped_preview_modal').modal('hide');
            
        }

    });
    
}

