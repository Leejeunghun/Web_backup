<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<head>
<?php
$servername = "localhost";
$username = "root";
$password = "qwer123";
$dbname = "esebird";
$check_insert =0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
    $Save_start = $_POST['Start_day'];
    $Save_End = $_POST['End_day'];
    $Save_time_start= $_POST['Start_hour'];
    $Save_time_End= $_POST['End_hour'];
// 데이터 합치기
$combined_input_Start = date('Y-m-d H:i:s', strtotime("$Save_start $Save_time_start"));
$combined_input_End = date('Y-m-d H:i:s', strtotime("$Save_End $Save_time_End"));

// 데이터 비교하기 위한 정수화
$str_now = strtotime($combined_input_Start);
$str_target = strtotime($combined_input_End);
if($str_now > $str_target) {
echo "예약이 잘못 되었습니다. 시작일 보다 끝이 더 빠릅니다";
echo "<meta http-equiv='refresh' content='0; url=./main2.php'>";
$check_insert =1;
}
if($check_insert ==0)
{
    echo "check";
    $sql = "SELECT Start_time,End_time FROM time_table";
    $result = $conn->query($sql);
    $sql = "INSERT INTO time_table VALUES('{$Save_start}','{$Save_End}','{$Save_time_start}','{$Save_time_End}','{$_COOKIE["cookie"]}')";
    if ($conn->query($sql) === TRUE)
    {
      echo "<script>alert(\"New record created successfully\");</script>";
      echo "<meta http-equiv='refresh' content='0; url=./main2.php'>"; 
    }
    else
    {
       echo "<script>alert(\"Error: \");</script>";  
       echo "<meta http-equiv='refresh' content='0; url=./main2.php'>"; 
    }
}
$conn->close();
?>
</head>
</html>
