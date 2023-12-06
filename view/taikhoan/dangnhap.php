<div class="login mt-5">
    <div class="form">
        <form action="?act=dangnhap" method="post" enctype="multipart/form-data" class="login2">
            <h2>Đăng Nhập</h2>
            <label for="">Tên đăng nhập</label><br />
            <input type="text" name="user" id="" placeholder="Username" required /><br />

            <label for="">Mật khẩu</label><br />
            <input type="password" name="pass" id="" placeholder="Password" required /><br />
            <div class="remember">
                <input type="checkbox" name="remember" id="" value="1" />
                <label for="">Nhớ mật khẩu</label>
            </div>

            <div class="sub">
                <!-- <button class="btn submit-login" type="submit" name="dangky">
                        Đăng ký
                    </button> -->
                <input type="submit" value="ĐĂNG NHẬP" name="dangnhap" class="submit-login" />
                <div class="sub-2">
                    <!-- <a href="#" class="forget">Quên mật khẩu</a> -->
                    <a href="index.php?act=dangky" class="account">Đăng ký tại đây</a>
                    <a href="index.php?act=quenmk" class="account">Quên mật khẩu?</a>
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