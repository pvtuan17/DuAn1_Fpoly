<div class="add">
    <div class="row2 font_title">
        <h1>THÊM MỚI SIZE</h1>
    </div>
    <div class="row2 form_content">
        <form action="index.php?act=addsize" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br />
                <input type="text" name="id" disabled />
            </div>
            <div class="row2 mb10">
                <label>Tên size </label> <br />
                <input type="text" name="size" placeholder="Nhập vào tên" />
            </div>
           
            <div class="row mb10">
                <input class="btns" type="submit" name="themmoisize" value="THÊM MỚI" />
                <input class="btns" type="reset" value="NHẬP LẠI" />

                <a href="index.php?act=listdm"><input class="btns" type="button" value="DANH SÁCH" /></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;

            ?>
            </<form>
    </div>
</div>