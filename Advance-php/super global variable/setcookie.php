<?php

date_default_timezone_set("Asia/Kolkata");
setcookie("user","khushi",time()+(86400*7));
setcookie("visit_time",date("d-m-y h:i:s"),time()+(86400*7));

echo "cookie has been set"
?>