<?php 
if ($f == 'load_posts') {
    $wo['page'] = 'home';
    $load = sanitize_output(lui_LoadPage('home/load-posts'));
    echo $load;
    exit();
}
