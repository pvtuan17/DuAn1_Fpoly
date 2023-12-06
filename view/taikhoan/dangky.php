<div class="mt-5">
    <div class="form">
        <form action="index.php?act=dangky" method="post" enctype="multipart/form-data" class="login">
            <h2>Đăng ký</h2>
            <label for="">Tên đăng nhập</label><br />
            <input type="text" name="user" id="" placeholder="Username" required /><br />

            <label for="">Email</label><br />
            <input type="email" name="email" id="" placeholder="Email" required /><br />

            <label for="">Mật khẩu</label><br />
            <input type="password" name="pass" id="" placeholder="Password" required /><br />
            <label for="">Địa chỉ</label><br />
            <input type="text" name="address" id="" placeholder="Address" required /><br />

            <label for="">Điện thoại</label><br />
            <input type="tel" name="tel" id="" placeholder="Phone" required /><br />

            <div class="sub">
                <!-- <button class="submit-login" type="submit" name="dangky">
                        Đăng ký
                    </button> -->
                <input type="submit" value="ĐĂNG KÝ" name="dangky" class="btn submit-login" />
                <div class="sub-2">
                    <!-- <a href="#" class="forget">Quên mật khẩu</a> -->
                    <a href="index.php?act=dangnhap" class="account">Đã có tài khoản?</a>
                </div>
            </div>
            <p class="thongbao" style="color: red; width: 400px">
                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?>
            </p>
        </form>
    </div>
</div>