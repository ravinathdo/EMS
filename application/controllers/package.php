<?php
if ( !defined ('BASEPATH')) exit ('no direct script access allowed');
class Package extends CI_Controller{
			function __construct(){
				parent::__construct();
				#$this->load->helper('');
				$this->load->model('package_model');

			}
			 	public function index(){
			 		//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login
			 		$data['package_list'] = $this->package_model->get_all_package();
					$this->load->view('package_view', $data);
					}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}

			 		
			 	}

			 	public function add_package(){
			 		//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login

			 		$this->load->view('package_insertview');
			 		}
			else
			{
				//no direct access
				redirect(base_url().'index.php/login');
			}
			 }

			 public function insert_newpackage_db(){
			 	//check user status
			if ($this->session->userdata('logged_id'))
			{
				//it is valid login
 					$pdata['package_name'] = $this->input->post('package');
					$pdata['no_of_cams'] = $this->input->post('no_of_cams');
					$pdata['charge_per_cam'] = $this->input->post('charge_per_cam');
					$pdata['description'] = $this->input->post('description');
					$res = $this->package_model->insert_package_to_db($pdata);

				if($res){
					header('location:'.base_url()."index.php/package/".$this->index());

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
					$data['package'] = $this->package_model->getById($id);
					$this->load->view('package_editview', $data);
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

$mdata['id']=$_POST['id'];
$mdata['package_name']=$_POST['package_name']; 
$mdata['no_of_cams']=$_POST['no_of_cams'];
$mdata['price']=$_POST['price'];

 
$res=$this->package_model->update_info($mdata, $_POST['id']);

if($res){
header('location:'.base_url()."index.php/Package/".$this->index());

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
	$this->package_model->delete_a_package($id);
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