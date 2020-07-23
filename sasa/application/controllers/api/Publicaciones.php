<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use \Restserver\Libraries\REST_Controller;
/**
 * 
 */
class Publicaciones extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
    }

     public function index_get()
    {

    }
     public function usuario_get($iUserId)
    {
        header("Access-Control-Allow-Origin: *");

        $this->load->model("publicaciones/Publicacion");
        $opublicacion = new Publicacion();
        $opublicacion->setUserId($iUserId);
        
        $oResponse = new stdClass();
        $oResponse->message = "Datos cargados correctamente.";
        $oResponse->body = json_decode($opublicacion->publicacionUsuario());

        $this->output->set_status_header(200)
                     ->set_content_type('application/json')
                     ->set_output(json_encode($oResponse));

    }
          
}

 ?>