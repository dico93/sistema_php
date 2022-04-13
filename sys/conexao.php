<?php
	$server = "localhost";
	$user = "root";
	$pass = "";
	$bd = "cadastro";

	 if ($conn = mysqli_connect($server, $user, $pass, $bd) ) {
		// echo "Conectado!";
	} else
		echo "ERRO na Conexão";


	function mensagem($texto, $tipo){
		echo "<div class='alert alert-primary' role='alert'> 
				  $texto
			  </div>";
	}	
?>