<?php

function test(){
    return 'test';
}


$test = function($par){
    return 'test ' . $par;
};

$test2 = function() use ($test){
    return 'test2 ' .  $test('test3');
};

echo $test2();


$arr = [
    function(){
        return '1. fonksiyon';
    },
    function(){
        return '2. fonksiyon';
    },
    function(){
        return '3. fonksiyon';
    }
];


$soyad = 'Güldüren';

function filtrele($isim)
{
    global $soyad;
    return $isim . ' ' . $soyad; 
}

$arr = ['metehan','ali','veli','lale'];
$arr = array_map(function($isim) use($soyad){
    return $isim . ' ' . $soyad; 
}, $arr);

print_r($arr);

?>