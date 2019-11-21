<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="../css/main2.css">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
         <a href="./main2.php"><img  src="http://www.inu.ac.kr/user/ese/mycodyimages/top_logo.png" alt="ESE"height="80px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./time_storage.php">예약 신청 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./reserve.php">나의 예약 현황</a>
      </li>
          <form name="singOut" action="./signOut.php" method="ses_userid" onsubmit="return checkSubmit()">
          <div class="line1" id="s3">
              <input type="submit" value="로그아웃" class="submit" />
          </div>
          </form>
    </ul>

  </div>
</nav>
<style>
  table {
    width: 100%;
    border: 1px solid #444444;
  }
  th, td {
    border: 1px solid #444444;
  }
</style>
<?php
$servername = "localhost";
$username = "root";
$password = "qwer123";
$dbname = "esebird";
$check_insert =0;
$memberId = $_COOKIE["cookie"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
    $time_check = "SELECT * FROM item";
    $result = $conn->query($time_check);
    echo "<table>";
    echo "<tr><td> 사용자 </td><td> 사용상태 </td><td>시간</td> </tr>";
    if ($result->num_rows > 0)
     {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if( $row[User]==$memberId)
        {
        echo "<tr><td> $row[User]</td><td> $row[Door_status]</td> <td>$row[time] </td> </tr>";
        }
      }
    }
    echo "</table>";


$conn->close();
?>
</head>
</html>
