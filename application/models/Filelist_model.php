<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filelist_model extends CI_Model {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function fetchAllFiles($limit, $start)
	{
	
		$this->db->order_by('created_at', 'desc');	
		$this->db->limit($limit, $start);
		$query = $this->db->get('file_list');
		return $query->result_array();
	}

	public function addNewFile($data){
		//echo '<pre>';print_r($data);exit;
		$insertdata = array(
							'filename' => $data['upload_data']['file_name'],
							'extension' => $data['upload_data']['file_ext'],
							'directory' => 'uploads',
							'status' => 'Active'

						);
		 $this->db->insert('file_list',$insertdata); 
	}

	public function deletefile($id){
		$this->db->where('id',$id);
		$this->db->delete('file_list$limit, $start');
	}

	public function countAllFiles() 
    {
        return $this->db->count_all("file_list");
    }

	
}
