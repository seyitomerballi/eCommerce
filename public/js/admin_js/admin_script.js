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
    // Update section-status from sections in datatable.
    $(".updateSectionStatus").click(function () {
        var status = $(this).text();
        var section_id = $(this).attr("section_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-section-status',
            data: {status: status, section_id: section_id},
            success: function (resp) {
                //alert(resp['status']);
                //alert(resp['section_id']);
                //console.log(resp);
                if (resp['status'] === 0) {
                    $("#section-" + section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactive</a>");
                } else if (resp['status'] === 1) {
                    $("#section-" + section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Active</a>");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });
    // Update category-status from categories in datatable.
    $(".updateCategoryStatus").click(function () {
        var status = $(this).text();
        var category_id = $(this).attr("category_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-category-status',
            data: {status: status, category_id: category_id},
            success: function (resp) {
                //alert(resp['status']);
                //alert(resp['category_id']);
                //console.log(resp);
                if (resp['status'] === 0) {
                    $("#category-" + category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Inactive</a>");
                } else if (resp['status'] === 1) {
                    $("#category-" + category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Active</a>");
                }
            },
            error: function () {
                alert("Error");
            }
        });
    });


    $(function () {
        // Datatables
        $("#sections").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $("#categories").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        // end Datatables

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
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
