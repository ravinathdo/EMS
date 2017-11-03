<?php
if ( !defined ('BASEPATH')) exit ('no direct script access allowed');
class Package extends CI_Controller{
			function __construct(){
				parent::__construct();
				#$this->load->helper('');
				$this->load->model('team_model');
				$this->load->model('event_model');
				$this->load->model('employee_model');

			}
			 	public function index(){
			 		//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login
			 		$data['team_list'] = $this->team_model->get_all_team();
					$this->load->view('team_view', $data);
					}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}

			 		
			 	}
			public function get_event_name()
			{
				//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login
				$data['events'] = $this->event_model->get_all_events();
				$this->load->view('team_view',$data);
				}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}
			}

			 	public function team_assign(){
			 		//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login

			 		$data['events'] = $this->event_model->get_all_events();
			 		$this->load->view('team_assignview',$data);
			 		}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}
			 	}
			 	public function get_event_id()
			 	{
			 		//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login

			 		$event_id = $this->input->post('event_id');
			 		$n_cams = $this->event_model->find_no_of_cams($event_id);
			 		$cdata = $this->employee_model->get_employee_names_C($n_cams);
			 		
			 		
			 		$res = $this->team_model->insert_team($cdata,$cadata,$tadata,$sedata,$aodata,$vodata,$fmdata,$event_id);

			 		if($res){
			 			$data['team_list'] =$this->team_model->get_currunt_team($event_id);
			 			foreach ($team_list as $t_key){
			 				$this->employee_model->get_emp_for_team($t_key->employee_id);
			 			$event_name= $this->event_model->get_event_name($event_id);
						header('location:'.base_url()."index.php/team/".$this->team_data($event_name,$data));

                }
                }
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}


			 }

			 public function team_data($event_name,$data)
			 {
			 	//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login
			 	$this->load->view('team_dataview',$event_name,$data);
			 	}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}
			 }

			 public function insert_newteam_db(){
			 	//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login
 					$pdata['c'] = $this->input->post('c');
					$pdata['ca'] = $this->input->post('ca');
					$pdata['ta'] = $this->input->post('ta');
					$pdata['se'] = $this->input->post('se');
					$pdata['ao'] = $this->input->post('ao');
					$pdata['vo'] = $this->input->post('vo');
					$pdata['fm'] = $this->input->post('fm');
					$res = $this->team_model->insert_team_to_db($tdata);

				if($res){
					header('location:'.base_url()."index.php/team/".$this->index());

                }
                }
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}
            }
       public function edit(){
       	//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login
					$id = $this->uri->segment(3);
					$data['team'] = $this->team_model->getById($id);
					$this->load->view('team_editview', $data);
					}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}
				}


public function update()
{
	//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login

$mdata['c']=$_POST['c'];
$mdata['ca']=$_POST['ca']; 
$mdata['ta']=$_POST['ta'];
$mdata['se']=$_POST['se'];
$mdata['ao']=$_POST['ao'];
$mdata['vo']=$_POST['vo'];
$mdata['fm']=$_POST['fm'];

 
$res=$this->team_model->update_info($mdata, $_POST['id']);

if($res){
header('location:'.base_url()."index.php/team/".$this->index());

}
}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}

}
public function delete($id)
{
	//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login
	$this->team_model->delete_a_team($id);
	$this->index();
	}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}

}

}
                  
?>