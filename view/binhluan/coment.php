<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
include "../../model/taikhoan.php";


$id_product = $_REQUEST['id_product'];

$dsbl = loadAll_binhLuan($id_product);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .comment table {
            width: 100%;
            margin-left: 5%;
        }

        .comment table td:nth-child(1) {
            width: 50%;
        }

        .comment table td:nth-child(2) {
            width: 20%;
        }

        .comment table td:nth-child(3) {
            width: 30%;
        }
    </style>
</head>

<body>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="tab-pane-1">
            <h4 class="mb-3">Mô tả chi tiết sản phẩm</h4>
            <p>' . $mota . '</p>

        </div>
        <div class="tab-pane fade" id="tab-pane-2">
            <h4 class="mb-3">Additional Information</h4>
            <p>Eos no lorem eirmod diam diam, eos elitr et gubergren diam sea. Consetetur vero aliquyam invidunt duo dolores et duo sit. Vero diam ea vero et dolore rebum, dolor rebum eirmod consetetur invidunt sed sed et, lorem duo et eos elitr, sadipscing kasd ipsum rebum diam. Dolore diam stet rebum sed tempor kasd eirmod. Takimata kasd ipsum accusam sadipscing, eos dolores sit no ut diam consetetur duo justo est, sit sanctus diam tempor aliquyam eirmod nonumy rebum dolor accusam, ipsum kasd eos consetetur at sit rebum, diam kasd invidunt tempor lorem, ipsum lorem elitr sanctus eirmod takimata dolor ea invidunt.</p>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                        </li>
                        <li class="list-group-item px-0">
                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                        </li>
                        <li class="list-group-item px-0">
                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                        </li>
                        <li class="list-group-item px-0">
                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0">
                            Sit erat duo lorem duo ea consetetur, et eirmod takimata.
                        </li>
                        <li class="list-group-item px-0">
                            Amet kasd gubergren sit sanctus et lorem eos sadipscing at.
                        </li>
                        <li class="list-group-item px-0">
                            Duo amet accusam eirmod nonumy stet et et stet eirmod.
                        </li>
                        <li class="list-group-item px-0">
                            Takimata ea clita labore amet ipsum erat justo voluptua. Nonumy.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab-pane-3">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-4">Bình luận</h4>
                    <?php foreach ($dsbl as $binhluan) : ?>

                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><?= $binhluan['id_user'] ?><small> - <i><?= $binhluan['ngaybinhluan'] ?></i></small></h6>
                                <div class="text-primary mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <p><?= $binhluan['noidung'] ?></p>
                            </div>
                        </div>
                </div>
            <?php endforeach; ?>
            <div class="col-md-6">
                <h4 class="mb-4">Leave a review</h4>
                <small>Your email address will not be published. Required fields are marked *</small>
                <div class="d-flex my-3">
                    <p class="mb-0 mr-2">Your Rating * :</p>
                    <div class="text-primary">
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                </div>
                <form action="<?php if (isset($_SESSION['user'])) {
                                    echo $_SERVER['PHP_SELF'];
                                } else {
                                    echo "";
                                } ?>" method="POST">
                    <input type="hidden" name="id_product" value="<?= $id_product ?>" />
                    <input class="btn4" type="text" name="noidung" />
                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <input class="btn3" type="submit" name="guibinhluan" value="Gửi bình luận " />
                    <?php } else { ?>
                        <input type="submit" class="btn3" onclick="return alert('Bạn chưa đăng nhập')" name="guibinhluan" value="Gửi bình luận">
                    <?php } ?>

                </form>
            </div>
            </div>
        </div>
    </div>

</body>

</html>