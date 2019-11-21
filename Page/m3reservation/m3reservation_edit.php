<? // 넘겨받는 변수 $item, $ymd, 수정시 $re_id
include_once("./_common.php");
include_once("$g4[path]/head.sub.php");

// 권한
if($member[mb_level]<2) alert("권한이 없습니다.");

// 변수 확인
if(!$item) alert("항목이 넘어오지 않음");
if(!$ymd) alert("날짜가 넘어오지 않음");

#############################################
// 삭제하기
if($f=="delete") {
	// 권한 확인
	$sql = "select * from `m3reservation` where re_id='$re_id'";
	$re = sql_fetch($sql);
	if($member[mb_id]!=$re[mb_id]) alert("권한이 없습니다.");
	sql_query("delete from `m3reservation` where re_id='$re_id'");
	alert_close("삭제 완료");
	die();
}

#############################################
// 입력부
if($f=="update" || $f=="insert") {
	// 변수 확인 및 정리
	$content1 = htmlspecialchars(trim($content1));
	if(!strlen($content1)) alert("사용자 이름은 꼭 입력해주세요.");
	$content2 = htmlspecialchars(trim($content2));
	$time1 = sprintf("%02d",$h1).sprintf("%02d",$m1);
	$time2 = sprintf("%02d",$h2).sprintf("%02d",$m2);
	if($time1 >= $time2) alert("시작 시간과 끝 시간을 확인해주세요.");
	// 겹치는 시간이 있으면 빠꾸
	$temp = sql_fetch("select content1, time1, time2 from `m3reservation` where ((time1 > '$time1' AND time1 < '$time2') OR (time2 > '$time1' AND time2 < '$time2')) AND ymd='$ymd' AND item='$item' AND re_id!='$re_id'");
	if($temp) alert($temp[content1]."님의 예약(".substr($temp[time1],0,2).":".substr($temp[time1],2,2)."~".substr($temp[time2],0,2).":".substr($temp[time2],2,2).")과 중복됩니다.\\n시간을 확인하세요.");
	// 쿼리
	if($f=="update") {
		sql_query("update `m3reservation` set item='$item', ymd='$ymd', time1='$time1', time2='$time2', content1='$content1', content2='$content2', mb_id='$member[mb_id]' where re_id='$re_id' LIMIT 1");
	}
	elseif($f=="insert") {
		sql_query("insert into `m3reservation` set item='$item', ymd='$ymd', time1='$time1', time2='$time2', content1='$content1', content2='$content2', mb_id='$member[mb_id]'");
		$re_id = mysql_insert_id();
	}
	// 원래 페이지 리로드
	goto_url("$_SERVER[PHP_SELF]?item=$item&ymd=$ymd&re_id=$re_id");
}

// 내용 가져오기
if($re_id) {
	$sql = "select * from `m3reservation` where re_id='$re_id'";
	$re = sql_fetch($sql);
}
$temp = sql_fetch("select content1 from `m3reservation` where re_id='$item'");
$itemname = $temp[content1]; // 항목 이름

#############################################
// 남의 예약을 보는 경우
if($re_id && $member[mb_id]!=$re[mb_id]) {
	echo "<h1>예약 내역</h1>";
	echo "<table class='m3tbl'>";
	echo "<tr><td class='lh'>항목</td><td>$itemname</td></tr>";
	echo "<tr><td class='lh'>날짜</td>";
	echo "<td>".substr($ymd,0,4)."년 ".intval(substr($ymd,4,2))."월 ".intval(substr($ymd,6,2))."일</td></tr>";
	echo "<tr><td class='lh'>시간</td>";
	echo "<td>".substr($re[time1],0,2).":".substr($re[time1],2,2)."~".substr($re[time2],0,2).":".substr($re[time2],2,2)."</td></tr>";
	echo "<tr><td class='lh'>사용자</td><td>".htmlspecialchars($re[content1])."</td></tr>";
	echo "<tr><td class='lh'>기타 내용</td><td>".nl2br(htmlspecialchars($re[content2]))."</td></tr>";

}
#############################################
// 예약을 수정하거나 추가하는 경우
else {

if($re_id) { ?><h1>예약 수정하기</h1>
<?} else { ?><h1>예약 추가하기</h1><? } ?>
<form action="<?=$_SERVER[PHP_SELF]?>" method="post">
<input type="hidden" name="ymd" value="<?=$ymd?>" />
<input type="hidden" name="item" value="<?=$item?>" />
<? if($re_id) { ?>
	<input type="hidden" name="f" value="update" />
	<input type="hidden" name="re_id" value="<?=$re_id?>" />
<? } else { ?>
	<input type="hidden" name="f" value="insert" />
<? } ?>
<table class="m3tbl">
<tr><td class='lh'>항목</td><td><?=$itemname?></td></tr>
<tr><td class="lh">시작</td>
	<td><select name="h1">
<?for($i=0; $i<24; $i++) {?>
	<option value="<?=$i?>"<?=$i==substr($re[time1],0,2)?" selected":""?>><?=$i<13?"오전{$i}시":"오후".($i-12)."시";?></option>
<? } ?>
	</select>
	<select name="m1">
<?for($i=0; $i<60; $i=$i+10) { ?>
	<option value="<?=$i?>"<?=$i==substr($re[time1],2,2)?" selected":""?>><?=$i?>분</option>
<? } ?>
	</select>
</td></tr>
<tr><td class="lh">끝</td>
	<td><select name="h2">
<?for($i=0; $i<24; $i++) {?>
	<option value="<?=$i?>"<?=$i==substr($re[time2],0,2)?" selected":""?>><?=$i<13?"오전{$i}시":"오후".($i-12)."시";?></option>
<? } ?>
	</select>
	<select name="m2">
<?for($i=0; $i<60; $i=$i+10) { ?>
	<option value="<?=$i?>"<?=$i==substr($re[time2],2,2)?" selected":""?>><?=$i?>분</option>
<? } ?>
	</select>
</td></tr>
<tr><td class="lh">사용자</td>
	<td><input type="text" name="content1" value="<?=$re[content1]?>" size="30" />
</td></tr>
<tr><td class="lh">기타 내용</td>
	<td><textarea name="content2" rows="4" cols="30"><?=htmlspecialchars($re[content2])?></textarea>
</td></tr>
<tr><td colspan="2" class="align_c"><input type="submit" value="save" /></td></tr>
</table>
</form>

<? // 자기가 쓴 것이면 삭제버튼
if($re[mb_id]==$member[mb_id]) { ?>
<a href="<?=$_SERVER[PHP_SELF]?>?item=<?=$item?>&ymd=<?=$ymd?>&re_id=<?=$re_id?>&f=delete">삭제하기</a>
<? } ?>

<?
}
include_once("$g4[path]/head.sub.php");
?>
