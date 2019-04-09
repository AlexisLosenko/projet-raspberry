<?php
    if($request == 'Home' OR $request =='') require './visualisation/home.php';
    else if($request == 'Buy') require './visualisation/buy.php';
    else if($request == 'Download') require './visualisation/download.php';
    //else if($request == 'education') require './visualisation/education.php';
    else if($request == 'Help') require './visualisation/Help.php';
    //else if($request == 'news') require './visualisation/news.php';
    //else if($request == 'projects') require './visualisation/projects.php';
    else require './visualisation/error.php';
