<?php
/**
 * Created by PhpStorm.
 * User: scc29
 * Date: 2017/9/10
 * Time: 10:15
 */

include "db_conn.php";

$sno = $_GET['sno'];

try{
    $delete_sql = "DELETE FROM student WHERE sno = ?";

    $stmt = $mysqli->prepare($delete_sql);
    $stmt->bind_param('s', $sno);
    $stmt->execute();
    header("location:index.php");

}catch (mysqli_sql_exception $e){
    echo '删除失败'.$e->getMessage();
}

