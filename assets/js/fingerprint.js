const baseUrl = "http://localhost:5090/api";
let sessionId = null;
let required = 0;
let captured = 0;

// start session
function startEnrollment() {
    $.post(baseUrl + "/enroll/start?required=3", function (res) {
        sessionId = res.sessionId;
        required = res.required;
        captured = 0;
        $("#status").removeClass().addClass("alert alert-warning")
            .text("Place your finger (" + required + " times)");
        $("#btnCapture").attr("disabled", false);
    });
}

// capture once
function captureEnrollment() {
    
    if (!sessionId) return alert("No session started");

    $.post(baseUrl + "/enroll/capture?sessionId=" + sessionId, function (res) {
        if (res.success) {
            captured++;
            $("#status").removeClass().addClass("alert alert-success")
                .text("Captured " + captured + "/" + required);
                
                $('#preview_'+captured).attr('src', res.previewImage);
                
                var progress = (captured / required) * 100;
                $("#progress")
                  .css("width", progress + "%")
                  .attr("aria-valuenow", progress)
                  .text(progress.toFixed(0) + "%");
                
            if (captured >= required) {
                $("#btnCapture").attr("disabled", true);
            }
            
        } else {
            $("#status").removeClass().addClass("alert alert-danger")
                .text("Failed: " + res.error);
        }
    });
}

// finish and get final template
function finishEnrollment() {
    $.post(baseUrl + "/enroll/finish?sessionId=" + sessionId, function (res) {
        if (res.success) {
            $("#status").removeClass().addClass("alert alert-info")
                .text("Enrollment completed!");
            console.log("Final template (base64):", res.template);
            
            saveUserFingerprint(`${res.template}`);
            
        } else {
            $("#status").removeClass().addClass("alert alert-danger")
                .text("Finish failed: " + res.error);
        }
    });
}


function showFingerprintFormModal(id) {
    
    $('#fingerprint_modal #id').val(id);
    $('#fingerprint_modal').modal('show');
    
}


function saveUserFingerprint(template) {
    
    MyUtils.fnShowLoader();

    $.ajax({
        type: 'POST',
        data: { 
            id         : $('#fingerprint_modal #id').val(),
            template   : template
        },
        dataType: 'json',
        url: BASE_URL + 'students/saveStudentFingerprint'
    })
    .done(function(data) {

        if (data.status) {
            
            MyUtils.fnShowToasts('success', 'Success', 'Fingerprint enrollment completed!');
    
            if(typeof studentsTable !== 'undefined') studentsTable.draw();
            
            setTimeout(function() {
                $('#fingerprint_modal #id').val('0');
                $('#fingerprint_modal').modal('hide');
            }, 500);
        }
            
        MyUtils.fnHideLoader();
        
    });
    
}