<?php
$size = 8; 

for ($row = 1; $row <= $size; $row++) {
    for ($col = 1; $col <= $size; $col++) {
    
        echo (($row + $col) % 2 == 0) ? "#" : "&nbsp;&nbsp;";
    }
    echo "<br>"; 
}
?>
