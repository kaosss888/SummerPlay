<?php 

include "db_conn.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ? AND password =?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $username, $password);
// $stmt->bind_result($result);
// $stmt->fetch();

if ($stmt->execute()) {
	header("location:index.php");
}
else{
	echo '登陆错误';
}
