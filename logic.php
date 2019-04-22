<?php 

function getCurl($url){
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$output = curl_exec($ch); 
	curl_close($ch);      
	return $output;
}

$thisMonth = date('Y-m');
$thisDate = date('Y-m-d');

if(isset($_POST['submit'])) {
	setlocale(LC_ALL, 'id_ID');
	$lokasi = $_POST['lokasi'];
	$dataMonthly = json_decode(getCurl('https://api.pray.zone/v2/times/this_month.json?city='. $lokasi . '&month='.$thisMonth . '&school=10'), true);
	$dataDaily = json_decode(getCurl('https://api.pray.zone/v2/times/today.json?city='. $lokasi . '&month='.$thisMonth . '&school=10'), true);
} else {
	$dataMonthly = json_decode(getCurl('https://api.pray.zone/v2/times/this_month.json?city=bogor&month=' .$thisMonth .  '&school=10'), true);
	$dataDaily = json_decode(getCurl('https://api.pray.zone/v2/times/today.json?city=bogor&month=' .$thisMonth . '&school=10'), true);
}