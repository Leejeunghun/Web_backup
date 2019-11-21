<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<head>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script type="text/javascript" src="../js/mySignupForm.js"></script>
  <link rel="stylesheet" href="../css/mySignupForm.css" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="../css/main.css">
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
        <a class="nav-link" href="./time_storage.php">예약 신청<span class="sr-only">(current)</span></a>
      </li>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./reserve.php">나의 예약 현황<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
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
<div id="wrap">
    <div id="container">
        <h1 class="title">시간을 입력해 주세요.</h1>
        <form name="check_table" action="./check_table.php" method="post" onsubmit="return checkSubmit()">
            <div class="line">
                <p>시작 날짜 </p>
                <div class="input  Area">
                    <input type="date" name="Start_day" class="Start_day" />
                    <input type="time" name="Start_hour" class="Start_hour" />
                </div>
            </div>
            <div class="line">
                <p>끝나는 날짜 </p>
                <div class="input  Area">
                    <input type="date" name="End_day" class="End_day" />
                    <input type="time" name="End_hour" class="End_hour" />
                </div>
            </div>
            <div class="line">
                <input type="submit" value="예약하기" class="submit" />
            </div>
        </form>
    </div>
</div>
</body>
</html>
