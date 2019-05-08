<?php
function is_logged_in() {
    // instancia de codeigniter
    $CI =& get_instance();
    //Seteamos la variable de sesion 
    $user = $CI->session->userdata('userdata');
    
    //si no existe la variable, se retorna falso
    if (!isset($user)) { return false; } else { return true; }
}