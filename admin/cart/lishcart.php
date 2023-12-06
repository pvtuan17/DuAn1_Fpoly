<div class="add">
    <div class="row2">
        <div class="row2 font_title">
            <h1>DANH SÁCH GIỎ HÀNG</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">ID_DonHang</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                // var_dump($load_cart);
                foreach ($load_cart as $cart) {
                    extract($cart); ?>
                    <tr>
                        <th scope="row"><?= $i++ ?></th>
                        <td><?= $name ?></td>
                        <td><img src="<?= $img ?>" width="50px" height="50" alt="loi"></td>
                        <td><?= number_format($gia_ban) ?> vnd</td>
                        <td><?= $id_donhang ?></td>
                        <td><button type="button" class="btn btn-danger">Xác nhận</button>
                            <button type="button" class="btn btn-danger">Hủy</button>
                            <button type="button" class="btn btn-danger"></button>
                        </td>
                    </tr>
                <?php }
                ?>

            </tbody>
        </table>
    </div>
</div>