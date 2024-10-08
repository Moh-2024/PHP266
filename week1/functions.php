<?php

function checkAge($age) {
    return $age >= 21;
}
function fizzBuzz($num) 
{
    if($num % 2 == 0) {
        return "Fizz";
    }elseif($num % 3 == 0) {
        return "Buzz";
    }elseif($num % 2 == 0 && $num % 3 == 0) {   
        return "Fizz Buzz";
    }
}




