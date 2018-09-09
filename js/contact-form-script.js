$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var address = $("#address").val();
    var phone = $("#phone").val();    
    var email = $("#email").val();    
    var restaurant = $("#restaurant").val();
    var num_orders = $("#num_orders").val();
    var order1 = $("#order1").val();

    $.ajax({
        type: "POST",
        url: "assets/php/form-process.php",
        //data: "first_name=" + name + "&email=" + email + "&msg_subject=" + msg_subject + "&message=" + message,
        data: "first_name=" + first_name + "&last_name=" + last_name + "&address=" + address + "&phone=" + phone + "&email=" + email + "&restaurant=" + restaurant + "&num_orders=" + num_orders + "&order1=" + order1,
        
        success : function(text){
            if (text == "success"){
                formSuccess();
            } else {
                formError();
                submitMSG(false,text);
            }
        }
    });
}
    
function formSuccess(){
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!");
}

function formError(){
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass();
    });
}

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}