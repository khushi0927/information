<?php

date_default_timezone_set("Asia/Kolkata"); 


$day = date("l"); 


if ($day == "Sunday") {
    echo "Happy Sunday!";
} else {
    echo "Today is $day.";
}
?>
