<?php
/**
 * Created by PhpStorm.
 * User: scc29
 * Date: 2017/9/10
 * Time: 10:14
 */

include "db_conn.php";

$name = $_POST['name'];
$sno = $_POST['sno'];
$major = $_POST['major'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$update_sql = "UPDATE student SET name = ?, major = ?, gender = ?, email = ?, phone = ? WHERE sno = ?";

try{
    $stmt = $mysqli->prepare($update_sql);
    $stmt->bind_param('ssssss', $name, $major, $gender, $email, $phone, $sno);
    $stmt->execute();
    header("location:index.php");
}catch (mysqli_sql_exception $e){
    echo '更新失败'.$e->getMessage();
}

