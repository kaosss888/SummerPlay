<?php
/**
 * Created by PhpStorm.
 * User: scc29
 * Date: 2017/9/10
 * Time: 10:15
 */

include "db_conn.php";

$name = $_POST['name'];
$sno = $_POST['sno'];
$major = $_POST['major'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$add_sql = "INSERT INTO student VALUES ( ?, ?, ?, ?, ?, ?)";

try{
    $stmt = $mysqli->prepare($add_sql);
    $stmt->bind_param('ssssss', $name, $sno, $major, $gender, $email, $phone);
    $stmt->execute();
    header('location:index.php');
}catch (mysqli_sql_exception $e){
    die('添加失败'.$e->getMessage());
}