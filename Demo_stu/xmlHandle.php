<?php

include 'db_conn.php';

$query_all = 'SELECT * FROM student';
try{
    $result = $mysqli->query($query_all);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}catch(mysqli_sql_exception $e){
    echo '获取学生失败'.$e->getMessage();
}


$file = fopen('students.xml', 'w');

$text = "<?xml version='1.0' encoding='utf-8'?>
		 <students>";
foreach ($rows as $row) {
	$text = $text.'<student>'.
			'<>'.$row['name'].'<>'.
			'<>'.$row['sno'].'<>'.
			'<>'.$row['major'].'<>'.
			'<>'.$row['gender'].'<>'.
			'<>'.$row['email'].'<>'.
			'<>'.$row['phone'].'<>'.
			'</student>';
}

$text = $text.'</students>';

file_put_contents($file, $text);
