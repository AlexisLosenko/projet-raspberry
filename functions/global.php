<?php
$items = array('Home','Buy','Download','Education','Help me','News','Project');
$link = 'http://localhost/projet-raspberry/index.php';
function menu($array,$link){
    foreach($array as $val){
        echo '<a class="nav-item nav-link" href='.$link.'?page='. $val .' ">'. $val .'</a>';
    }
}
