/*==============================================================*/
// Raque Contact Form  JS
/*==============================================================*/
(function ($) {
    "use strict"; // Start of use strict
    $("#contactForm").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            formError();
            submitMSG(false, "Did you fill up the form properly?");
        } else {
            // everything looks good!
            event.preventDefault();
            submitForm();
        }
    });


    function submitForm(){
        // Initiate Variables With Form Content
        var name = $("#name").val();
        var email = $("#email").val();
        var msg_subject = $("#msg_subject").val();
        var phone_number = $("#phone_number").val();
        var message = $("#message").val();


        $.ajax({
            type: "POST",
            url: "contact/form",
            data: "name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&phone_number=" + phone_number + "&message=" + message,
            beforeSend: function() {
                // setting a timeout
                $('.sendMesg').html('Please wait..');
                $('.sendMesg').attr('disabled');

            },
            success : function(data){
                
                $('.sendMesg').html('');
                $('.sendMesg').html('Send Message');
                $("#name").val("");
                $("#email").val("");
                $("#phone_number").val("");
                $("#msg_subject").val("");
                $("#message").val("");


                if (data == 200){
                    formSuccess(data);
                } else {
                    formError();
                    submitMSG(false,data.data);
                }
            }
        });
    }

    function formSuccess(msg){
        $("#contactForm")[0].reset();
        submitMSG(true, msg.data)
    }

    function formError(){
        $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass();
        });
    }

    function submitMSG(valid, msg){
        if(valid){
            var msgClasses = "h4 tada animated text-success";
        } else {
            var msgClasses = "h4 text-success";
        }
        $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
    }
}(jQuery)); // End of use strict