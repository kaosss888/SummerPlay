<?php
/**
 * Created by PhpStorm.
 * User: scc29
 * Date: 2017/9/10
 * Time: 10:14
 */

include "db_conn.php";

$query_all = 'SELECT * FROM student';
try{
    $result = $mysqli->query($query_all);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}catch(mysqli_sql_exception $e){
    echo '获取学生失败'.$e->getMessage();
}


?>

<html>
    <head>
        <meta lang="en">
        <meta charset="utf-8">
        <title>Student Management</title>
    </head>

    <body>
        <form>
        <div style="width:300px; margin: auto;">
                <select id="type">
                    <option value="name">姓名</option>
                    <option value="sno" selected="selected">学号</option>
                    <option value="major">专业</option>
                    <option value="gender">性别</option>
                    <option value="email">邮箱</option>
                    <option value="phone">手机号</option>
                </select>
                <input type="text" onkeyup="showStudent()" id="search">
                <input type="button" name="submit" value="提交" onclick="showStudent()">
        </div>
        </form>
        <div id="show" style="width:800px; margin: auto;">
            
        </div>

        <table style="margin: auto;" id="all_stu">
            <tr>
                <th>姓名</th>
                <th>学号</th>
                <th>专业</th>
                <th>性别</th>
                <th>邮箱</th>
                <th>手机号</th>
            </tr>

            <?php
                    foreach ($rows as $row) {
                        echo "<tr id='{$row['sno']}'>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['sno']}</td>";
                        echo "<td>{$row['major']}</td>";
                        echo "<td>{$row['gender']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['phone']}</td>";
                        echo "<td><input type='button' value='编辑' onclick='editChange({$row['sno']})'></td>";
                            echo "<td><input type='button' value='删除' onclick='doDelete({$row['sno']})'></td>";
                        echo '</tr>';
                        
                        echo "<tr style='display: none;' id='{$row['sno']}1'>";
                        echo "<form method='post' action='update_stu.php'>";
                        echo "<td><input type='text' value='{$row['name']}' name='name'></td>";
                        echo "<td><input type='text' value='{$row['sno']}' name='sno'></td>";
                        echo "<td><input type='text' value='{$row['major']}' name='major'></td>";
                        echo "<td><input type='text' value='{$row['gender']}' name='gender'></td>";
                        echo "<td><input type='text' value='{$row['email']}' name='email'></td>";
                        echo "<td><input type='text' value='{$row['phone']}' name='phone'></td>";
                        echo "<td><input type='submit' value='提交'></td>";
                        echo "<td><input type='button' value='删除' onclick='doDelete({$row['sno']})'></td>";
                        echo "</form>";
                        echo '</tr>';
                    }

            ?>
            <tr>
                <td><input type="button" value="添加学生" onclick="showAdd('add')"></td>
            </tr>
        </table>

        <form method="post" action="add_stu.php" >
            <table id="add" style="visibility: hidden; margin: auto;">
                <tr>
                    <th>姓名</th>
                    <th>学号</th>
                    <th>专业</th>
                    <th>性别</th>
                    <th>邮箱</th>
                    <th>手机号</th>
                </tr>
                <tr>
                    <td><input type="text" name="name"></td>
                    <td><input type="text" name="sno"></td>
                    <td><input type="text" name="major"></td>
                    <td><input type="text" name="gender"></td>
                    <td><input type="text" name="email"></td>
                    <td><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="提交"></td>
                </tr>
            </table>
        </form>
    </body>
    <script type="text/javascript" src="student_main.js"></script>
    <script>

        var state = 0;

        function editChange(id){
            var item = document.getElementById(id);
            var item1 = document.getElementById(id+'1');
            item.style.display = 'none';
            item1.style.display = 'table-row';
        }

        function showAdd(id){
            var val = document.getElementById(id);
            if (!state) {
                val.style.visibility = 'visible';
                state = !state;
            }
            else{
                val.style.visibility = 'hidden';
                state = !state;
            }
        }

        function doDelete(sno){
            var el = document.createElement("a");
            document.body.appendChild(el);
            el.href = 'delete_stu.php?sno=' + sno;
            el.click();
            document.body.removeChild(el);
        }
    </script>
</html>
