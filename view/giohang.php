<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ hàng</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Giỏ hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <a href="index.php?act=mytaikhoan">Lịch sử</a>
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
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        var_dump($listjoin);
                        foreach ($listjoin as $cart) {
                            // var_dump($list_cart);
                            extract($cart);
                            $ttien = $price * $soluong;
                            $tong += $ttien;
                        ?>
                            <tr>
                                <td class="align-middle" style="text-align: left;"><img src="upload/<?= $image ?>" alt="" style="width: 50px;"> <?= $name ?></td>
                                <td class="align-middle"><?= number_format($price, 0, ',', ',') ?> vnđ</td>
                                <td class="align-middle"><?= $size_name ?></td>
                                <td class="align-middle"><?= $color_name ?></td>
                                <td class="align-middle">
                                    <form action="?act=show_cart&idsp=<?= $idsp ?>" method="post">
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button name="btn_giam" value="btn_giam" class="btn btn-sm btn-primary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?= $soluong ?>">
                                            <div class="input-group-btn">
                                                <button name="btn_tang" value="btn_tang" class="btn btn-sm btn-primary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td class="align-middle"><?= number_format($ttien, 0, ',', '.') ?> vnđ</td>
                                <!-- <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td> -->
                                <!-- <td class="align-middle"><button class="btn btn-sm btn-primary"><a href="?act=delete_cart&idcart=<?= $id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a></button></td> -->
                                <td class="align-middle">
                                    <form action="?act=show_cart&idcart=<?= $idcart ?>" method="post">
                                        <!-- <i class="fa fa-times"></i> -->
                                        <button class="btn btn-sm btn-primary" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><i class="fa fa-times"></i></button>
                                    </form>

                                </td>
                                <!-- <td>
                                    <form action="?act=show_cart&idcart=<?= $id ?>" method="post"><button>Sủa</button> | <button onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button></form>
                                </td> -->
                            </tr>
                        <?php }

                        ?>
                    </tbody>
                </table>
        </div>
        <div class="col-lg-12 ">

            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Phiếu thanh toán</h4>
                </div>

                <div class="card-body ">
                    <div class="d-flex justify-content-between align-items-center mb-3 pt-1 ">
                        <div class="d-flex align-items-center">
                            <h6 class="font-weight-medium">Chọn tất cả sản phẩm</h6>
                            <input type="checkbox" name="" id="" class="m-2">
                        </div>
                        <form class="mb-5 mt-3" action="">
                            <div class="input-group">
                                <input type="text" class="form-control p-4" placeholder="Mã giảm giá">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Áp mã giảm giá</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3 pt-1 ">
                        <h6 class="font-weight-medium">Tổng tiền</h6>
                        <h6 class="font-weight-medium"><?= number_format($tong, 0, ',', ',')   ?> vnđ</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Phí vận chuyển</h6>
                        <h6 class="font-weight-medium">30,000 vnđ</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold"><?= number_format($tong, 0, ',', ',')   ?> vnđ</h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3"><a href="index.php?act=bill" style="color: #fff;">Tiếp tục đặt hàng</a></button>
                </div>
            </div>
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