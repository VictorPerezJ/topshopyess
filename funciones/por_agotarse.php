<?php

function por_agotarse($cantidad_p){
    if($cantidad_p <= '10'){
    return '<p style="color:red; font-size:20px;">'.$cantidad_p.' <br> Por Agotarse </p>';
}else{
    return '<p style="color:black; font-size:20px;">'.$cantidad_p.'</p>';
}
}

?>