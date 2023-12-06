<?php
function insert_color($color)
{
    $sql = "INSERT INTO `color`( `color`) VALUES ('$color')";
    pdo_query($sql);
}

function load_all_color()
{
    $sql = "SELECT `id`, `color` FROM `color` WHERE 1";
    $listColor = pdo_query($sql);
    return $listColor;
}

function load_one_color($id)
{
    $sql = "SELECT `id`, `color` FROM `color` WHERE id = '$id'";
    $onecolor =  pdo_query($sql);
    return $onecolor;
}
