var Login = function () {

    var handleRegister = function() {


        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                "AdvertiseRegisterForm[fullname]": {
                    required: true
                },
                "AdvertiseRegisterForm[email]": {
                    required: true,
                    email: true
                },
                "AdvertiseRegisterForm[mobile]": {
                    required: true,
                    minlength: 10
                },
                "AdvertiseRegisterForm[password]": {
                    required: true,
                    minlength: 6
                },
                "AdvertiseRegisterForm[re_password]": {
                    equalTo: "#AdvertiseRegisterForm_password"
                }
            },
            messages: {
                "AdvertiseRegisterForm[fullname]": {
                    required: "Vui lòng nhập họ tên"
                },
                "AdvertiseRegisterForm[email]": {
                    required: "Vui lòng nhập ",
                    email: "Email không đúng định dạng"
                },
                "AdvertiseRegisterForm[mobile]": {
                    required: "Vui lòng nhập số điện thoại",
                    minlength: "Số điện thoại ít nhất phải có 10 số"
                },
                "AdvertiseRegisterForm[password]": {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu ít nhất phải có 6 ký tự"
                },
                "AdvertiseRegisterForm[re_password]": {
                    equalTo: "Xác nhận mật khẩu không đúng"
                }
            }
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            handleRegister();

            jQuery('#register-btn').click(function() {
                jQuery('.login-form').hide();
                jQuery('.register-form').show();
            });


            jQuery('#register-back-btn').click(function () {
                jQuery('.login-form').show();
                jQuery('.register-form').hide();
            });

            jQuery('#forget-password').click(function () {
                jQuery('.login-form').hide();
                jQuery('.forget-form').show();
            });

            jQuery('#back-btn').click(function () {
                jQuery('.login-form').show();
                jQuery('.forget-form').hide();
            });

        }

    };

}();