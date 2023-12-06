<?php
function validate($username, $password, $email, $address, $phone)
{
    $error = [];
    // Validate username
    if (empty($username)) {
        $error['username'] = "Tên không được để trống!";
    } elseif (strlen($username) < 6) {
        $error["username"] = "Tên phải lớn hơn 6 ký tự!";
    } elseif (strlen($username) > 10) {
        $error["username"] = "Tên phải nhỏ hơn 10 ký tự!";
    }

    // Validate password
    if (empty($password)) {
        $error["password"] = "Mật khẩu không được để trống!";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,20}$/", $password)) {
        $error["password"] = "Mật khẩu không đúng định dạng!";
    }

    //Validate Email
    if (empty($email)) {
        $error["email"] = "Email không được để trống!";
    } elseif (!preg_match("/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i", $email)) {
        $error["email"] = "Email không đúng định dạng!";
    }


    if (empty($address)) {
        $error["address"] = "Địa chỉ không được để trống!";
    }

    if (empty($phone)) {
        $error["phone"] = "Số điện thoại không được để trống!";
    } elseif (!preg_match("/^0[0-9]{9}$/", $phone)) {
        $error["phone"] = "Số điện thoại phải đúng định dạng!";
    }
    return $error;
}
if (isset($_POST['btn']) && $_POST['btn']) {
    if (isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['address'])) {
        $email = $_POST['email'];
        $phone = $_POST['tel'];
        $address = $_POST['address'];
    } else {
        $email = $address = $tel = '';
    }
    $password = $_POST['pass'];
    $username = $_POST['username'];

    $error = validate($username, $password, $email, $address, $phone);
    if (empty($error)) {
        insert_taikhoan($username, $password, $email, $address, $phone);       
        header('Location: index.php?act=dangnhap');      
    }
}
