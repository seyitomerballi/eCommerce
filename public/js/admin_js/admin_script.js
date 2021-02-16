$(document).ready(function () {
    // Check Admin Password is correct or not
    $("#admin_current_pwd").keyup(function () {
        var admin_current_pwd = $("#admin_current_pwd").val();
        //alert(admin_current_pwd);
        $.ajax({
            type: 'post',
            url: '/admin/check-current-pwd', /* url call with route name */
            data: {admin_current_pwd: admin_current_pwd},
            success: function (response) {
                console.log(response)
                if (response === "false") {
                    $('#admin_current_pwd').toggleClass('is-invalid', true);
                    $('#admin_current_pwd').toggleClass('is-valid', false);
                    $('#chkCurrentPwd').css('color', 'red').text('Mevcut Parola Yanlış');
                } else if (response === "true") {
                    $('#admin_current_pwd').toggleClass('is-valid', true);
                    $('#admin_current_pwd').toggleClass('is-invalid', false);
                    $('#chkCurrentPwd').css('color', 'green').text('Mevcut Parola Doğru');
                } else {
                    alert("Response kısmında hata");
                }
            },
            error: function () {
                alert("Başarısız İşlem");
            }
        });
    });
});

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Check New and confirm password is matching
    $("#admin_confirm_pwd, #admin_new_pwd").keyup(function () {
        var admin_confirm_pwd = $("#admin_confirm_pwd").val();
        var admin_new_pwd = $("#admin_new_pwd").val();
        $.ajax({
            type: 'post',
            url: '/admin/check-confirm-pwd',
            data: {
                admin_new_pwd: admin_new_pwd,
                admin_confirm_pwd: admin_confirm_pwd
            },
            success: function (resp) {
                if (resp === "false") {
                    $('#admin_new_pwd').toggleClass('is-invalid', true);
                    $('#admin_new_pwd').toggleClass('is-valid', false);
                    $('#admin_confirm_pwd').toggleClass('is-invalid', true);
                    $('#admin_confirm_pwd').toggleClass('is-valid', false);
                    $('#chkCheckPwd').css('color', 'red').text('Yeni parola doğrulaması yanlış');
                } else if (resp === "true") {
                    $('#admin_new_pwd').toggleClass('is-valid', true);
                    $('#admin_new_pwd').toggleClass('is-invalid', false);
                    $('#admin_confirm_pwd').toggleClass('is-invalid', false);
                    $('#admin_confirm_pwd').toggleClass('is-valid', true);
                    $('#chkCheckPwd').css('color', 'green').text('Yeni parola doğrulaması doğru');
                } else {
                    alert("Response kısmında hata");
                }
            },
            error: function () {
                alert("Başarısız işlem");
            }
        });
    });
});

/*
$(document).ready(function () {
    $("#admin_name, #admin_phone").keyup(function () {
        var _token = $("input[name='_token']").val();
        var admin_name = $("#admin_name").val();
        var admin_phone = $("#admin_phone").val();
        $.ajax({
            url: "/admin/update-admin-details",
            type: 'POST',
            data: {_token: _token, admin_name: admin_name, admin_phone: admin_phone},
            success: function (response) {
                    console.log(response);
                $('#admin_name_err').text(response.error.admin_name);
                $('#admin_phone_err').text(response.error.admin_phone);
                    //alert(data.success);
            },
            error: function (response){
                console.log(response);
            }
        });
    });
});
*/
