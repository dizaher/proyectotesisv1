<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cprincipal extends CI_Controller {

	function __construct()
	  {

	    parent::__construct();
	    $this->load->helper('url');    
	  }

	 function index()
	 {  
	   if($this->session->userdata('logged_in'))
	   {
	     $session_data = $this->session->userdata('logged_in');     
	     $data['nombre'] = $session_data['nombre']; 
	     $perfil = $session_data['perfil_cve_perfil'];    
	     if($perfil==1){//condición para mostrar la vista del administrador 
	     	$data['contenido']='productos_view';
	      	$this->load->view('productosAdmin_view', $data);    
	     }
	     else{
	      if ($perfil==2) {//condición para la vista del tecnico
	      	$data['contenido']='productos_view';
	        $this->load->view('productosTecnico_view', $data);        
	      }
	      else
	        if ($perfil==3) {// condición para la vista del usuario
	        	$data['contenido']='productos_view';
	          	$this->load->view('user_view', $data);         
	        }
	     }  
	   }
	   else
	   {
	     //If no session, redirect to login page
	     redirect('login', 'refresh');     
	   }
	 }

	 function logout()
	 {	   
	   $this->session->sess_destroy();
	   redirect('login', 'refresh');
	 }

	 public function acuaponico()
	 {
	  	$session_data = $this->session->userdata('logged_in');     
	  	$data['nombre'] = $session_data['nombre'];
	  	$data['contenido']='acuaponicoChinanpero_view';
	  	$this->load->view('productosAdmin_view',$data); 
	 }

	 public function calentador()
	 {
	 	$session_data = $this->session->userdata('logged_in');     
	  	$data['nombre'] = $session_data['nombre'];
	  	$data['contenido']='calentadorSolar_view';
	  	$this->load->view('productosAdmin_view',$data); 
	 }

	 public function biodiesel()
	 {
	 	$session_data = $this->session->userdata('logged_in');     
	  	$data['nombre'] = $session_data['nombre'];
	  	$data['contenido']='microplantaBiodiesel_view';
	  	$this->load->view('productosAdmin_view',$data); 
	 }

	 public function eolico()
	 {
	 	$session_data = $this->session->userdata('logged_in');     
	  	$data['nombre'] = $session_data['nombre'];
	  	$data['contenido']='generadorEolico_view';
	  	$this->load->view('productosAdmin_view',$data); 
	 }


	 /*
	 public function index()
	 {
	  $data['contenido']='noticias_view';
	  $this->load->view('index',$data); 
	 }*/
	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */