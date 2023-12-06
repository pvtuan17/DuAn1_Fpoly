<?php

if (is_array($dm)) {
    extract($dm);
}

?>
<div class="add">
    <div class="row2">
        <div class="row2 font_title">
            <h1>CẬP NHẬT HÀNG HÓA</h1>
        </div>
        <div class="row2 form_content ">
            <form action="index.php?act=updateTk" method="POST">
                <div class="input-field row mb10">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="enter email" value="<?= $email ?>">
                </div>
                <div class="input-field row mb10">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" name="user" placeholder="enter username" value="<?= $user ?>">
                </div>
                <div class="input-field row mb10">
                    <label for="">Mật khẩu</label>
                    <input type="password" name="pass" placeholder="enter password" value="<?= $pass ?>">
                </div>
                <div class="input-field row mb10">
                    <label for="">Địa chỉ</label>
                    <input type="text" name="address" placeholder="enter address" value="<?= $address ?>">
                </div>
                <div class="input-field row mb10">
                    <label for="">Điện thoại</label>
                    <input type="text" name="phone" placeholder="enter phone" value="<?= $phone ?>">
                </div>
                <div class="input-field row mb10">
                    <label for="">Role</label>
                    <input type="text" name="role" placeholder="enter role" value="<?= $role ?>">
                </div>
                <div class="input-field row mb10">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    <input type="reset" value="Nhập lại">
                    <input type="submit" value="Cập nhật" name="capnhat">
                </div>
            </form>
            <h2 class="notifi">
                <?php
                if (isset($thongbao) && ($thongbao) != "") {
                    echo "$thongbao";
                }
                ?>
            </h2>
        </div>
    </div>