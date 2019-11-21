<?
$official_sol = array(
"0101" => "신정",
"0301" => "삼일절",
"0505" => "어린이날",
"0606" => "현충일",
"0815" => "광복절",
"1003" => "개천절",
"1225" => "성탄절");

$official_lun = array(
"0204" => "설연휴",
"0205" => "설날",
"0206" => "설연휴",
"0408" => "석가탄신일",
"0912" => "추석연휴",
"0913" => "추석",
"0914" => "추석연휴");

$special_sol = array(
"0717" => "제헌절",
"1009" => "한글날",
"0105" => "소한",
"0120" => "대한",
"0204" => "입춘",
"0218" => "우수",
"0305" => "경칩",
"0320" => "춘분",
"0405" => "청명, 식목일",
"0420" => "곡우",
"0505" => "입하",
"0521" => "소만",
"0605" => "망종",
"0621" => "하지",
"0707" => "소서",
"0723" => "대서",
"0807" => "입추",
"0823" => "처서",
"0907" => "백로",
"0923" => "추분",
"1008" => "한로",
"1023" => "상강",
"1107" => "입동",
"1122" => "소설",
"1207" => "대설",
"1222" => "동지");

$special_lun = array(
"0505" => "단오");

function specialday($sol, $lun) {
	global $official_sol, $official_lun, $special_sol, $special_lun;
	if($official_sol[$sol]) $str .=  " <span class='official'>".$official_sol[$sol]."</span>";
	if($official_lun[$lun]) $str .= " <span class='official'>".$official_lun[$lun]."</span>";
	if($special_sol[$sol]) $str .= " <span class='special'>".$special_sol[$sol]."</span>";
	if($special_sol[$lun]) $str .= " <span class='special'>".$special_lun[$lun]."</span>";
	return $str;
}
?>
