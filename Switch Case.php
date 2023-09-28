<?php

    $a = 7;

    /*
    if ($a == 5){

    } elseif ($a == 6){

    } else {

    }
    */

    Switch ($a){

        case 5:
            echo 'a 5e eşit';
        break;

        case 6:
            echo 'a 6ya eşit';
        break;

        case $a % 4 == 3:
            echo '7yi 4e bölünce kalan 3tür';
        break;

        default:
            echo 'hiçbir şeye eşit değil';
        break;

    }

?