<?php
function checkPalindrome($inputString) {
    $lenght = strlen($inputString);
        for($i=0; $i < floor(($lenght/2)); $i++) {
            if($inputString[$i] == $inputString[$lenght-$i-1]){
                $result = TRUE;
            } else {
                $result = FALSE;
                echo $result;
                break;
            }
        }
    echo $result;
}
checkPalindrome('aabaa');