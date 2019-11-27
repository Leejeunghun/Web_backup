<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0; charset=utf-8"></head>
<head>
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
        <a class="nav-link" href="./allreserve.php"> 사용 현황 </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./reserve.php">나의 예약 현황</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./webindex_QR.php">QR코드 생성</a>
      </li>
          <form name="singOut" action="./signOut.php" method="ses_userid" onsubmit="return checkSubmit()">
          <div class="line1" id="s3">
              <input type="submit" value="로그아웃" class="submit" />
          </div>
          </form>
    </ul>

  </div>
</nav>
</header>
DOOR Control:
         <form method="get" action="webmain2.php">
                 <input type="submit" value="ON" name="on">
                 <input type="submit" value="OFF" name="off">
         </form>
  <?php
         shell_exec("gpio -g mode 21 out");
         if(isset($_GET['on'])){
                 shell_exec("gpio -g write 21 1");
     echo "Door  Open";
    
         }
         else if(isset($_GET['off'])){
     shell_exec("gpio -g write 21 0");
     echo "Door Close ";
     
         }
         ?>
</body>

</html>
