<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
Class Jornadas extends CI_CONTROLLER
{
    public function __construct()
    {
        parent::__construct();
 
        //cargamos la base de datos por defecto
        $this->load->database('default');
        //cargamos el helper url y el helper form
        $this->load->helper(array('url','form'));
        //cargamos la librería form_validation
        $this->load->library(array('form_validation'));
        //cargamos el modelo crud_model
        $this->load->model('paises_model');
 
    }
 
        
    public function index()
    {
        $titulo = "Jornada";
        $datos=$this->paises_model->getPaises();
        $this->load->view('Jornada',compact("datos","titulo"));
    }
    public function option()
    {
        $opcion = $this->input->post('boton');
        $id = $this->uri->segment(3);
        if ($opcion == "Jornada Completa") {
            redirect('/jornadas');
        }
        else{
            if ($opcion == "Editar"){
                redirect('Docentes/form_Editar/'.$id);
            }
            else{
                if ($opcion == "Eliminar") {
                    redirect('Docentes/Eliminar/'.$id);
                }
            }
        }
    }
    
    
    

    /*public function usando_result_array()
    {
        //$this->load->model('personas_model'); acá sería un llamado de tipo local sólo para el método
        $datos=$this->personas_model->getPersonas2();
        $this->load->view('usando_result_array',compact("datos"));
    }
    public function usando_where($id=null)
    {
        //$this->load->model('personas_model'); acá sería un llamado de tipo local sólo para el método
        $datos=$this->personas_model->getPersonasPorId($id);
        $this->load->view('usando_where',compact("datos"));
    }
    */
 
}
 
/*
*Location: application/controllers/crud.php
*/