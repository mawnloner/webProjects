<?php 
    // make a function that will return the current date and time
    function getDateTime() {
        $date = date("d-m-Y H:i:s");
        return $date;
    }

    function sayHello() {
        $hour = date("H");
        if ($hour <= 6) {
            return "Good night";
        }
        elseif ($hour > 6 && $hour <= 12) {
            return "Good morning";
        }
        elseif ($hour > 12 && $hour <= 18) {
            return "Good afternoon";
        }
        elseif ($hour > 18 && $hour <= 24) {
            return "Good evening";
        }
    }

    // make a function to echo the current date and time and the greeting
    echo sayHello() . ", the current date and time is " . getDateTime();
    return;
    
?>