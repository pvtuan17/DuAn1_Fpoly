<?php
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = "INSERT INTO sanpham(name, price, img, mota, iddm) values ('$tensp', '$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "DELETE FROM sanpham WHERE id=" . $id;
    pdo_execute($sql);
}
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "SELECT * FROM sanpham where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " ORDER BY id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_home()
{
    $sql = "SELECT * FROM sanpham where 1 order by id desc limit 0,4";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM sanpham where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}


function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "SELECT * FROM danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}
function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh)
{
    if ($hinh != "") {
        // $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
        $sql =  "UPDATE `sanpham` SET `name` = '{$tensp}', `price` = '{$giasp}', `mota` = '{$mota}',`img` = '{$hinh}', `iddm` = '{$iddm}' WHERE `sanpham`.`id` = $id";
    } else {
        //  $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
        $sql =  "UPDATE `sanpham` SET `name` = '{$tensp}', `price` = '{$giasp}', `mota` = '{$mota}', `iddm` = '{$iddm}' WHERE `sanpham`.`id` = $id";
    }
    pdo_execute($sql);
}


function loadall_sanpham_top8()
{
    $sql = "SELECT * FROM sanpham where 1 order by luotxem desc limit 0,8";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadone_sanpham_cungloai($id, $iddm)
{
    $sql = "SELECT * FROM sanpham where iddm=" . $iddm . " and id<>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function update_matxem($idsp)
{
    $sql = "UPDATE sanpham set luotxem = luotxem + 1 WHERE '$idsp'";
    pdo_query($sql);
}
function update_soluong2($idsp)
{
    $sql = "UPDATE sanpham set soluong = soluong - 1 WHERE id '$idsp'";
    pdo_query($sql);
}
function countsp1($key)
{
    $sql = "SELECT COUNT(quantity) as sl FROM `product` ";
    if ($key != "") {
        $sql .= "WHERE  $key < price AND price < " . $key + 100;
    }
    return pdo_query($sql);
}
function locPrice()
{
    $sql = "SELECT * FROM `sanpham` WHERE price BETWEEN 10 AND 100;";
    return pdo_query($sql);
}

//sản phẩm biến thể
function loadAllSize()
{
    $sql = "SELECT * FROM size ORDER BY id desc";
    $listSize = pdo_query($sql);
    return $listSize;
}
function loadAllColor()
{
    $sql = "SELECT * FROM color ORDER BY id desc";
    $listColor = pdo_query($sql);
    return $listColor;
}

function insert_proVarinant($id, $id_sp, $id_color, $id_size, $quantity, $price){
    $sql = "INSERT INTO `sanphambienthe`(`id`, `id_sp`, `id_color`, `id_size`, `quantity`, `price`) VALUES ('$id', '$id_sp','$id_color', '$id_size', '$quantity', '$price')";
}