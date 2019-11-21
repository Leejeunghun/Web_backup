<?
include_once("./_common.php");
include_once("$g4[path]/head.sub.php");

// 권한
if($member[mb_level]<10) alert("권한이 없습니다.");

// 입력하는 경우
if($_POST[f] == "update") {
	// 10개 항목 이름 업데이트
	for($i=1; $i<=10; $i++) {
		$sql = "update `m3reservation` set content1='$item[$i]' where re_id='$i'";
		sql_query($sql);
	}
	// 원래 페이지로 alert하고 돌려주기
	alert("수정 완료", $_SERVER[PHP_SELF]);
}
?>
<link rel="stylesheet" href="./m3reservation.css" type="text/css" />
<h1>예약 항목 이름 수정하기</h1>
<span class="pale">빈칸으로 두면 출력되지 않습니다.</span>
<form method="post" action="<?=$_SERVER[PHP_SELF]?>">
<input type="hidden" name="f" value="update" />
<table class="m3tbl">
<?for($i=1; $i<=10; $i++) { 
	$row = sql_fetch("select content1 from `m3reservation` where re_id='$i'");
?>
<tr><td class="lh">항목 <?=$i?></td>
	<td><input type="text" name="item[<?=$i?>]" value="<?=$row[content1]?>" size="30" /></td></tr>
<? } ?>
<tr><td colspan="2" class="align_c"><input type="submit" value="Save" /></td></tr>
</table>
</form>
<?
include_once("$g4[path]/tail.sub.php");
?>