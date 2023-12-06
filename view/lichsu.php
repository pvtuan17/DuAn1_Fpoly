<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Lịch sử đơn hàng</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Lịch sử đơn hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <?php
            $i = 1;
            $tong = 0;
            if (isset($_SESSION['user'])) {
            ?>
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Kích cỡ</th>
                            <th>Màu</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                            <th>Trạng thái</th>
                            
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        foreach ($list as $cart) {
                            extract($cart);
                            $ttien = $gia_ban * $soLuong;
                            $tong += $ttien;
                        ?>
                            <tr>
                                <td class="align-middle" style="text-align: left;"><img src="upload/<?= $img ?>" alt="" style="width: 50px;"> <?= $name ?></td>
                                <td class="align-middle"><?= number_format($gia_ban, 0, ',', ',') ?> vnđ</td>
                                <td class="align-middle">M</td>
                                <td class="align-middle">Đen</td>
                                <td class="align-middle"><?= $soLuong ?></td>
                                
                                <td class="align-middle"><?= number_format($ttien, 0, ',', '.') ?> vnđ</td>
                                
                            </tr>
                        <?php }

                        ?>
                    </tbody>
                </table>
        </div>
        
    </div>
</div>
<?php
            } else {
                echo "Bạn cần đăng nhập vào để mua hàng";
                // $thongconfirm('Bạn có chắc chắn muốn xóa không?');
            }
?>
<!-- Cart End -->