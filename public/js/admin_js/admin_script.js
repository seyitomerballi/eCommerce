$(document).ready(function () {
    // Check Admin Password is correct or not
    $("#admin_current_pwd").keyup(function () {
        var admin_current_pwd = $("#admin_current_pwd").val();
        //alert(admin_current_pwd);
        $.ajax({
            type: 'post',
            url: '/admin/check-current-pwd',
            data: {current_pwd: admin_current_pwd},
            success: function (response) {
                console.log(response)
                if(response === "false"){
                    $('#chkCurrentPwd').css('color','red').text('Mevcut Parola Yanlış');
                }else if(response ==="true"){
                    $('#chkCurrentPwd').css('color','green').text('Mevcut Parola Doğru');
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });
});
