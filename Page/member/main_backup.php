<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="../css/main.css">
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
        <form name="singIn" action="./signIn.php" method="post" onsubmit="return checkSubmit()">
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
   <img src="http://www.heerim.com/assets/attach/project/%C0%CE%C3%B5%B4%EB%BC%DB%B5%B5%C4%B7%C6%DB%BD%BA_1920%20%283%29.jpg" alt="INU" height="655px" width="1535px">
   </body>
</html>
