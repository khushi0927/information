<?php
$today = strtotime("today");
$nextBirthday = strtotime("2025-12-25");

$diff = ($nextBirthday - $today) / (60 * 60 * 24); 

echo "Days until next birthday: " . $diff;
?>
