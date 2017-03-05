<?php


class killVote {
	private $reg, $cfg =array();

	private function loadCFG(){

		/* Tipo de base de datos (M = MySQL | L = SQLite) */
		$this->cfg['db']['use'] = 'M';
		/* Prefix para utilizar delante de los campos */
		$this->cfg['db']['prefix'] = 'killvote_';

		/* Solo MySQL */
		$this->cfg['db']['my']['host'] = 'localhost'; //servidor
		$this->cfg['db']['my']['user'] = 'root'; // usuario
		$this->cfg['db']['my']['pwd'] = ''; // contraseña
		$this->cfg['db']['my']['database'] = ''; // nombre de la bd.

		/* Solo SQLite */
		$this->cfg['db']['lite']['file'] = ''; // Donde esta el archivo.
		$this->cfg['db']['lite']['user'] = ''; // Usuario (si existe)
		$this->cfg['db']['lite']['pwd'] = ''; // Contraseña (si existe)

		/* Privacidad.. cifra las IP's en sha1 (forzado a TRUE si usas SQLite)*/
		$this->cfg['cryptIP'] = true;
	}

	public function __construct($id=NULL){
		if(($id!==0&&empty($id)) && empty($_POST['voter'])){return false;}

	}

	private function kl_install(){

	}

	private function kl_connect(){

	}


}

$dm = New killVote(0);

?>