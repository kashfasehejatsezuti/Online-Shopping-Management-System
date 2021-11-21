<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	 public function create ($formArray)
	{   

		$this->db->insert('productadd', $formArray);
	
	}
	public function createu ($formArray)
	{   

		$this->db->insert('users', $formArray);
	
	}
	public function all ()
	{
		
		$products=$this->db->get('productadd');
		return $products->result_array();
	}


		public function get_users ($productId)
	{
		$this->db->where('product_id',$productId);
		$products=$this->db->get('productadd');
		return $products->row_array();
	}
	public function update_users ($productId,$formArray)

	{   $this->db->where('product_id',$productId);
		$this->db->update('productadd',$formArray);	
	}
    public function delete($productId)

	{   $this->db->where('product_id',$productId);
		$this->db->delete('productadd');	
	}

	public function auth_check($data)
    {
        $query = $this->db->get_where('users', $data);
        if($query==true)
        {   
         return $query->row();
        }
        return false;
    }



}
