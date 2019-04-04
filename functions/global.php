<?php
$items = array('home','buy','download','education','Help me','news','project');
$link = 'http://localhost/défisite/index.php';
function menu($array,$link){
    foreach($array as $val){
        echo '<a class="nav-item nav-link" href='.$link.'?page='. $val .' ">'. $val .'</a>';
    }
}
