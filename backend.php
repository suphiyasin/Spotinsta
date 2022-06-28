<?php
function spotcookie(){
$spotcookie = 'Bearer BLALBALBLA';
  return $spotcookie;
}

function instacookie(){
$instacookie = 'COPY VALUE AND PASTE HERE';
  // be like ig_did=xx ig_nrcb=1; mid=xx; datr=xxxxx; ds_user_id=xx; shbid="xxxxxx"; shbts="xxxxxxx"; csrftoken=xxxxxx; sessionid=xxxx:xxxx:xxxx; rur="xxxxx" 
return $instacookie;
}



function calanid(){
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://gew1-spclient.spotify.com/connect-state/v1/devices/hobs_934ad9f0e035c3b09e8f3e3e3fa5664fbd3');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"member_type\":\"CONNECT_STATE\",\"device\":{\"device_info\":{\"capabilities\":{\"can_be_player\":false,\"hidden\":true,\"needs_full_player_state\":true}}}}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: gew1-spclient.spotify.com';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Authorization: '.spotcookie().'';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Origin: https://open.spotify.com';
$headers[] = 'Referer: https://open.spotify.com/';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Spotify-Connection-Id: NmE4ZDU3OGEtNjJhZi00Yjk1LWEyZTEtMWM2YmM4MTkxMWQxK2RlYWxlcit0Y3A6Ly9nZXcxLWRlYWxlci1iLXA2ZjQuZ2V3MS5zcG90aWZ5Lm5ldDo1NzAwKzMyMDFDMUZBNEYyNTdFQjZFMEJFM0JFMzBGRDhGMzM1NTYyMDZFRjlBOTA2RjVBOUM1ODUwMzIwRjE1QTMzOEI=';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$response = json_decode($result, true);
//print_r($response);

$trackex = $response['player_state']['track']['uri'];
$trackexing = explode(":", $trackex);
$track = $trackexing[2];
getoldu($track);

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

}

function getad($id){
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/tracks?ids='.$id.'&market=from_token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Authorization: '.spotcookie().'';
$headers[] = 'Referer: https://open.spotify.com/';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$response = json_decode($result, true);
$ad = $response['tracks']['0']['album']['name'];
$ad2 = $response['tracks']['0']['href'];
echo $ad;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

}


function getoldu($id){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/tracks?ids='.$id.'&market=from_token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
$headers = array();
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Authorization: '.spotcookie().'';
$headers[] = 'Referer: https://open.spotify.com/';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
$response = json_decode($result, true);
//print_r($result);

$resp = $response['tracks']['0']['name'];
$respsarkici = $response['tracks']['0']['artists']['0']['name'];
$sa = getsure();
$cikart = 100 - $sa;
$cikbol = $cikart / 10;
$tam = $sa / 10;
$duration = "";
$i = 0;
while($i < $tam){
	$duration = $duration."—";
	$i = $i + 1;
}
$veri = 'Real Time Listening : '.$respsarkici.' - '.$resp.'
Time :  ►︎ '.$duration.' ★ '.guzel($cikbol, "—").'';
update($veri);
//echo $veri;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

}


function getsure(){
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://gew1-spclient.spotify.com/connect-state/v1/devices/hobs_236c462448ea2d53724d268e92ae1086a60');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"member_type\":\"CONNECT_STATE\",\"device\":{\"device_info\":{\"capabilities\":{\"can_be_player\":false,\"hidden\":true,\"needs_full_player_state\":true}}}}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: gew1-spclient.spotify.com';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Authorization: '.spotcookie().'';
$headers[] = 'Content-Type: text/plain;charset=UTF-8';
$headers[] = 'Origin: https://open.spotify.com';
$headers[] = 'Referer: https://open.spotify.com/';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Spotify-Connection-Id: YjU4NzhjZTYtZmMxMy00NjUwLTg0NjktYjM4YTk5Y2I0NmM5K2RlYWxlcit0Y3A6Ly9nZXcxLWRlYWxlci1iLWc3ZmguZ2V3MS5zcG90aWZ5Lm5ldDo1NzAwKzVCRjI1Qjg4OTNCQkU3NEFFMzZCM0FFNjQ3RkY2RTAyQzVFQkY5Q0VFMUM1NTZFQTBCMkI0MTY2RjlEMUQ1OEE=';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$response = json_decode($result, true);
$toplam = $response['player_state']['duration'];
$suan = $response['player_state']['position_as_of_timestamp'];
$bol = $suan / $toplam;
$carp = 100 * $bol;
return $carp;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

	
}

function guzel($ad, $kar){
	$i = 0;
	$sonuc = "";
	
	while($i < $ad){
$sonuc = $sonuc.$kar;
$i = $i + 1;
	}
return $sonuc;
	}	
	

function update($veri){
	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/accounts/edit/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "first_name=YOUR+NAME&email=INSTAMAIL@gmail.com&username=USERNAME&phone_number=+905555555555&biography=ORGINAL+BIO.+
".$veri."&external_url=&chaining_enabled=on");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Authority: www.instagram.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Cookie: '.instacookie().'';
$headers[] = 'Origin: https://www.instagram.com';
$headers[] = 'Referer: https://www.instagram.com/accounts/edit/';
$headers[] = 'Sec-Ch-Prefers-Color-Scheme: light';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'Viewport-Width: 1366';
$headers[] = 'X-Asbd-Id: 198387';
$headers[] = 'X-Csrftoken: 8U23Sd0d703TgAVQVWFXOQq8foUUJdPA';
$headers[] = 'X-Ig-App-Id: 936619743392459';
$headers[] = 'X-Ig-Www-Claim: hmac.AR3dgO8U2NgN-ME9Ez69hHz1zJBexwsJrIFChPandL_XJvFS';
$headers[] = 'X-Instagram-Ajax: 57ac339ce6f4';
$headers[] = 'X-Requested-With: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

}

calanid();
