<?php
$grade = "A"; 

switch (strtoupper($grade)) {
    case "A":
    case "B":
        echo "Grade $grade: Excellent";
        break;
        
    case "C":
        echo "Grade $grade: Good";
        break;
        
    case "D":
        echo "Grade $grade: Needs Improvement";
        break;
        
    case "F":
        echo "Grade $grade: Fail";
        break;
        
    default:
        echo "Invalid grade! Please enter A, B, C, D, or F.";
}
?>
