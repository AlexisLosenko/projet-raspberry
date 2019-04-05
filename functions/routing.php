<?php
    if($request == 'home' OR $request =='') require './visualisation/home.php';
    else if($request == 'buy') require './visualisation/buy.php';
    else if($request == 'download') require './visualisation/download.php';
    //else if($request == 'education') require './visualisation/education.php';
    else if($request == 'Help') require './visualisation/Help.php';
    //else if($request == 'news') require './visualisation/news.php';
    //else if($request == 'projects') require './visualisation/projects.php';
    else require './visualisation/error.php';
