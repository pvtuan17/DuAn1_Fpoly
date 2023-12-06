<div class="add">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content">
        <form action="#" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ LOẠI</th>
                        <th>TÊN LOẠI</th>
                        <th>ẢNH ĐẠI DIỆN</th>

                        <th></th>
                    </tr>

                    <?php
                    // var_dump($listdanhmuc);
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        $suadm = "index.php?act=suadm&id=" . $id;
                        $xoadm = "index.php?act=xoadm&id=" . $id;
                        $hinhpath = "../upload/" . $img;
                        if (is_file($hinhpath)) {
                            $hinh = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                        } else {
                            $hinh = "No file img!";
                        }
                        echo '
                            <tr>
                            <td><input type="checkbox" name="" id="" /></td>
                            <td>' . $id . '</td>
                            <td>' . $name . '</td>
                            <td>' . $hinh . '</td>
                            
                            <td>
                                <a href="' . $suadm . '">         
                                <input type="button" value="Sửa" />
                                </a>
                                <a href="' . $xoadm . '">         
                                <input type="button" value="Xóa" />
                                </a>
                                
                            </td>
                        </tr>
                            ';
                    }
                    ?>

                </table>
            </div>
            <div class="row mb10">
                <input class="btns" type="button" value="CHỌN TẤT CẢ" />
                <input class="btns" type="button" value="BỎ CHỌN TẤT CẢ" />
                <input class="btns" type="button" value="XÓA CHỌN TẤT CẢ" />
                <a href="index.php?act=adddm">
                    <input class="btns" type="button" value="NHẬP THÊM" /></a>
            </div>
        </form>
    </div>
</div>