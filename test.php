<?php
 //header('Content-Type: application/json');

 //HTTP username.
$username = 'epic_user';
 //HTTP password.
 $password = 'T3lk0mDes2017';


 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,'http://10.194.12.28/slg_online_bc/simulasi.php');
 //curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
 curl_setopt_array($ch, array(
  CURLOPT_RETURNTRANSFER => TRUE
 ));

 $output = curl_exec($ch);
 curl_close($ch);

//echo $output;

$data = json_decode($output,true);


$jml =  count($data);

$z = 0;
$x = 0;
while($x <= $jml){
	echo $data[$z]['STANDARD_NAME']."<br>";
	$x++;
	$z++;
}

?>