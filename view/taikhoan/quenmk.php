<div class="form">
    <div class="login mt-5">
        <div class="form">
            <form action="?act=quenmk" method="post" enctype="multipart/form-data" class="login2">
                <h2>Quên mật khẩu</h2>
                <label for="">Email</label><br />
                <input type="email" name="email" placeholder="Nhập Email" required /><br />

                <div class="sub">
                    <input type="submit" value="Xác nhận" name="guiemail" class="submit-login" />
                </div>
                <p class="thongbao" style="color: red; width: 400px"> <br>
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) {
                        echo $thongbao;
                    }
                    ?>
                </p>
            </form>
        </div>
    </div>
</div>