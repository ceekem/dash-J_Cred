
$("#contactForm").submit(function(event){
 // Cancels the form submission
 event.preventDefault();
 submitForm();
});

function submitForm(){
    //Initiate Variables with Form Content
    let name = $("#name").val();
    let email = $("#email").val();
    let telephone = $("#telephone").val();
    let message = $("#message").val();

    $.ajax({
        type: "POST",
        url:"mailer.php",
        data: "name=" + name + "&email=" + email + "&telephone=" + telephone + "&message=" + message,
        success : function(text){
            if(text == "success"){
                formSuccess();
            }
        }
    });
}

function formSuccess(){
    $("#suc").text("Thank you for contacting us. We will be in touch with you very soon.")
    $("#suc").css("color:","Green","font-weight:","bold")
}