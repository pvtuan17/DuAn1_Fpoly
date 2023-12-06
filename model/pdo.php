<?php
function pdo_get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=duan_1a", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
function pdo_execute($sql)
{
    $conn = pdo_get_connection();
    $sql= $conn->prepare($sql);
    $sql->execute();
}
// truy vấn nhiều dữ liệu
function pdo_query($sql)
{
    $conn = pdo_get_connection();
    $sql = $conn->prepare($sql);
    $sql->execute();
    $kq = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $kq;
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql)
{
    $conn = pdo_get_connection();
    $sql = $conn->prepare($sql);
    $sql->execute();
    $kq = $sql->fetch(PDO::FETCH_ASSOC);
    return $kq;
}

pdo_get_connection();

//Thống kê
function getdata($a)
{ // lấy dữ liệu về 
    $conn = pdo_get_connection();
    $sql = $conn->prepare($a); // tạo biến chuẩn bị câu lệnh query để say này thực thi
    $sql->execute(); // câu lệnh thực thi
    $sql->setFetchMode(PDO::FETCH_ASSOC); // câu lệnh trả về dữ liệu dạng mảng
    $kq = $sql->fetchAll(); // tạo biến chứa tất cả dữ liệu trả về
    return $kq;
}
