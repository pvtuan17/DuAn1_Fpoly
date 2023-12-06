<?php
if (is_array($dm)) {
    extract($dm);
}

$hinhpath = "../upload/" . $img;
if (is_file($hinhpath)) {
    $hinhpath = "<img src='" . $hinhpath . "' width='100px' height='100px'>";
} else {
    $hinhpath = "No file img!";
}
?>
<div class="add">
    <div class="row2">
        <div class="row2 font_title">
            <h1>CẬP NHẬT HÀNG HÓA</h1>
        </div>
        <div class="row2 form_content ">
            <form action="index.php?act=updatedm" method="POST" enctype="multipart/form-data">

                <div class="row2 mb10">
                    <label>Mã loại: </label> <br>
                    <input type="text" name="maloai" disabled>
                </div>
                <div class="row2 mb10">
                    <label>Tên loại: </label> <br>
                    <input type="text" name="tenloai" value="<?php if (isset($name) && ($name != "")) echo $name ?>"><br>
                </div>
                <div class="row2 mb10">
                    <label>Ảnh đại diện: </label> <br>
                    <input type="file" name="hinh"><br>
                    <?= $hinhpath ?>
                </div>
                <div class="row mb10 ">
                    <input type="hidden" name="id" value="<?php if (isset($id) && ($id > 0)) echo $id; ?>">
                    <input class="mr20" name="capnhat" type="submit" value="Cập Nhật">
                    <input class="mr20" type="reset" value="NHẬP LẠI">

                    <a href="index.php?act=listdm"> <input class="mr20" type="button" value="DANH SÁCH"></a>
                </div>
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;

                ?>
            </form>
        </div>
    </div>