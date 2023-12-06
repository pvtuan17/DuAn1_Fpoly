<?php
function insert_donhang($id_user, $user, $sdt, $email, $address, $thanhtien)
{
    $date = date("Y-m-d");
    $conn = pdo_get_connection();
    $sql = $conn->prepare("INSERT INTO `donhang`(`id_user`, `ngayDatHang`, `nguoi_nhan`, `address`, `thanhToan`, `email`, `tel`) VALUES ('$id_user',' $date','$user','$address','$thanhtien','$email','$sdt')");
    $sql->execute();
    $id = $conn->lastInsertId();
    return $id;
}

function insert_chitietdonhang($iddh, $idsp, $name, $gia, $soluong, $img)
{
    $sql = "INSERT INTO `donhangchitiet`( `id_donhang`, `id_product`, `soluong`, `gia_ban`, `img`, `name`) VALUES ('$iddh','$idsp','$soluong','$gia','$img','$name')";
    pdo_execute($sql);
}

function lichsu()
{
    $sql = "SELECT * FROM `donhangchitiet`";
    pdo_query($sql);
}

function load_dhct($id)
{
    $sql = "SELECT donhangchitiet.*, donhang.id_user, donhang.trangthai FROM donhangchitiet  JOIN donhang ON donhangchitiet.id_donhang = donhang.id WHERE donhang.id_user = $id";
    return pdo_query($sql);
}

function loadall_dhct()
{
    $sql = "select * from donhangchitiet 
    inner join donhang on donhangchitiet.id_donhang = donhang.id";
    return pdo_query($sql);
}
