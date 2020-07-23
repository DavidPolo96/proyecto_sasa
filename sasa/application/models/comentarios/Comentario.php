<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	 * 
	 */
	class Comentario extends CI_Model
	{

		private $iPostId;
		function __construct()
		{
			parent::__construct();
			
		}

		public function setPostId($iPostId)
		{
			$this->iPostId = $iPostId;
		}
		public function listComentario()
		{
			try {
				$iPostId = $this->iPostId;
				$sUrl = "https://jsonplaceholder.typicode.com/comments?postId={$iPostId}";
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