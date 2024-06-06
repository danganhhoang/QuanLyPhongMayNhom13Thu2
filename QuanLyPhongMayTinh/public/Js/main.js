function validate(event) {
    event.preventDefault();
    
    var username = document.getElementById("username").value;
    var password = document.getElementById("password-field").value;
  
    if (username === "" && password === "") {
        swal({
            title: "",
            text: "Bạn chưa điền đầy đủ thông tin đăng nhập...",
            icon: "error",
            close: true,
            button: "Thử lại",
        });
        return false;
    }
  
    if (username === "") {
        swal({
            title: "",
            text: "Tài khoản đang để trống...",
            icon: "warning",
            close: true,
            button: "Thử lại",
        });
        return false;
    }
  
    if (password === "") {
        if (username === "admin123") {
            swal({
                title: "",
                text: "Bạn chưa nhập mật khẩu...",
                icon: "warning",
                close: true,
                button: "Thử lại",
            });
        } else {
            swal({
                title: "",
                text: "Mật khẩu đang để trống...",
                icon: "warning",
                close: true,
                button: "Thử lại",
            });
        }
        return false;
    }
  
    if (username === "admin123" && password === "13579") {
        swal({
            title: "",
            text: "Xin chào Admin",
            icon: "success",
            close: true,
            button: false,
        }).then(() => {
            window.location.href = "index.php";
  
        });
        return true;
    } else {
        swal({
            title: "",
            text: "Sai thông tin đăng nhập hãy kiểm tra lại...",
            icon: "error",
            close: true,
            button: "Thử lại",
        });
        return false;
    }
  }
  
  function RegexEmail(emailInputBox) {
    var emailStr = document.getElementById(emailInputBox).value;
    var emailRegexStr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    var isValid = emailRegexStr.test(emailStr);
  
    if (!isValid) {
        swal({
            title: "",
            text: "Bạn vui lòng nhập đúng định dạng email...",
            icon: "error",
            close: true,
            button: "Thử lại",
        });
        document.getElementById(emailInputBox).focus();
    } else {
        swal({
            title: "",
            text: "Chúng tôi vừa gửi cho bạn email hướng dẫn đặt lại mật khẩu vào địa chỉ cho bạn",
            icon: "success",
            close: true,
            button: "Đóng",
        }).then(() => {
            window.location.href = "#";
        });
    }
  }
  