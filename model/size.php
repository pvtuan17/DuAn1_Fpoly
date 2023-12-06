<?php
function insert_size( $size)
{
    $sql = "INSERT INTO `size`( `size`) VALUES ('$size')";
    pdo_query($sql);
}

function load_all_size()
{
    $sql = "SELECT `id`, `size` FROM `size` WHERE 1";
    $listsize = pdo_query($sql);
    return $listsize;
}

function load_one_size($id)
{
    $sql = "SELECT `id`, `size` FROM `size` WHERE id = '$id'";
    $onesize =  pdo_query($sql);
    return $onesize;
}
