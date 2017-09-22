<?php
/**
 * Created by PhpStorm.
 * User: scc29
 * Date: 2017/9/10
 * Time: 10:13
 */

//$dbms = 'mysql';
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbName = 'student';
//$dsn = '$dbms:host=$host, dbname=$dbName';

try{

    $mysqli = new mysqli($host, $user, $pass, $dbName); //初始化一个mysqli对象

}catch(mysqli_sql_exception $e){

    die("数据库连接失败".$e->getMessage());

}