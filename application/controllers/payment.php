<?php
if ( !defined ('BASEPATH')) exit ('no direct script access allowed');
class Payment extends CI_Controller{
			function __construct(){
				parent::__construct();
				#$this->load->helper('');
				$this->load->model('employee_model');
				$this->load->model('payment_model');
				$this->load->model('quotation_model');


			}
			 	public function index(){
			 		$data['payment_list'] = $this->payment_model->get_all_payment();
					$this->load->view('payment_detailsview', $data);

			 		
			 	}

			 	public function add_new_payment(){

			 		$data['quotation'] = $this->quotation_model->get_all_quotation();
					$this->load->view('payment_insertview',$data);
			 }

			 public function insert_newemployee_db(){
					$edata['date'] = $this->input->post('date');
					$edata['payed'] = $this->input->post('payed');
					$res = $this->payment_model->insert_payment_to_db($pdata);

				if($res){
					header('location:'.base_url()."index.php/payment/".$this->index());

                }
            }
       public function edit(){
					$id = $this->uri->segment(3);
					$data['payment'] = $this->payment_model->getById($id);
					$this->load->view('payment_editview', $data);
				}

public function update()
{

$mdata['date']=$_POST['date']; 
$mdata['payed']=$_POST['payed'];
 
$res=$this->payment_model->update_info($mdata, $_POST['id']);

if($res){
header('location:'.base_url()."index.php/payment/".$this->index());

}

}
public function delete($id)
{
	$this->payment_model->delete_a_payment($id);
	$this->index();

}

}
                  
?>
