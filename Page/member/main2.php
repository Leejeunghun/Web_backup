<!DOCTYPE html>
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
        <a class="nav-link" href="./allreserve.php"> 사용 현황 </a>
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
</header>
   <img src="http://www.heerim.com/assets/attach/project/%C0%CE%C3%B5%B4%EB%BC%DB%B5%B5%C4%B7%C6%DB%BD%BA_1920%20%283%29.jpg" alt="INU" height="655px" width="1535px">
</body>
</html>
