<?php
function insert_proVariant($id_sp, $id_color, $id_size, $quantity, $price)
{
   $sql = "INSERT INTO `sanphambienthe`( `id_sp`, `id_color`, `id_size`, `quantity`, `price`)
         VALUES ('$id_sp','$id_color','$id_size','$quantity','$price')";
   pdo_query($sql);
}

function loadall_prov1()
{
    $sql = "SELECT sanpham.name, sanpham.price, sanpham.img, sanpham.id, sanpham.price, color.color 
    AS color_name, size.size AS size_name
    FROM sanpham
    JOIN sanphambienthe ON sanpham.id = sanphambienthe.id_sp
    JOIN color ON sanphambienthe.id_color = color.id
    JOIN size ON sanphambienthe.id_size = size.id";
    $listpv1 = pdo_query($sql);
    return $listpv1;
}

function loadall_prov(){
   $sql = "SELECT * FROM sanphambienthe where 1";
   $listpv = pdo_query($sql);
   return $listpv;
}