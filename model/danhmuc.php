<?php
function insert_danhmuc($tenloai, $hinh)
{
    $sql = "INSERT INTO danhmuc(name, img) values ('$tenloai', '$hinh')";
    pdo_execute($sql);
}

function delete_danhmuc($id)
{
    $sql = "DELETE FROM danhmuc WHERE id=" . $id;
    pdo_query($sql);
}
function loadall_danhmuc()
{
    $sql = "SELECT * FROM danhmuc ORDER BY id desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadall_danhmuc_top3()
{
    $sql = "SELECT * FROM danhmuc where 1 order by id desc limit 0,3";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function loadone_danhmuc($id)
{
    $sql = "SELECT * FROM danhmuc where id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_danhmuc($id, $tenloai, $hinh)
{
    $sql = "UPDATE danhmuc set name =  '" . $tenloai . "', img =  '" . $hinh . "' where id=" . $id;
    pdo_execute($sql);
}
