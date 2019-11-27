<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
  <?php
      include "../include/session.php";
      include "../include/dbConnect.php";
      /*echo "<pre>";
      var_dump($_POST);*/
      $memberId = $_POST['memberId'];
      $memberPw = md5($memberPw = $_POST['memberPw']);

      setcookie("cookie","$memberId",time() + 3600,"/");

      $sql = "SELECT * FROM member WHERE memberId = '{$memberId}' AND password = '{$memberPw}'";
      $res = $dbConnect->query($sql);



          $row = $res->fetch_array(MYSQLI_ASSOC);


          if ($row != null) {
              $_SESSION['ses_userid'] = $row['memberId'];
          }

          if($row == null){             
              echo "<script>alert(\"로그인 실패 아이디와 비밀번호가 일치하지 않습니다.\");</script>";
             echo "<meta http-equiv='refresh' content='0; url=./webmain.php'>";
          }
          else{
           echo "<meta http-equiv='refresh' content='0; url=./webmain2.php'>";
         }
  ?>
</body>
</html>
