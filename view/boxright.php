<div class="box-form">
    <?php

    if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
    ?>
        <div class="login1">
            <div class="sub">
                <h2>Hi! <?= $user ?></h2>

                <div class="sub-2" style="flex-direction: column; gap: 20px;">
                    <a href="index.php?act=quenmk" class="forget">- Quên mật khẩu</a>
                    <a href="index.php?act=edit_taikhoan" class="regsiter">- Cập nhật tài khoản</a>
                    <?php
                    if ($role == 1) {
                    ?>
                        <a href="admin/index.php" class="regsiter">- Đăng nhập admin</a>

                    <?php } ?>
                    <a href="index.php?act=thoat" class="regsiter">- Thoát</a>
                </div>
            </div>
        <?php
    } else {
        ?>
        </div>
        <form action="index.php?act=dangnhap" method="post" class="login1">
            <h2>Đăng nhập</h2>
            <label for="">Tên đăng nhập</label><br />
            <input type="text" name="user" id="" placeholder="Username" /><br />
            <label for="">Mật khẩu</label><br />
            <input type="text" name="pass" id="" placeholder="Password" /><br />
            <div class="remember">
                <input type="checkbox" name="remember" id="" value="1" />
                <label for="">Nhớ mật khẩu</label>
            </div>
            <p class="thongbao" style="color: red; text-align: center;">

                <?php
                if (isset($thongbao) && ($thongbao != "")) {
                    echo $thongbao;
                }
                ?>
            </p>
            <div class="sub">
                <input type="submit" value="Đăng nhập" name="dangnhap" class="submit-login btn">
                <!-- <button class="submit-login" name="dangnhap">Đăng nhập</button> -->
                <div class="sub-2">
                    <a href="index.php?act=quenmk" class="forget">Quên mật khẩu</a>
                    <a href="index.php?act=dangky" class="regsiter">Đăng ký tại đây?</a>
                </div>
            </div>
        </form <?php } ?> </div>
        <div class="category">
            <h3 class="category_title">Danh mục</h3>
            <div class="category_list">
                <ul>
                    <?php
                    foreach ($dsdm as $dm) {
                        extract($dm);
                        $linkdm = "index.php?act=sanpham&iddm=" . $id;
                        echo '
                                <li><a href="' . $linkdm . '">' . $name . '</a></li>

                            ';
                    }
                    ?>

                </ul>
            </div>
        </div>
        <div class="best-seller">
            <h3 class="seller_title">Top 10 yêu thích</h3>
            <div class="seller-list">
                <?php
                foreach ($dstop10 as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $img = $img_path . $img;
                    echo '
                            <div class="seller-items">
                                <img src="' . $img . '" alt="" />
                                 <a href="' . $linksp . '">' . $name . '</a>
                                </div>
                            ';
                }
                ?>

            </div>
        </div>