<div class="add">
    <div class="row2 font_title">
        <h1>DANH SÁCH BÌNH LUẬN</h1>
    </div>
    <div class="row2 form_content">
        <!-- <form action="#" method="POST"> -->
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>NỘI DUNG</th>
                        <th>ID USER</th>
                        <th>ID SẢN PHẨM</th>
                        <th>NGÀY BÌNH LUẬN</th>

                        <th></th>
                    </tr>

                    <?php foreach ($listBl as $binhluan) : ?>
                        <!-- // extract($binhluan);
                        $suatk = "index.php?act=suatk&idsp=" . $id;
                        $xoatk = "index.php?act=xoatk&idsp=" . $id;
                        echo ' -->
                        <tr style="text-align: center;">
                            <td><input type="checkbox"></td>
                            <td><?= $binhluan['id'] ?></td>
                            <td><?= $binhluan['noidung'] ?></td>
                            <td><?= $binhluan['id_user'] ?></td>
                            <td><?= $binhluan['id_product'] ?></td>
                            <td><?= $binhluan['ngaybinhluan'] ?></td>
                            <td>
                                <a href="index.php?act=deleteBl&id=<?= $binhluan['id'] ?>"><input type="button" value="Xóa" onclick="return confirm('Xác nhận xóa data!');"></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </table>
            </div>
            <div class="row mb10">
                <input class="btns" type="button" value="CHỌN TẤT CẢ" />
                <input class="btns" type="button" value="BỎ CHỌN TẤT CẢ" />
                <input class="btns" type="button" value="XÓA CHỌN TẤT CẢ" />

            </div>
        <!-- </form> -->
    </div>
</div>