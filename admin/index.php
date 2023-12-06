<?php
session_start();

include "../model/pdo.php";
include "../model/sanpham.php";
include "../model/danhmuc.php";
include "../model/taikhoan.php";
include "../model/thongke.php";
include "../model/binhluan.php";
include "../model/cart.php";
include "../model/size.php";
include "../model/color.php";
include "../model/sanphambienthe.php";


include "header.php";
// include "danhmuc/add.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            // danh muc 
        case 'adddm':
            // kiểm tra xem ng dùng có click vào nút add hay không
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                $hinh = $_FILES['hinh']['name'];
                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                insert_danhmuc($tenloai, $hinh);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];;
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                // update_sanpham($id, $iddm, $tensp, $giasp, $hinh, $mota);
                update_danhmuc($id, $tenloai, $hinh);
                $thongbao = "Cập nhật thành công";
            } else {
                $thongbao = "kh cập nhật thành công!";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
            // sản phẩm
        case "addsp":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                //                    echo $hinh;
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['hinh']['name']);
                //                    echo $target_file;
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    //                        echo "Bạn đã upload ảnh thành công";
                } else {
                    //                        echo "Upload ảnh không thành công";
                }
                //                    echo $iddm;
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thanhcong = "Thêm thành công";
            }
            // $listsize = loadAllSize();
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case "addpv":
            if (isset($_POST['themmoiprov']) && ($_POST['themmoiprov'])) {

                $id_sp = $_POST['id_sp'];
                $id_color = $_POST['id_color'];
                $id_size = $_POST['id_size'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                insert_proVariant($id_sp, $id_color, $id_size, $price, $quantity);
                $thanhcong = "Thêm thành công";
            }
            $listsanpham = loadall_sanpham();
            $listsize = loadAllSize();
            $listcolor = loadAllColor();

            // $listdanhmuc = loadall_danhmuc();
            include "sanphambienthe/add.php";
            break;
        case 'listsppv':   
            $listsize = loadAllSize();
            $listcolor = loadAllColor();
            $listdanhmuc = loadall_danhmuc();
            $listpv = loadall_prov();
            $listpv1 = loadall_prov1();
            include "sanphambienthe/list.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            // loadall_prov1();
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            // $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'suasanpham':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/update.php";
            break;

        case "updatesp":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file " . htmlspecialchars(basename($_FILES["hinh"]["name"])) . " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                // update_sanpham($id, $iddm, $tensp, $giasp, $hinh, $mota);
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = "cập nhật thành công!";
            } else {
                $thongbao = "kh nhật thành công!";
            }
            $listdanhmuc = loadall_danhmuc();
            // $listsanpham = loadall_sanpham();
            $listsanpham = loadall_sanpham();
            include "sanpham/list.php";
            break;
            //size
        case "addsize":
            if (isset($_POST['themmoisize']) && ($_POST['themmoisize'])) {
                $size = $_POST['size'];
                insert_size($size);
                $thongbao = "Thêm thành công";
            }
            include "size/add.php";
            break;
            //color
        case "addcolor":
            if (isset($_POST['themmoicolor']) && ($_POST['themmoicolor'])) {
                $color = $_POST['color'];
                insert_color($color);
                $thongbao = "Thêm thành công";
            }
            include "color/add.php";
            break;

            //bình luận
        case "dsbl":
            $listBl = loadAll_binhLuan(0);
            include "binhluan/list.php";
            break;
        case "deleteBl":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_binhLuan($id);
            }
            $listBl = loadAll_comment();
            include "binhluan/list.php";
            break;
            // khách hàng

            ///
        case "addTk":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];
                if (!empty($user) && !empty($pass) && !empty($email) && !empty($address) && !empty($phone) && !empty($role)) {
                    insert_taiKhoan_admin($user, $pass, $email, $address, $phone, $role);
                    $thongbao = "Thêm thành công";
                }
            }
            include "taikhoan/add.php";
            break;
        case "dskh":
            $listTk = loadall_taikhoan();
            include "taikhoan/list.php";
            break;
        case "deleteTk":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_taiKhoan($id);
            }
            $listTk = loadAll_TaiKhoan();
            include "taikhoan/list.php";
            break;
        case "editTk":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadOne_taiKhoan($_GET['id']);
            }
            include "taikhoan/update.php";
            break;

        case "updateTk":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $role = $_POST['role'];

                update_Account_admin($id, $user, $pass, $email, $address, $phone, $role);
                $thongbao = "Cập nhật thành công";
            }
            $listTk = loadAll_TaiKhoan();
            include "taikhoan/list.php";
            break;
        case 'qlcart':
            $idd = $_SESSION["user"]["id"];
            $load_cart = loadHoaDonUser($idd);
            include "cart/lishcart.php";
            break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
// include "home.php";
include "footer.php";
