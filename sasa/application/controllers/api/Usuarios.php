<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
use \Restserver\Libraries\REST_Controller;
/**
 * 
 */
class Usuarios extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index_get()
    {
        header("Access-Control-Allow-Origin: *");

        $this->load->model("usuarios/Usuario");
        $oUsuario = new Usuario();

        $oResponse = new stdClass();
        $oResponse->message = "Datos cargados correctamente.";
        $oResponse->body = json_decode($oUsuario->list());

        $this->output->set_status_header(200)
                     ->set_content_type('application/json')
                     ->set_output(json_encode($oResponse));
    }


     public function load_get($iId)
    {
        header("Access-Control-Allow-Origin: *");

        $this->load->model("usuarios/Usuario");
        $oUsuario = new Usuario();
        $oUsuario->setId($iId);

        $oResponse = new stdClass();
        $oResponse->message = "Datos cargados correctamente.";
        $oResponse->body = json_decode($oUsuario->load())[0];

        $this->output->set_status_header(200)
                     ->set_content_type('application/json')
                     ->set_output(json_encode($oResponse));

    }
          
}

 ?>