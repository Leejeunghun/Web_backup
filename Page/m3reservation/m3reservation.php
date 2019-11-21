<?php
include "./_common.php";
//if($member[mb_level]<2) echo("권한이 없습니다.");
$g4[title] = "회원전용 > Reservation";
include "$g4[path]/_head.php";
include "./_lunar.php";
include "./_specialday.php";

// 항목을 위해 10개를 reservation
if(!sql_fetch("select * from `m3reservation`")){
	for($i=0; $i<10; $i++) {
		$j = $i + 1;
		sql_query("insert into `m3reservation` set content1 = '항목$j'");
	}
}
############## 여기까지 ##############
######################################

// 권한
if($member[mb_level]<2) alert("권한이 없습니다.");

// 항목
if(!$item) $item = 1;
$temp = sql_fetch("select content1 from `m3reservation` where re_id='$item'");
$itemname = $temp[content1];

// 연월
if(!$cur_ym) $cur_ym = date("Ym");
$cur_y = substr($cur_ym, 0, 4);
$cur_m = substr($cur_ym, 4, 2);
$prev_ym = date("Ym", strtotime($cur_y."-".$cur_m."-"."01") - 24 * 60 * 60);
$next_ym = date("Ym", strtotime($cur_y."-".$cur_m."-"."28") + 4 * 24 * 60 * 60);
$today_ymd = date("Ymd");

// 달력용 변수
$firstdayofweek = date("w", strtotime("$cur_y-$cur_m-01"));
$lastdayofweek = date("w", strtotime(substr($next_ym, 0, 4)."-".substr($next_ym, 4,2)."-00"));
$lastday = date("d", strtotime(substr($next_ym, 0, 4)."-".substr($next_ym, 4,2)."-00"));

<link rel="stylesheet" href="./m3reservation.css" type="text/css" />

<div id="m3reservation_title">
	<a name="m3head"></a>
	<table width="100%"><tr><td class="title">$itemname Reservation</td>
	<td align="right"><select onchange="javascript: if(this.value) { location.href='$_SERVER[PHP_SELF]?item='+this.value; }">
	<option value="">다른 예약 항목</option>
	for($i=1;$i<=10;$i++) {
		$temp = sql_fetch("select content1 from `m3reservation` where re_id='$i'");
		if(strlen($temp[content1])) {
	<option value="$i">$temp[content1]</option> }}
	</select>
	if($member[mb_level]=="10") echo "<a href=\"javascript:win_open('./m3reservation_item.php', 'm3', 'left=150, top=150, width=400, height=400, scrollbars=0')\">항목수정하기</a>";
	</td></tr></table>
	Click on the date to make a new reservation.
</div>
<div class="align_c">
	<a href="$_SERVER[PHP_SELF]cur_ym=$prev_ym&item=$item#m3head"><img src="./img/lt.png" /></a>
	$cur_y년 intval($cur_m)월
	<a href="$_SERVER[PHP_SELF]cur_ym==$next_ym&item==$item#m3head"><img src="./img/rt.png" /></a>
</div>
// 달력 그리기 시작
echo "<table id='reservation'>";

// 요일 넣기
echo "<tr>";
$wk = array("일", "월", "화", "수", "목", "금", "토");
for($i=0; $i<7; $i++) {
	echo "<th>$wk[$i]</td>";
}
echo "<tr>";


// 처음 빈 칸 그리기
$dayofweek = 0;
for($i=0; $i<$firstdayofweek; $i++) {
	echo "<td>&nbsp;</td>";
	$dayofweek++;
}

// 각 날짜 입력하기
for($i=1; $i<=$lastday; $i++) {
	// 전처리
	$sol = $cur_m.sprintf("%02d", $i);
	$ymd = $cur_y.$sol;
	if($dayofweek==7) {
		echo "</tr><tr>";
		$dayofweek = 0;
	}
	if($today_ymd == $cur_ym.sprintf("%02d", $i)) echo "<td class='today'>"; // 오늘은 색깔 다르게
	else echo "<td>";
	echo "<a href=\"javascript:win_open('./m3reservation_edit.php?item=$item&ymd=$ymd', 'm3', 'width=400, height=300, scrollbars=0')\"><b>$i</b></a>";
	// 석봉운님의 음력날짜 변수선언
	$myarray = soltolun($cur_y,$cur_m,$i);
		$lun_m = sprintf("%02d", $myarray[month]);
		$lun_d = sprintf("%02d", $myarray[day]);
		$lun = $lun_m.$lun_d.$myarray[leap];
		if ($myarray[day]==1 || $myarray[day]==11 || $myarray[day]==21) {
			$moonday = "<span class='lunar'> (-)$myarray[month].$myarray[day]$myarray[leap]</span>";
		} else {
			$moonday="";
	}
	// 음력 표기
	echo "$moonday ";
	// 기념일 표기
	echo specialday($sol, $lun);
	// 예약 내역 가져오기
	$query = sql_query("select * from `m3reservation` where item='$item' AND ymd='$ymd' ORDER BY time1");
	while($row = sql_fetch_array($query)) {
		echo "<br /><a href=\"javascript:win_open('./m3reservation_edit.php?item=$item&ymd=$ymd&re_id=$row[re_id]', 'm3', 'width=400, height=300, scrollbars=0')\">";
		echo "<span class='reserve'";
		echo " title='".str_replace("'", "＇", $row[content2])."'>";
		echo substr($row[time1],0,2).":".substr($row[time1],2,2);
		echo "~";
		echo substr($row[time2],0,2).":".substr($row[time2],2,2);
		echo " $row[content1]";
		echo "</span></a>";
	}
	echo "</td>";
	$dayofweek++;
}

// 나머지 빈 칸 그리기
for($i=$lastdayofweek+1; $i<7; $i++) {
	echo "<td>&nbsp;</td>";
}

// 달력 닫기
echo "</tr></table>";

include "$g4[path]/_tail.php";
?>
