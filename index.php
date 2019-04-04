<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$request = $_GET['page'];
switch ($request) {
    case '' :
    require './visualisation/elements/corp.php';
    break;
    case 'home' :
    require './visualisation/elements/corp.php';
    break;
    case 'buy' :
    require './visualisation/elements/corp.php';
    break;
    case 'download' :
    require './visualisation/elements/corp.php';
    break;
    case 'education' :
    require './visualisation/elements/corp.php';
    break;
    case 'Help me' :
    require './visualisation/elements/corp.php';
    break;
    case 'news' :
    require './visualisation/elements/corp.php';
    break;
    case 'project' :
    require './visualisation/elements/corp.php';
    break;
    default:
    require './visualisation/elements/corp.php';
}
