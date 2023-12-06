<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>
<style>
    .container {
        max-width: 1180px;
        margin: auto;
    }

    .header-icon {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .add {
        border: none;
    }

    .box__child-items {
        height: 500px;
        /* object-fit: cover; */
    }

    .box__child-items img {
        height: 300px;
        object-fit: cover;
    }

    .image-mau {
        width: 200px;
        height: 200px;
    }

    /* login  */
    .login {
        padding: 40px;
        background-color: white;
        margin: auto;
        margin-top: 50px;
        margin-bottom: 50px;
        width: 600px;
        font-size: 18px;
        border-radius: 10px;
        box-shadow: 0px 0px 8px 5px rgba(0, 0, 0, 0.4);
        min-height: 100px;
    }

    .login h2 {
        color: var(--primary);
        font-size: 35px;
        text-align: center;
        padding-bottom: 20px;
    }

    .login input {
        width: 100%;
        padding: 10px;
        border: 1px solid var(--primary);
        border-radius: 20px;
        margin: 8px 0;
    }

    .remember {
        display: flex;
        align-items: center;
        justify-content: right;
        gap: 5px;
    }

    .remember>input {
        width: 20px;
        /* background-color: var(--pink); */
    }

    .remember>label {
        font-size: 16px;
        margin-bottom: 0;
    }

    .sub {
        padding-top: 15px;
    }

    .login .submit-login {
        width: 200px;
        display: block;
        margin-top: 20px;
        background-color: var(--primary);
        border: none;
        outline: none;
        padding: 15px 50px;
        border-radius: 50px;
        color: #fff;
        font-size: 20px;
        margin: auto;
    }

    .sub-2 {
        padding-top: 15px;
        display: flex;
        justify-content: space-between;
    }

    .sub-2 .forget,
    .regsiter {
        font-size: 14px;
    }

    .submit-login:hover {
        cursor: pointer;
    }

    /* //danh muc  */
    .cate-title {
        font-size: 1.5rem;
        color: rgba(0, 0, 0, .54);
        font-weight: 500;
    }

    .cate-list {
        /* border: 1px solid #ccc; */
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .items {
        padding: 10px;
        max-width: 200px;
        max-height: 250px;
        /* border: 1px solid black; */
        overflow: hidden;

    }

    .items .img-cate {
        text-align: center;
    }

    .items .img-cate img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 1px solid #ccc;
        object-fit: contain;
        margin-bottom: 8px;
    }

    .items p {
        text-align: center;
        color: var(--primary);
        font-size: .875rem;
        text-decoration: none;
        line-height: 1.25rem;
        height: 2.5rem;
        margin-bottom: 0.625rem;
        word-break: break-word;
        overflow: hidden;
        display: -webkit-box;
        text-overflow: ellipsis;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
    }
</style>

<body>
    <!-- Topbar Start -->
    <?php
    if (isset($_SESSION['user'])) {
        extract($_SESSION['user']); ?>
        <div class="container-fluid">
            <div class="row align-items-center py-3 px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="?act=home" class="text-decoration-none">
                        <img src="img/logo.png" alt="" width="150" />
                        <!-- <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1> -->
                    </a>
                </div>
                <div class="col-lg-6 col-6 text-left">
                    <form action="index.php?act=sanpham" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="kyw" placeholder="Search for products" />
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-6 text-right">
                    <div class="header-icon">
                        <div class="header-icon-top">
                            <a href="" class="btn border">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge">0</span>
                            </a>
                            <a href="?act=show_cart" class="btn border">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge"><?= (isset($_SESSION['dem'])) ? $_SESSION['dem'] : 0 ?></span>
                            </a>
                        </div>
                        <div class="header-icon-bot">
                            <a href="" class="btn border mt-2">
                                <i class="fa-solid fa-user text-primary"></i>
                                <span class="badge"><?= $user ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <div class="container-fluid">
            <div class="row border-top px-xl-5">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none">
                            <img src="img/logo.png" alt="" width="200" />
                            <!-- <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1> -->
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                                <a href="index.php?act=sanphamall" class="nav-item nav-link">Tất cả</a>

                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Quần nam</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">Quần caki</a>
                                        <a href="" class="dropdown-item">Quần bagi</a>
                                    </div>
                                </div>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Áo nam</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">Áo Hoddie</a>
                                        <a href="" class="dropdown-item">Áo Phông</a>
                                    </div>
                                </div>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                        <a href="checkout.html" class="dropdown-item">Checkout</a>
                                    </div>
                                </div>
                                <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <?php
                                if ($role == 1) {
                                ?>
                                    <a href="admin/index.php" class="nav-item nav-link">Quản lý admin</a>
                                <?php } ?>
                                <a href="index.php?act=edit_taikhoan" class="nav-item nav-link">Chỉnh sửa thông tin</a>
                                <a href="index.php?act=thoat" class="nav-item nav-link">Đăng xuất</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="container-fluid">
            <div class="row align-items-center py-3 px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a href="index.php" class="text-decoration-none">
                        <img src="img/logo.png" alt="" width="150" />
                        <!-- <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1> -->
                    </a>
                </div>
                <div class="col-lg-6 col-6 text-left">
                    <form action="index.php?act=sanpham" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="kyw" placeholder="Search for products" />
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-6 text-right">
                    <div class="header-icon">
                        <div class="header-icon-top">
                            <a href="" class="btn border">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge">0</span>
                            </a>
                            <a href="?act=show_cart" class="btn border">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge">0</span>
                            </a>
                        </div>
                        <div class="header-icon-bot">
                            <a href="" class="btn border mt-2">
                                <i class="fa-solid fa-user text-primary"></i>
                                <span class="badge">Chưa có tài khoản</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Topbar End -->

        <!-- Navbar Start -->
        <div class="container-fluid">
            <div class="row border-top px-xl-5">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                        <a href="" class="text-decoration-none d-block d-lg-none">
                            <img src="img/logo.png" alt="" width="200" />
                            <!-- <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1> -->
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="navbar-nav mr-auto py-0">
                                <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                                <a href="index.php?act=sanphamall" class="nav-item nav-link">Tất cả</a>

                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Quần nam</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">Quần caki</a>
                                        <a href="" class="dropdown-item">Quần bagi</a>
                                    </div>
                                </div>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Áo nam</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="" class="dropdown-item">Áo Hoddie</a>
                                        <a href="" class="dropdown-item">Áo Phông</a>
                                    </div>
                                </div>
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                        <a href="checkout.html" class="dropdown-item">Checkout</a>
                                    </div>
                                </div>
                                <a href="contact.html" class="nav-item nav-link">Liên hệ</a>
                            </div>
                            <div class="navbar-nav ml-auto py-0">
                                <a href="index.php?act=dangnhap" class="nav-item nav-link">Đăng nhập</a>
                                <a href="index.php?act=dangky" class="nav-item nav-link">Đăng ký</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div><?php }

                ?>
    <!-- Navbar End -->