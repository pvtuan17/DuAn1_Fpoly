<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Thanh toán</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->

<div class="container-fluid pt-5">
    <form action="" method="post">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <h4 class="mb-4">Thông tin đặt hàng</h4>
                <?php
                if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                ?>

                <div class="form-group">
                    <label for="name">Người đặt hàng</label>
                    <input type="text" class="form-control" name="user" value="<?= $user ?>" />
                    <span class="text-danger"><?= (isset($err['user'])) ? $err['user'] : '' ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Địa chỉ </label>
                    <input type="text" class="form-control" name="address" value="<?= $address ?>" />
                    <span class="text-danger"><?= (isset($err['address'])) ? $err['address'] : '' ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Email </label>
                    <input type="text" class="form-control" name="email" value="<?= $email ?>" />
                    <span class="text-danger"><?= (isset($err['email'])) ? $err['email'] : '' ?></span>
                </div>
                <div class="form-group">
                    <label for="name">Điện thoại</label>
                    <input type="text" class="form-control" name="tel" value="<?= $phone ?>" />
                    <span class="text-danger"><?= (isset($err['sdt'])) ? $err['sdt'] : '' ?></span>
                </div>

            </div>
            <div class="col-md-6">
                <h4 class="mb-4">Phương thức thanh toán</h4>
                <input type="radio" name="thanhtoan" value="offline" /> Thanh toán tiền mặt <br />
                <input type="radio" name="thanhtoan" id="" name="thanhtoan" value="vnpay" /> Chuyển khoản ngân hàng <br />
                <input type="radio" name="thanhtoan" id="" /> Thanh toán online
            </div>

        </div>
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
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
                        $i = 1;
                        $tong = 0;
                        foreach ($list_cart as $cart) {
                            $soluong = 1;
                            extract($cart);
                            $ttien = $price * $soluong;
                            $tong += $ttien;


                        ?>
                            <tr>
                                <td class="align-middle" style="text-align: left;"><img src="upload/<?= $img ?>" alt="" style="width: 50px;"> <?= $name ?></td>
                                <td class="align-middle"><?= number_format($price, 0, ',', ',') ?> vnđ</td>
                                <td class="align-middle">M</td>
                                <td class="align-middle">Đen</td>
                                <td class="align-middle">
                                    <!-- <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?= $soluong ?>">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div> -->
                                    <?= $soluong ?>
                                </td>
                                <td class="align-middle"><?= number_format($ttien, 0, ',', '.') ?> vnđ</td>
                                <!-- <td class="align-middle"><button class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td> -->
                                <!-- <td class="align-middle"><button class="btn btn-sm btn-primary"><a href="?act=delete_cart&idcart=<?= $id ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a></button></td> -->
                                <td class="align-middle">
                                    <form action="?act=show_cart&idcart=<?= $id ?>" method="post">
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
            <div class="col-lg-12 text-align-left">


                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <!-- <div class="input-group">
                            <input type="text" class="form-control p-4" placeholder="Coupon Code">
                            <div class="input-group-append">
                                <button class="btn btn-primary">Apply Coupon</button>
                            </div>
                        </div> -->
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?= $tong ?> vnđ</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">10.000 vnđ</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Thanh toán</h5>
                            <h5 class="font-weight-bold"><?= number_format($tong + 10000, 0, ',', '.') ?> vnđ</h5>
                            <input type="text" name="tongtien" hidden value="<?= $tong + 10000 ?>">
                        </div>
                        <p class="text-danger"><?= (isset($error) ? $error : '') ?></p>
                        <input type="hidden" name="thanhtien" value="<?php echo !empty($tong) ? $tong : false ?>">
                        <button name="redirect" value="btn_thanh" class="btn btn-block btn-primary my-3 py-3">Thanh toán</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
<!-- Cart End -->