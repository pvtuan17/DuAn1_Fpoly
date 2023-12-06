><div class="add">

    <div class="row2">

        <div class="row2 font_title">
            <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
        </div>
        <div class="row2 form_content ">
            <form action="#" method="POST">
                <div class="row2 mb10 formds_loai">
                    <form action="index.php?act=listsppv" method="post">
                        <input type="text" name="kyw">
                        <select name="iddm" id="">
                            <option value="0" selected>Tất cả</option>
                            <?php
                            foreach ($listdanhmuc as $danhmuc) {
                                extract($danhmuc);
                                echo '<option value="' . $id . '">' . $name . '</option>';
                            }
                            ?>
                        </select>
                        <input type="submit" name="listok" value="GO">
                    </form>
                    <table>
                        <tr>
                            <th></th>
                            <th>MÃ</th>
                            <th>ID_sp</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>HÌNH</th>
                            <th>Size</th>
                            <!-- <th>Color</th> -->
                            <th>Color</th>
                            <th></th>
                        </tr>

                        <?php
                            // var_dump($listpv1);
                        foreach ($listpv1 as $pv) {

                            // var_dump($pv);
                            extract($pv);                  
                            $hinhpath = "../upload/" . $img;
                            if (is_file($hinhpath)) {
                                $hinh = "<img src= '" . $hinhpath . "' width='100px' height='100px'>";
                            } else {
                                $hinh = "No file img!";
                            }
                            echo '<tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . $id . '</td>
                            
                            <td>' . $name . '</td>
                            
                            <td>' . $hinh . '</td>                
                            <td>' . $size_name   . '</td>                
                            
                            <td>' . $color_name. '</td>
                            <td>
                                <a href=""><input type="button" value="Sửa"> </a>  
                                <a href=""><input type="button" value="Xóa"> </a>  
                               
                            </td>
                    </tr>';
                        }
                        ?>
                    </table>
                </div>
                <div class="row mb10 ">
                    <input type="button" value="CHỌN TẤT CẢ">
                    <input type="button" value="BỎ CHỌN TẤT CẢ">
                    <input type="button" value="XÓA CÁC MỤC ĐÃ CHỌN">
                    <a href="index.php?act=addsp"> <input type="button" value="NHẬP THÊM"></a>
                </div>
            </form>
        </div>
    </div>




</div>