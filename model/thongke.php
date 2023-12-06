<?php
function loadall_thongke(){
    $a="select danhmuc.id as madm, danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $a.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $a.=" group by danhmuc.id order by danhmuc.id desc";
    $listthongke=getdata($a);
    return $listthongke; 
}
?>