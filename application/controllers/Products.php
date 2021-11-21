<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {


	public function show()
	
	{   
             
		    $this->load->model('Product');
    	    $data['products'] =$this->Product->all();
        	$this->load->view('List',$data);

	}
	public function index()
	
	{   
             
		    $this->load->model('Product');
        	$this->load->view('home');

	}
	
	


	public function edit($productId)
                  {        
    	     $this->load->model('Product');
    	     $data['products'] =$this->Product->get_users($productId);

    	    $this->form_validation->set_rules('p_name','Product Name','required');
		    $this->form_validation->set_rules('p_price','Product Price','required') ;
		    $this->form_validation->set_rules('p_qty','Product Quantity','required');
		    $this->form_validation->set_rules('p_des','Product Description','required');
		    if (empty($_FILES['product_image']['name']))
				{
				    $this->form_validation->set_rules('product_image','Product Image','required');
				}
           

	        if($this->form_validation->run()==false)
	            {
	     	       $this->load->view('Edit',$data);
	            } 


	     else
		{    
			$formArray=array();
			$formArray['product_name']=$this->input->post('p_name',true);
			$formArray['product_price']=$this->input->post('p_price',true);
			$formArray['product_quantity']=$this->input->post('p_qty',true);
			$formArray['product_description']=$this->input->post('p_des',true);
	      //$formArray['product_image']=$this->input->post('p_img',true);

			$sdata= array();
			$error= '';
			$config['upload_path']          = './upload/';
			$config['allowed_types']        = 'jpeg|gif|jpg|png';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('product_image'))
			{
				$sdata = $this->upload->data();
				$formArray['product_image'] = $config['upload_path'].$sdata['file_name'];
			   //$this->load->model('Product');
			     $this->Product->update_users($productId,$formArray);
                 $this->session->set_flashdata('success','Record added successfully');
     	         redirect(base_url().'index.php/Products/show');
	          }
			else
			{
				$error = $this->upload->display_errors();

		//$this->db->insert('product_tbl', $data);

			}  

		}	
                     
 }
	public function create(){ 
		
		$this->form_validation->set_rules('p_name','Product Name','required');
		$this->form_validation->set_rules('p_price','Product Price','required');
		$this->form_validation->set_rules('p_qty','Product Quantity','required');
		$this->form_validation->set_rules('p_des','Product Description','required');
        //$this->form_validation->set_rules('p_img','Product Image','required');
		if($this->form_validation->run()==false){
			$this->load->view('create');
		}
		else
		{    
			$formArray=array();
			$formArray['product_name']=$this->input->post('p_name',true);
			$formArray['product_price']=$this->input->post('p_price',true);
			$formArray['product_quantity']=$this->input->post('p_qty',true);
			$formArray['product_description']=$this->input->post('p_des',true);
	      //$formArray['product_image']=$this->input->post('p_img',true);

			$sdata= array();
			$error= '';
			$config['upload_path']          = './upload/';
			$config['allowed_types']        = 'jpeg|gif|jpg|png';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('product_image'))
			{
				$sdata = $this->upload->data();
				$formArray['product_image'] = $config['upload_path'].$sdata['file_name'];
				$this->load->model('product');
				$this->product->create($formArray);

				$this->session->set_flashdata('success','Record added successfully');
				redirect(base_url().'index.php/Products/show');
			}
			else
			{
				$error = $this->upload->display_errors();

		//$this->db->insert('product_tbl', $data);

			}  

		}	
	}

	
	public function delete($productId)
	{    $this->load->model('Product');
	     $products=$this->Product->get_users($productId);
		if(empty($products))
		{
            $this->session->set_flashdata('faild','No data Found');
	     	 redirect(base_url().'index.php/Products/show');

		}

		$this->Product->delete($productId);
		$this->session->set_flashdata('success','Record added successfully');
	    redirect(base_url().'index.php/Products/show');
	}

	public function signup()

{  
      $this->load->model('product');
      $this->load->view('signup');
       
       /*
	  	$this->form_validation->set_rules('user_name', 'Username', 'required');
	     $this->form_validation->set_rules('email', 'Email', 'required');
		 $this->form_validation->set_rules('password', 'Password', 'required');
		 $this->form_validation->set_rules('re-typepassword', ' Re-type Password', 'required');
		 $this->form_validation->set_rules('phone', 'Phone', 'required'); 
		
                    if($this->form_validation->run()==true)
                    {
                    	$this->load->view('signup');
                    
                    }
                  else{ 

                  	$data=array();
                  	$data['user_name']= $this->input->post('user_name');
                  	$data['email']= $this->input->post('email');
                  	$data['password']=$this->input->post('password');
                  	$data['phone']=$this->input->post('phone');
                    $this->product->createu($data);
                   $this->session->set_flashdata("successful","Your Account has been create");
                    $this->load->view('home');
                  redirect(base_url().'index.php/products/show');
                }*/

                if($this->input->post('user_name')!=''){
                 $data=array();
                 $data['user_name']= $this->input->post('user_name');
                 $data['email']= $this->input->post('email');
                 $data['password']=$this->input->post('password');
                 $data['phone']=$this->input->post('phone');
                 $data2=array();
                 $data2['email']= $this->input->post('email');
                 $check = $this->product->auth_check($data2);

                 if($check==true)
                 {
                  $this->form_validation->set_rules('email', 'Email', 'required');
                 }
                 else{
                  $this->product->createu($data);
                 $this->session->set_flashdata("successful","Your Account has been create");
                 $this->load->view('home');
                 redirect(base_url().'index.php/products/index');
                 }

                 
               }
             
}
            
	public function login(){


    $this->load->model('product');
    //$this->load->view('home');
    $this->form_validation->set_rules('email', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run()==false)

    {
     $this->load->view('home');

   }

   else
   {   
    $data = array(
     'email' => $this->input->post('email'),
     'password' =>$this->input->post('password'),

   );

    $check = $this->product->auth_check($data);

    if($check != false){

     $user = array(
       'email' => $check->email,
       'password'=>$check->password,
       'user_name'=>$check->user_name,
     );

     $this->session->set_userdata($user);
     $this->load->view('profile');


   }
   else
   {
    $this->load->view('home');
  }
}
}

public function post_login()
{

  $this->form_validation->set_rules('email', 'Email', 'required');
  $this->form_validation->set_rules('password', 'Password', 'required');


  if ($this->form_validation->run() === FALSE)
  {  
    $this->load->view('signup');
  }


}

public function logout(){
	$this->session->sess_destroy();
	redirect(base_url().'index.php/Products/index');
}



}

