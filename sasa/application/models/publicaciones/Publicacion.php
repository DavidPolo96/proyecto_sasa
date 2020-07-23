<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Publicacion extends CI_Model
	{

		private $iUserId;
		private $aComentarios;
		function __construct()
		{
			parent::__construct();
			
		}

		public function setUserId($iUserId)
		{
			$this->iUserId = $iUserId;
		}

		public function publicacionUsuario()
		{	

			try {
				$iUserId = $this->iUserId;
				$sUrl = "https://jsonplaceholder.typicode.com/posts?userId={$iUserId}";
				$oCurl = curl_init();
				curl_setopt($oCurl, CURLOPT_URL, $sUrl);
				curl_setopt($oCurl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($oCurl, CURLOPT_BINARYTRANSFER, true);
				$oResponse = curl_exec($oCurl);
       
		        curl_close($oCurl);

		        return $oResponse;
				
				
			} catch (Exception $e) {
				throw new Exception($e->getMessage());
			}
		}
	}
 ?>