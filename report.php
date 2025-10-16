<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<?php
// นาย ธีธนาตย์ ธนกุลไพสิฐ 6540011025

// เชื่อมฐานข้อมูล และ ตั้งค่าภาษา UTF8
$servername = 'localhost';
$username = 'root';
$password = '';
$conn = new mysqli($servername, $username, $password);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
$sql = "SET NAMES UTF8";
$conn->query($sql);
$sql = "USE bookdb;";
$conn->query($sql);

//////  ตาราง booktable //////////////

// ดึงข้อมูลจากตาราง booktable 
$sql = "SELECT * FROM booktable";
$result = $conn->query($sql);

// สร้างตารางแสดงข้อมูล 
if($result->num_rows > 0) {
    echo "<center>";
    echo "<table width='60%' cellpadding='5'>";
    echo "<caption align = 'center'>ข้อมูลตาราง booktable</caption>";
    echo "<tr bgcolor=#0099FF >";
    echo "<th width='100' ><font color=#FFFFFF>รหัสหนังสือ";
    echo "<th><font color=#FFFFFF>ชื่อหนังสือ";
    echo "<th><font color=#FFFFFF>ผู้แต่ง";
    echo "<th><font color=#FFFFFF>ราคา";
    echo "<th width='20%'><font color=#FFFFFF>รหัสสำนักพิมพ์";
    echo "</tr>";

    // วนลูปแสดงข้อมูลแต่ละแถว
    $count =0;
    while ($data = $result->fetch_array()){
    if ($count==0){
        echo "<tr bgcolor=#E0EEEE>";
        $count=1;
    }else{
        echo "<tr bgcolor=#C6E2FF>";
        $count=0;
    }
    echo "<td align = 'center'>".$data['book_id']."<td>".$data['title']
    ."<td>".$data['author']."<td align = 'center'>".$data['price']
    ."<td align = 'center'>".$data['pub_id'];
    echo "</tr>";
}
// ปิดตารางและการเชื่อมต่อ
echo "</table><p>";
echo "</center>";
}

//////  ตาราง publishtable //////////////

// ดึงข้อมูลจากตาราง publishtable 
$sql = "SELECT * FROM publishtable";
$result = $conn->query($sql);

// สร้างตารางแสดงข้อมูล 
if($result->num_rows > 0) {
    echo "<center>";
    echo "<table width='60%' cellpadding='5'>";
    echo "<caption align = 'center'>ข้อมูลตาราง publishtable</caption>";
    echo "<tr bgcolor=#0099FF >";
    echo "<th width='100' ><font color=#FFFFFF>รหัสสำนักพิมพ์";
    echo "<th><font color=#FFFFFF>ชื่อสำนักพิมพ์";
    echo "<th><font color=#FFFFFF>ที่อยู่";
    echo "</tr>";

    // วนลูปแสดงข้อมูลแต่ละแถว
    $count =0;
    while ($data = $result->fetch_array()){
    if ($count==0){
        echo "<tr bgcolor=#E0EEEE>";
        $count=1;
    }else{
        echo "<tr bgcolor=#C6E2FF>";
        $count=0;
    }
    echo "<td align = 'center'>".$data['pub_id']."<td>".$data['publish_name']
    ."<td>".$data['address'];
    echo "</tr>";
}
// ปิดตารางและการเชื่อมต่อ
echo "</table><p>";
echo "</center>";
}

//////  ตาราง booktable Left Join publishtable //////////////

// ดึงข้อมูลจากตาราง booktable Left Join publishtable
$sql = "SELECT booktable.*, publishtable.publish_name FROM booktable LEFT JOIN publishtable ON booktable.pub_id = publishtable.pub_id";
$result = $conn->query($sql);

// สร้างตารางแสดงข้อมูล 
if($result->num_rows > 0) {
    echo "<center>";
    echo "<table width='60%' cellpadding='5'>";
    echo "<caption align = 'center'>ข้อมูลตาราง booktable Left Join publishtable</caption>";
    echo "<tr bgcolor=#0099FF >";
    echo "<th width='100' ><font color=#FFFFFF>รหัสหนังสือ";
    echo "<th><font color=#FFFFFF>ชื่อหนังสือ";
    echo "<th><font color=#FFFFFF>ผู้แต่ง";
    echo "<th><font color=#FFFFFF>ราคา";
    echo "<th width='20%'><font color=#FFFFFF>รหัสสำนักพิมพ์";
    echo "<th><font color=#FFFFFF>ชื่อสำนักพิมพ์";
    echo "</tr>";

    // วนลูปแสดงข้อมูลแต่ละแถว
    $count =0;
    while ($data = $result->fetch_array()){
    if ($count==0){
        echo "<tr bgcolor=#E0EEEE>";
        $count=1;
    }else{
        echo "<tr bgcolor=#C6E2FF>";
        $count=0;
    }
    echo "<td align = 'center'>".$data['book_id']."<td>".$data['title']
    ."<td>".$data['author']."<td align = 'center'>".$data['price']
    ."<td align = 'center'>".$data['pub_id']."<td>".$data['publish_name'];
    echo "</tr>";
}
// ปิดตารางและการเชื่อมต่อ
echo "</table><p>";
echo "</center>";
}

//////  ตาราง booktable Right Join publishtable //////////////

// ดึงข้อมูลจากตาราง booktable Right Join publishtable
$sql = "SELECT booktable.*, publishtable.publish_name FROM booktable RIGHT JOIN publishtable ON booktable.pub_id = publishtable.pub_id";
$result = $conn->query($sql);

// สร้างตารางแสดงข้อมูล 
if($result->num_rows > 0) {
    echo "<center>";
    echo "<table width='60%' cellpadding='5'>";
    echo "<caption align = 'center'>ข้อมูลตาราง booktable Right Join publishtable</caption>";
    echo "<tr bgcolor=#0099FF >";
    echo "<th width='100' ><font color=#FFFFFF>รหัสหนังสือ";
    echo "<th><font color=#FFFFFF>ชื่อหนังสือ";
    echo "<th><font color=#FFFFFF>ผู้แต่ง";
    echo "<th><font color=#FFFFFF>ราคา";
    echo "<th width='20%'><font color=#FFFFFF>รหัสสำนักพิมพ์";
    echo "<th><font color=#FFFFFF>ชื่อสำนักพิมพ์";
    echo "</tr>";

    // วนลูปแสดงข้อมูลแต่ละแถว
    $count =0;
    while ($data = $result->fetch_array()){
    if ($count==0){
        echo "<tr bgcolor=#E0EEEE>";
        $count=1;
    }else{
        echo "<tr bgcolor=#C6E2FF>";
        $count=0;
    }
    echo "<td align = 'center'>".$data['book_id']."<td>".$data['title']
    ."<td>".$data['author']."<td align = 'center'>".$data['price']
    ."<td align = 'center'>".$data['pub_id']."<td>".$data['publish_name'];
    echo "</tr>";
}
// ปิดตารางและการเชื่อมต่อ
echo "</table><p>";
echo "</center>";
}

//////  ตาราง booktable Left Join publishtable แบบมีเงื่อนไขการเรียงข้อมูล //////////////

// ดึงข้อมูลจากตาราง booktable Left Join publishtable แบบมีเงื่อนไขการเรียงข้อมูล
$sql = "SELECT booktable.*, publishtable.publish_name FROM booktable LEFT JOIN publishtable ON booktable.pub_id = publishtable.pub_id ORDER BY booktable.price DESC";
$result = $conn->query($sql);

// สร้างตารางแสดงข้อมูล 
if($result->num_rows > 0) {
    echo "<center>";
    echo "<table width='60%' cellpadding='5'>";
    echo "<caption align = 'center'>ข้อมูลตาราง booktable Left Join publishtable แบบมีเงื่อนไขการเรียงข้อมูล</caption>";
    echo "<tr bgcolor=#0099FF >";
    echo "<th width='100' ><font color=#FFFFFF>รหัสหนังสือ";
    echo "<th><font color=#FFFFFF>ชื่อหนังสือ";
    echo "<th><font color=#FFFFFF>ผู้แต่ง";
    echo "<th><font color=#FFFFFF>ราคา";
    echo "<th width='20%'><font color=#FFFFFF>รหัสสำนักพิมพ์";
    echo "<th><font color=#FFFFFF>ชื่อสำนักพิมพ์";
    echo "</tr>";

    // วนลูปแสดงข้อมูลแต่ละแถว
    $count =0;
    while ($data = $result->fetch_array()){
    if ($count==0){
        echo "<tr bgcolor=#E0EEEE>";
        $count=1;
    }else{
        echo "<tr bgcolor=#C6E2FF>";
        $count=0;
    }
    echo "<td align = 'center'>".$data['book_id']."<td>".$data['title']
    ."<td>".$data['author']."<td align = 'center'>".$data['price']
    ."<td align = 'center'>".$data['pub_id']."<td>".$data['publish_name'];
    echo "</tr>";
}
// ปิดตารางและการเชื่อมต่อ
echo "</table><p>";
echo "</center>";
}

$conn->close();
?>
</body>
</html>