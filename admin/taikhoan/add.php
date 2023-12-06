<div class="row">
    <div class="row form-title">
        <h1>Thêm mới tài khoản</h1>
    </div>
    <div class="row form-content">
        <form action="#" method="POST">
            <div class="row mb10">
                <label for="#">Username</label><br>
                <input type="text" name="user">
            </div>
            <div class="row mb10">
                <label for="#">Password</label><br>
                <input type="password" name="pass">
            </div>
            <div class="row mb10">
                <label for="#">Email</label><br>
                <input type="email" name="email">
            </div>
            <div class="row mb10">
                <label for="#">Address</label><br>
                <input type="text" name="address">
            </div>
            <div class="row mb10">
                <label for="#">tel</label><br>
                <input type="text" name="phone">
            </div>
            <div class="row mb10">
                <label for="#">Role</label><br>
                <input type="text" name="role">
            </div>
            <div class="row mb10">
                <a href="index.php?act=dskh"><input type="button" value="Danh sách"></a>
                <input type="reset" value="Nhập lại">
                <input type="submit" name="themmoi" value="Thêm mới">
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
            ?>
        </form>
    </div>
</div>