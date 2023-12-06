<?php

function insert_binhluan($noidung, $id_user, $id_product, $ngaybinhluan)
{
    $ngaybinhluan = date('Y-m-d');

    $sql = "INSERT INTO binhluan(noidung, id_user, id_product, ngaybinhluan) VALUES('$noidung', '$id_user', '$id_product', '$ngaybinhluan')";
    pdo_execute($sql);
}

function loadAll_binhLuan($id_product)
{
    $sql = "SELECT * FROM binhluan WHERE 1";
    if ($id_product > 0) $sql .= " AND id_product='$id_product'";
    $sql .= " ORDER BY id DESC";
    $listBl = pdo_query($sql);
    return $listBl;
}

function loadAll_comment()
{
    $sql = "SELECT * FROM binhluan ORDER BY id DESC";
    $listBl = pdo_query($sql);
    return $listBl;
}

function delete_binhLuan($id)
{
    $sql = "DELETE FROM binhluan WHERE id = $id";
    pdo_execute($sql);
}
