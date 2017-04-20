<?php

header('HTTP/1.1 404 Not Found');
header('Content-type: text/plain; charset=UTF-8');

$viewParams['date'] = date('d/m/Y');

require_once($templateFolder.'/template404.txt.php');
