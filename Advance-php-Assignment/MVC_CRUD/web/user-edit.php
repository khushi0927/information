<?php require_once "web/header.php"; ?>

<form name="frmAdd" method="post" action="" id="frmAdd"
    onSubmit="return validate();">
    <div id="mail-status"></div>
    <div>
        <label style="padding-top: 20px;">Name</label> <span
            id="name-info" class="info"></span><br /> <input type="text"
            name="name" id="name" class="demoInputBox"
            value="<?php echo $result[0]["name"]; ?>">
    </div>
    <div>
        <label>Email</label> <span id="email-info"
            class="info"></span><br /> <input type="text"
            name="email" id="email" class="demoInputBox"
            value="<?php echo $result[0]["email"]; ?>">
    </div>
    <div>
        <label>Number</label> <span id="number-info" class="info"></span><br />
        <input type="text" name="number" id="number" class="demoInputBox"
            value="<?php echo $result[0]["number"]; ?>">
    </div>
    <div>
        <input type="submit" name="add" id="btnSubmit" value="Save" />
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"
        type="text/javascript"></script>
    <script>
function validate() {
    var valid = true;   
    $(".demoInputBox").css('background-color','');
    $(".info").html('');
    
    if(!$("#name").val()) {
        $("#name-info").html("(required)");
        $("#name").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#email").val()) {
        $("#email-info").html("(required)");
        $("#email").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!$("#number").val()) {
        $("#number-info").html("(required)");
        $("#number").css('background-color','#FFFFDF');
        valid = false;
    }
   
    return valid;
}
</script>
    </body>
    </html>