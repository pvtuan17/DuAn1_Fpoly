<?php
ob_start();     
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
        .comment {
            width: 1180px;
            margin: auto;
        }

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

        /* comment */
        .comment {
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .comment .comment-title {
            background-color: var(--primary);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .comment .comment-title h3 {
            color: #fff;
            font-size: 25px;
            padding: 5px;
        }

        .comment .comment-content {
            padding: 30px;
        }

        .comment .comment-content .comment-user {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .comment .comment-content .comment-user .user-icon {
            height: 40px;
            width: 40px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--primary);
            border-radius: 50%;
        }

        .comment .comment-content .comment-user .user-infor p {
            font-weight: bold;
        }

        .comment .comment-content .comment-user .user-infor span {
            color: #ccc;
            font-size: 14px;
        }

        .cmt {
            padding: 10px 50px;
            text-align: justify;
            line-height: 1.3;
        }

        .submit-cmt {
            text-align: end;
            margin-right: 40px;
        }

        .submit-cmt input:nth-child(2) {
            width: 300px;
            /* padding: 20px; */
        }

        .submit-cmt input {
            padding: 10px;
        }

        .btn3 {
            outline: none;
            border: none;
            background-color: var(--primary);
            color: #fff;
            font-style: italic;
            cursor: pointer;
        }

        .btn4 {
            outline: none;
            border: 1px solid var(--primary);
            /* background-color: var(--primary); */
            color: var(--primary);
            font-style: italic;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="comment">

        <div class="comment-title">
            <h3>Bình luận</h3>
        </div>
        <div class="comment-content">

            <?php foreach ($dsbl as $binhluan) : ?>
                <div class="conment-list">

                    <div class="comment-user">
                        <div class="user-icon"><i class="fa-solid fa-user-tie"></i></div>

                        <div class="user-infor">
                            <p><?= $binhluan['id_user'] ?></p>
                            <span><?= $binhluan['ngaybinhluan'] ?></span>
                        </div>
                    </div>
                    <div class="cmt">
                        <p><?= $binhluan['noidung'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>


            <div class="submit-cmt">
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
            <?php

            if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
                $noidung = $_POST['noidung'];
                $id_product = $_POST['id_product'];
                $id_user = $_SESSION['user']['id'];
                $ngaybinhluan = date('h:i:sa d/m/Y');
                insert_binhluan($noidung, $id_user, $id_product, $ngaybinhluan);
                header("Location: " . $_SERVER['HTTP_REFERER']);
            }
            ?>

        </div>
        <!--  -->
</body>

</html>