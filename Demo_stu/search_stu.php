<?php  

include "db_conn.php";

$query = $_GET['q'];
$condition = $_GET['t'];

$sql = "SELECT * FROM student WHERE {$condition} = '{$query}'";

try{
	
		$response = "";
		$result = $mysqli->query($sql);
    	$rows = $result->fetch_all(MYSQLI_ASSOC);
    	if($result->num_rows == 0){
    		$response = "<p>无结果</p>";
    		echo $response;
    	}
    	else{
    		$response .= "<form method='post' action='update_stu.php'>".
    					 "<table style='margin: auto;'>".
    					 '<tr>'.
                		 '<th>姓名</th>'.
               		 	 '<th>学号</th>'.
                		 '<th>专业</th>'.
                		 '<th>性别</th>'.
                		 '<th>邮箱</th>'.
                		 '<th>手机号</th>'.
            		 	 '</tr>';
    		foreach ($rows as $row) {
    			# code...
    			$response = $response.
    						"<tr id='{$row['sno']}'>".
                       		"<td>{$row['name']}</td>".
                            "<td>{$row['sno']}</td>".
                        	"<td>{$row['major']}</td>".
                        	"<td>{$row['gender']}</td>".
                        	"<td>{$row['email']}</td>".
                        	"<td>{$row['phone']}</td>".
                        	"<td><input type='button' value='编辑' onclick='editChange({$row['sno']})'></td>".
                        	"<td><input type='button' value='删除' onclick='doDelete({$row['sno']})'></td>".
                        	'</tr>'.
                        	"<tr style='display: none;' id='{$row['sno']}1'>".
                            "<form method='post' action='update_stu.php'>".
                        	"<td><input type='text' value='{$row['name']}' name='name'></td>".
                        	"<td>{$row['sno']}</td>".
                        	"<td><input type='text' value='{$row['major']}' name='major'></td>".
                        	"<td><input type='text' value='{$row['gender']}' name='gender'></td>".
                        	"<td><input type='text' value='{$row['email']}' name='email'></td>".
                        	"<td><input type='text' value='{$row['phone']}' name='phone'></td>".
                        	"<td><input type='submit' value='提交'></td>".
                        	"<td><input type='button' value='删除' onclick='doDelete({$row['sno']})'></td>".
                            "</form>".
                        	'</tr>';
    		}
    		$response .= '</form>';
    		echo $response;
    	}

}
catch (mysqli_sql_exception $e){
	echo "搜索失败".$e->getMessage();
}

