<?php
function validate_thanhtoan($name, $email, $address, $tel)
{
    $err = [];
    if ($name == '') {
        $err['user'] = 'Tên người dùng không được để trống';
    }
    if ($email == '') {
        $err['email'] = 'Email không được để trống';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = 'Email không đúng định dạng';
    }
    if ($tel == '') {
        $err['sdt'] = 'Số điện thoại không được để trống';
    } elseif (!preg_match('/^0[0-9]{9}$/', $tel)) {
        $err['sdt'] = 'Số điện thoại không đúng định dạng';
    }
    if ($address == '') {
        $err['address'] = 'Địa chỉ không được để trống';
    }
    return $err;
}
