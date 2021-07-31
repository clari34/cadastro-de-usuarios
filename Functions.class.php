<?php
class Functions {
	public function caracter($vlr, $tipo){
		switch($tipo){
			case 1: $rst = utf8_decode($vlr); break;
			case 2: $rst = htmlentities($vlr, ENT_QUOTES, "ISO-8859-1"); break; 
		}
		return $rst;
	}
    
	public function codificar($vlt, $n){
		switch($n){
			case 1: return base64_encode($vlt); break;
			case 2; return base64_decode($vlt); break;
		}
	}	
	
	public function verificarCampo($dado){
		return (isset($dado))?($dado):("");
	}
	
}

?>
}
?>