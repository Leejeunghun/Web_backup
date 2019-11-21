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
      <li class="nav-item active">
        <a class="nav-link" href="#">예약 취소<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="./myres.php">나의 예약 현황<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">My page<span class="sr-only">(current)</span></a>
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
        <h1 class="title">아이디/ 비번 찾기 </h1>
        <form name="join" method="post" action="./check_email.php">
        <h1>이메일을 입력 해주세요</h1>
        <table border="1">
          <tr>
            <td>아이디  찾기</td>
            <td><input type="text" size="30" name="id"></td>
          </tr>
        </table>
 <input type=submit value="submit"><input type=reset value="rewrite">
</form>
    </div>
</div>
</body>
</html>
