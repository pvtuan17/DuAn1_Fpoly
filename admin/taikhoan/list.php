<div class="add">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI TÀI KHOẢN</h1>
    </div>
    <div class="row2 form_content">
        <!-- <form action="#" method="POST"> -->
        <div class="row2 mb10 formds_loai">
            <table>
                <tr>
                    <th></th>
                    <th>MÃ TÀI KHOẢN</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>EMAIL</th>
                    <th>ĐỊA CHỈ</th>
                    <th>ĐIỆN THOẠI</th>
                    <th>VAI TRÒ</th>
                    <th></th>
                </tr>

                <?php
                if (isset($listTk) && is_array($listTk)) {
                    foreach ($listTk as $account) : ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><?= $account['id'] ?></td>
                            <td><?= $account['user'] ?></td>
                            <td><?= $account['pass'] ?></td>
                            <td><?= $account['email'] ?></td>
                            <td><?= $account['address'] ?></td>
                            <td><?= $account['phone'] ?></td>
                            <td><?= $account['role'] ?></td>
                            <td>
                                <a href="index.php?act=editTk&id=<?= $account['id'] ?>"><input type="button" value="Sửa"></a>
                                <a href="index.php?act=deleteTk&id=<?= $account['id'] ?>"><input type="button" value="Xóa" onclick="return confirm('Xác nhận xóa data!');"></a>
                            </td>
                        </tr>
                <?php endforeach;
                } ?>

            </table>
        </div>
        <div class="row mb10">
            <input class="btns" type="button" value="CHỌN TẤT CẢ" />
            <input class="btns" type="button" value="BỎ CHỌN TẤT CẢ" />
            <input class="btns" type="button" value="XÓA CHỌN TẤT CẢ" />
            <a href="index.php?act=adddm">
                <input class="btns" type="button" value="NHẬP THÊM" /></a>
        </div>
        <!-- </form> -->
    </div>
</div>