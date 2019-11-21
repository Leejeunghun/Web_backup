<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<head>
<?php
$servername = "localhost";
$username = "esebird";
$password = "qwer123!";
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
else
{
    $time_check = "SELECT Start_time,End_time,Start_hour, End_hour FROM time_table";
    $result = $conn->query($time_check);
    if ($result->num_rows > 0)
     {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $combined_Save_Start = date('Y-m-d H:i:s', strtotime("$row[Start_time] $row[Start_hour]"));
        $combined_Save_End = date('Y-m-d H:i:s', strtotime("$row[End_time] $row[End_hour]"));
        $Data_merge_start  = strtotime($combined_input_Start);
        $Data_merge_End    = strtotime($combined_Save_End);



        if($Data_merge_start>$str_now && $Data_merge_start<$str_target)
        {
            //시작 점에 걸리는 경우
            $check_insert =1;
             echo "<script>alert(\"error: 2데이터 못 들어감\");</script>";       
            echo "<meta http-equiv='refresh' content='0; url=./main2.php'>";
        }
        else if($Data_merge_End>$str_now && $Data_merge_End<$str_target)
        {
            //끝점에 걸리는경우
            echo "<script>alert(\"error: 3 데이터 못 들어감\");</script>";       
            echo "<meta http-equiv='refresh' content='0; url=./main2.php'>";
        }

      }
    }
    else
    {

    }
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