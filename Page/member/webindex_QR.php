<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0;  charset=utf-8"></head><head>
   <link rel="stylesheet" type="text/css" href="../css/main2.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <a class="nav-link" href="./index_QR.php">QR코드 생성</a>
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

  <textarea onkeyup="generate_qrcode(this.value)" cols="50" rows="5"></textarea>
<div id="result"></div>
</body>
<script>
 function generate_qrcode(sample){
 $.ajax({
 type: 'post',
 url: 'generator.php',
 data : {sample:sample},
 success: function(code){
 $('#result').html(code);
 }
 });
 }
</script>
</html>
