<div class="login mt-5">
    <div class="form">
        <?php
        if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
            extract($_SESSION['user']);
        }
        ?>
        <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data" class="login2">

            <h2>Cập nhật tài khoản</h2>
            <label for="">Tên đăng nhập</label><br />
            <input type="text" name="user" id="" value="<?= $user ?>" /><br />

            <label for="">Email</label><br />
            <input type="email" name="email" id="" value="<?= $email ?>" /><br />

            <label for="">Mật khẩu</label><br />
            <input type="password" name="pass" id="" value="<?= $pass ?>" /><br />

            <label for="">Địa chỉ</label><br />
            <input type="text" name="address" id="" value="<?= $address ?>" /><br />

            <label for="">Điện thoại</label><br />
            <input type="phone" name="phone" id="" value="<?= $phone ?>" /><br />

            <div class="sub">
                <!-- <button class="submit-login" type="submit" name="dangky">
                Đăng ký
            </button> -->
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" value="CẬP NHẬT" name="capnhat" class="submit-login">

                <div class="sub-2">
                    <!-- <a href="#" class="forget">Quên mật khẩu</a> -->
                    <a href="index.php" class="account">Quay lại</a>
                </div>
            </div>
            <p class="thongbao" style="color: green; text-align: center;">

                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?>
            </p>
        </form>
    </div>
</div>