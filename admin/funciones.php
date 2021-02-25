<?php

 function Pagada($statusn){
	
		if($statusn=='Pagada'){
			return '<form method="POST" action="EnviarN.php">
      <input type="text" id="enviar" name="enviar" value="Enviada" style="display: none;">
      <input type="text" value="$clave_de_nota" id="clavee" name="clavee" style="display: none;">
      <input type="submit" value="Marcar Como Enviada" class="btn btn-danger" style="float: right; color: white;">
      
  </form><br><br>';
			
		}else{
			return '';
		}
	}

?>