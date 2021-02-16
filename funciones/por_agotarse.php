<?php

function por_agotarse($cantidad_p){
    if($cantidad_p <= '10'){
    return '<i style="color:red; font-size:22px; margin-top: 50%">'.$cantidad_p.', Por Agotarse </i>';
}else{
    return '<i style="color:black; font-size:22px; margin-top: 50%">'.$cantidad_p.'</i>';
}
}

?>