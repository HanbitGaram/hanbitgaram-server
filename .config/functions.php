<?php
function GET($url='',  $header=[], $encoding='utf-8'){
    $header[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';

    $ch = curl_init();                                 //curl 초기화
    curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);      //connection timeout 10초
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);      //connection timeout 10초
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);   // 따라가기
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);       //POST data

    $retry = 0;
    $response = curl_exec($ch);

    echo PHP_EOL;
    echo "-----------------------------------".PHP_EOL;
    echo "| GET REQUEST ....".PHP_EOL;
    echo "-----------------------------------".PHP_EOL;
    echo "| 주소 : ".$url.PHP_EOL;

    while(curl_errno($ch)!==0 && $retry<3){
        echo "| 재시도 중 {$retry}회차 : ".$url.PHP_EOL;
        $response = curl_exec($ch);
        $retry++;
    }

    if($retry>=3){
        echo "| 상태 : 실패".PHP_EOL;
    }else{
        echo "| 상태 : 성공".PHP_EOL;
    }
    echo "-----------------------------------".PHP_EOL;

    curl_close($ch);

    if($encoding != 'utf-8') $response = iconv('euc-kr', 'utf-8//IGNORE', $response);

    return $response;
}