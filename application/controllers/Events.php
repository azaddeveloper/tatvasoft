<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
 
    function __construct() {
        parent::__construct();
    }
    public function index(){
    	$data['events']= $this->event->getAllEvents();
    	$this->load->view("eventsList",$data);
    }
    public function viewEevent(){
    	$event= $this->event->getAllEvents($_GET['id']);
    	$data['event']=$event[0];
    	$this->load->view("event",$data);
    	
    }
     public function deleteEvent(){
        $event= $this->event->deleteEvent($_GET['id']);
        $this->index();
        
    }

    public function add(){
    	if($_POST){
            die;
			$start_date= strtotime(date("d-m-Y", strtotime($this->input->post("start_date"))));
			$end_date= strtotime(date("d-m-Y", strtotime($this->input->post("end_date"))));
    		$inputData=array(
    			"name"=>$this->input->post("name"),
    			"start_date"=> $start_date,
    			"end_date"=> $end_date,
    			"recurrence_type"=>$this->input->post("recurrence_type"),
    		);
    		if($inputData['recurrence_type'] == 1 ){
    			$inputData['repeat_type'] =$this->input->post("repeat_type") ;
    			$inputData['repeat_type_on'] =$this->input->post("repeat_on") ;

    		}
          
    		$this->event->add($inputData);
            // $this->index();
            // die;
    	}
    	$this->load->view('add');
    }
}