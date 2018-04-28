<?php 	

class tablaUsuarios{
	
	var $id_user; 
	var	$nombres;	
	var $appat;	
	var	$apmat;	
	var	$correo;	
	var	$contra;	
	var	$fecha_nac;	
	var	$tel;

	function construct($id_user,$nombres,$appat,$apmat,$correo,$contra,$fecha_nac,$tel){
		$this->id_user = $id_user;
		$this->nombres = $nombres;
		$this->appat = $appat;
		$this->apmat = $apmat;
		$this->correo = $correo;
		$this->contra = $contra;
		$this->fecha_nac = $fecha_nac;	
		$this->tel = $tel;
	}

	function insertarUsuarios(){
		$nombres = $this->nombres;
		$appat = $this->appat;
		$apmat = $this->apmat;
		$correo = $this->correo;
		$contra = $this->contra;
		$fecha_nac = $this->fecha_nac;
		$tel = $this->tel;
		mysql_query("INSERT INTO usuariosgeneral(id_user,nombres,appat,apmat,correo,contra,fecha_nac,tel) VALUES (0,'$nombres','$appat','$apmat','$correo','$contra','$fecha_nac',$tel)");
	}
}
?>