<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0;  charset=utf-8"></head>
<head>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
         <a href="./main.php"><img  src="http://www.inu.ac.kr/user/ese/mycodyimages/top_logo.png" alt="ESE"height="80px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./search.php">아이디찾기 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" id="s4">
        <a class="nav-link" href="./signUpForm.php">회원가입 하기</a>
      </li>
        <form name="singIn" action="./websignIn.php" method="post" onsubmit="return checkSubmit()">
      <div class="line" id="s1">
          <p>아이디</p>
          <div class="inputArea">
              <input type="text" name="memberId" class="memberId" />
          </div>
      </div>
      <div class="line" id="s2">
          <p>비밀번호</p>
          <div class="inputArea">
              <input type="password" name="memberPw" class="memberPw" />
          </div>
      </div>
      <div class="line" id="s3">
          <input type="submit" value="로그인" class="submit" />
      </div>
      </form>
    </ul>

  </div>
</nav>
</header>
</body>
</html>
