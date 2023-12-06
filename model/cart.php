<?php
function join_cz()
{
    $sql = "SELECT sanpham.id, color.color AS color_name, size.size AS size_name
    FROM sanpham
    JOIN sanphambienthe ON sanpham.id = sanphambienthe.id_sp
    JOIN color ON sanphambienthe.id_color = color.id
    JOIN size ON sanphambienthe.id_size = size.id";
    pdo_execute($sql);
}
function join_cz1($iduser)
{
    $sql = "SELECT cart.name, cart.price, cart.image, cart.soluong, cart.id_pro, color.color AS color_name, size.size 
    AS size_name FROM cart JOIN color ON cart.id_color = color.id JOIN size ON cart.id_size = size.id WHERE 
    cart.id_user = '$iduser';";
    $listjoin =  pdo_query($sql);
    return $listjoin;
}
function insert_cart($name, $image, $price, $soluong1, $id_color, $id_size,  $iduser, $idpro)
{
    $sql = "INSERT INTO cart(name,image,price,soluong,id_color, id_size,id_user, id_pro) values ('$name','$image','$price','$soluong1','$id_color', '$id_size','$iduser','$idpro')";
    pdo_execute($sql);
}
function select_cart($iduser)
{
    $sql = "SELECT sanpham.name, sanpham.img, sanpham.price, taikhoan.user, sanpham.id as idsp, cart.soluong, cart.id, cart.id_color, cart.id_size as idcart FROM sanpham JOIN cart ON sanpham.id = cart.id_pro JOIN taikhoan ON cart.id_user = taikhoan.id WHERE cart.id_user = '$iduser'";
    return pdo_query($sql);
}


function dem_cart($iduser)
{
    $conn = pdo_get_connection();
    $sql = $conn->prepare("SELECT * FROM `cart` WHERE id_user='$iduser'");
    $sql->execute();
    $dem = $sql->rowCount();
    return $dem;
}
function delete_sp_cart($id)
{
    $sql = "DELETE FROM cart WHERE id = $id";
    pdo_execute($sql);
}
function update_soluong($id, $idpro, $giam = "", $tang = "")
{
    $min_quantity = 1;
    $max_quantity = 10;

    if ($tang != "") {
        $sql = "UPDATE cart SET soluong = LEAST(soluong + 1, $max_quantity) WHERE id_user = '$id' AND id_pro = '$idpro'";
        pdo_execute($sql);
    }

    if ($giam != "") {
        $sql = "UPDATE cart SET soluong = GREATEST(soluong - 1, $min_quantity) WHERE id_user = '$id' AND id_pro = '$idpro'";
        pdo_execute($sql);
    }
}
function  update_sl($iduser, $id_pro)
{
    $sql = "UPDATE cart SET cart.soluong = cart.soluong + 1 WHERE id_user = '$iduser' AND id_pro = '$id_pro'";
    pdo_execute($sql);
}
function delete_cart($idcart)
{
    $sql = "DELETE FROM cart WHERE id = $idcart";
    pdo_execute($sql);
}

function loadHoaDonUser($iduser)
{
    // $sql = "SELECT donhangchitiet.id, donhangchitiet,
    // donhangchitiet.soLuong, donhangchitiet.name, donhangchitiet.image, donhangchitiet.price,
    // donhangchitiet.soluong,  donhang.ngayDatHang, donhang.trangthai FROM donhangchitiet
    // LEFT JOIN donhang ON donhang.id = donhangchitiet.id WHERE id_user='$iduser'";
    $sql = "SELECT * FROM `donhangchitiet`";

    $cart = pdo_query($sql);
    return $cart;
}

function product_variant()
{
}
