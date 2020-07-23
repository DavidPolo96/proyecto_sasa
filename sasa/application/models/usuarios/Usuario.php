<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Usuario extends CI_Model
	{

		private $iId ;
		function __construct()
		{
			parent::__construct();
			
		}

		public function setId($iId)
		{
			$this->iId = $iId;
		}
		public function list()
		{
			try {

				$sUrl = "https://jsonplaceholder.typicode.com/users";
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

		public function load()
		{	

			try {
				$iId = $this->iId;
				$sUrl = "https://jsonplaceholder.typicode.com/users?id={$iId}";
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