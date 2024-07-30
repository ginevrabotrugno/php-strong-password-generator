<?php

function getChar($charsList){
    return $charsList[rand(0, strlen($charsList) - 1)];
}

function generatePassword($charsList, $pswLength){
    $psw = '';

    while (strlen($psw) < $pswLength) {
        $char = getChar($charsList);
        $psw .= $char;
    }

    return $psw;


}

?>