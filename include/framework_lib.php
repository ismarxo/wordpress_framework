<?php

function _assets() {
    return get_template_directory_uri().'/assets';
}

function vd($a) {
    echo '<pre style="color: black; margin: 10px 40px; padding: 20px 90px; background: yellow; border: 1px dotted black">';
    var_dump($a);
    echo '</pre>';
}