<?php
class Conexion
{
	private $conn;
	
	public function __construct()
	{
		$this -> conn = new mysqli('localhost', 'root', '', 'maizblog');
	}

	public function getUsuarios(){
		$query = $this -> conn -> query('SELECT * FROM usuario');

		$retorno = [];
		$index = 0;
		while ($fila = $query -> fetch_assoc()) {
			$retorno[$index] = $fila;
			$index++;
		}
		return $retorno;
	}
}
?>