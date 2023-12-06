<?php
ob_start();
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/taikhoan.php";
include "model/binhluan.php";
include "model/validate_thanhtoan.php";
include "model/cart.php";
include "model/donhang.php";
include "model/sanphambienthe.php";
include "model/color.php";
include "model/size.php";
include "view/header.php";
include "global.php";

// $k = join_cz();
// print_r($k);
$spnew = loadall_sanpham_home();
$dsdm = loadall_danhmuc();
$dstop10 = loadall_sanpham_top8();
$dmtop3 = loadall_danhmuc_top3();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;
        case 'sanphamall':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/tatcasanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                $listsize = loadAllSize();
                $listcolor = loadAllColor();
                extract($onesp);
                $sp_cung_loai = loadone_sanpham_cungloai($id, $iddm);
                // $binhluan = loadall_binhluan($_GET['idsp']);
                include "view/chitietsanpham.php";
            } else {
                include "view/home.php";
            }

            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Đã đăng ký thành công!";
            }
            // $thongbao = "chưa thêm đc";
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    $_SESSION['dem'] = dem_cart($_SESSION['user']['id']);
                    header("Location: index.php");
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $phone);
                $_SESSION['user'] = checkuser($user, $pass);
                $thongbao = "Cập nhật tài khoản thành công!  ";
                // header('Location: index.php?act=edit_taikhoan');
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                $email = $_POST['email'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'add_to_cart':
            if (isset($_POST['btn']) && ($_POST['btn'])) {
                $found = false;
                if (isset($_SESSION['user'])) {
                    $list_cart = select_cart($_SESSION['user']['id']);
                    $iduser = $_SESSION['user']['id'];
                    $idpro = $_GET['idsp'];

                    foreach ($list_cart as $value) {
                        if ($value['idsp'] == $idpro) {
                            $found = true;
                            update_sl($_SESSION['user']['id'], $idpro);
                            break;
                        }
                    }
                    if (!$found) {
                        $sp = loadone_sanpham($idpro);
                        $name = $sp['name'];
                        $image = $sp['img'];
                        $price = $sp['price'];
                        $id_color = $_POST['id_color'];
                        $id_size = $_POST['id_size'];
                        $soluong1 = 1;
                        if (isset($_POST['soluongg']) && ($_POST['soluongg'] > 0)) {
                            $soluong1 = $_POST['soluongg'];
                        } else {
                            $soluong1 = 1;
                        }
                        $ttien = $price * $soluong1;
                        insert_cart($name, $image, $price, $soluong1, $id_color, $id_size,  $iduser, $idpro);
                    }
                    $_SESSION['dem'] = dem_cart($_SESSION['user']['id']);
                    header('Location: ' . $_SERVER['REQUEST_URI']);
                }
            }
            include "view/home.php";
            break;
        case 'show_cart':
            if (isset($_SESSION['user'])) {
                $_SESSION['dem'] = dem_cart($_SESSION['user']['id']);
                if (isset($_GET['idcart'])) {
                    delete_sp_cart($_GET['idcart']);
                    $_SESSION['dem'] = dem_cart($_SESSION['user']['id']);
                    echo '<script>location.href="index.php?act=show_cart"</script>';
                }
                // $listpv1 = loadall_prov1();
                $listjoin = join_cz1($_SESSION['user']['id']);
                // $list_cart = select_cart($_SESSION['user']['id']);
            }
            if (isset($_POST['btn_giam']) && $_POST['btn_giam']) {
                update_soluong($_SESSION['user']['id'], $_GET['idsp'], $giam = "a", $tang = "");
                header("Location: ?act=show_cart");
                exit();
            }
            if (isset($_POST['btn_tang']) && $_POST['btn_tang']) {
                update_soluong($_SESSION['user']['id'], $_GET['idsp'], $giam = "", $tang = "b");
                header("Location: ?act=show_cart");
                exit();
            }

            include_once 'view/giohang.php';
            break;
        case 'bill':
            if (isset($_SESSION['user'])) {
                $_SESSION['dem'] = dem_cart($_SESSION['user']['id']);
                $list_cart = select_cart($_SESSION['user']['id']);
                if (isset($_GET['idcart'])) {
                    delete_sp_cart($_GET['idcart']);
                    $_SESSION['dem'] = dem_cart($_SESSION['user']['id']);
                    echo '<script>location.href="index.php?act=show_cart"</script>';
                }
                if (isset($_POST['redirect']) && $_POST['redirect']) {
                    if (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == "offline") {
                        $name = $_POST['user'];
                        $address = $_POST['address'];
                        $email = $_POST['email'];
                        $tel = $_POST['tel'];
                        $tongtien = $_POST['tongtien'];
                        $err = validate_thanhtoan($name, $email, $address, $tel);
                        if (empty($err)) {
                            $iddh =  insert_donhang($_SESSION['user']['id'],  $name, $tel, $email, $address, $tongtien);
                            for ($i = 0; $i < count($list_cart); $i++) {
                                $idsp = $list_cart[$i]['idsp'];
                                $idcart = $list_cart[$i]['idcart'];
                                $name = $list_cart[$i]['name'];
                                $gia = $list_cart[$i]['price'];
                                $soluong = $list_cart[$i]['soluong'];
                                $thanhtien = $_POST['tongtien'];
                                $img = $list_cart[$i]['img'];
                                insert_chitietdonhang($iddh, $idsp, $name, $gia, $soluong, $thanhtien, $img);
                                delete_cart($idcart);
                                $_SESSION['dem'] = dem_cart($_SESSION['user']['id']);
                            }
                            header("Location: view/thanhtoantc.php");
                        }
                    } elseif (isset($_POST['thanhtoan']) && $_POST['thanhtoan'] == 'vnpay') {
                        echo 'thanh toan thanh cong';
                        $thanhtien = $_POST['thanhtien'];
                        echo $thanhtien;
                        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                        date_default_timezone_set('Asia/Ho_Chi_Minh');

                        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                        $vnp_Returnurl = "http://localhost/ph38554_DUAN1/view/thanhtoantc.php";
                        $vnp_TmnCode = "WG6RCT6R"; //Mã website tại VNPAY 
                        $vnp_HashSecret = "EMNBSNLHGWLGFOQXDXZZQGNONOSETZZF"; //Chuỗi bí mật
                        $startTime = date("YmdHis");
                        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
                        $vnp_TxnRef = time() . ''; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                        $vnp_OrderInfo = 'hahah';
                        $vnp_OrderType = 'noi dung thanh toan';
                        $vnp_Amount = $thanhtien * 100;
                        $vnp_Locale = 'vn';
                        $vnp_BankCode = 'NCB';
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                        $vnp_ExpireDate = $expire;

                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => $vnp_OrderInfo,
                            "vnp_OrderType" => $vnp_OrderType,
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef,
                            "vnp_ExpireDate" => $vnp_ExpireDate,
                        );

                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }
                        //     // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                        //     //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                        //     // }

                        //var_dump($inputData);
                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }

                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        $returnData = array(
                            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                        );
                        if (isset($_POST['redirect'])) {
                            header('Location: ' . $vnp_Url);
                            die();
                        } else {
                            echo json_encode($returnData);
                        }
                    } else {
                        $error = "Vui lòng chọn phương thức thanh toán";
                    }
                }
            }
            include "view/bill.php";
            break;

        case 'lichsu':
            $idd = $_SESSION["user"]["id"];
            $list = loadHoaDonUser($idd);
            include "view/lichsu.php";
            break;
        case 'mytaikhoan':
            $dhct = load_dhct($_SESSION['user']['id']);
            load_dhct($_SESSION['user']['id']);
            loadall_dhct();
            // echo 'Đây là giỏ hàng cảu bạn!!!!!!';
            include "view/taikhoan/mytaikhoan.php";
            break;
        case 'thoat':
            session_unset();
            header("Location: index.php");
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
ob_end_flush();
