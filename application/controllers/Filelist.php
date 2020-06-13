<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filelist extends CI_Controller {

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
	public function index()
	{
		$count = $this->Filelist_model->countAllFiles();

		$config['base_url'] = 'http://localhost/Test/index.php/Filelist/index';
		$config['total_rows'] = $count;
		$config['per_page'] = 2;
		//echo $this->uri->segment(3); exit;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		if ($config['total_rows'] > 0) 
        {
            // get current page records
            $params["files"] = $this->Filelist_model->fetchAllFiles($config['per_page'], $start_index);
             
            $config['base_url'] = 'http://localhost/Test/index.php/Filelist/index';
            $config['total_rows'] = $count;
            $config['per_page'] = 2;
            $config["uri_segment"] = 3;
             
            $this->pagination->initialize($config);
             
            // build paging links
            $params["links"] = $this->pagination->create_links();
        }

		$this->pagination->initialize($config);
		
		$this->load->view('file_list', $params);
	}

	public function add(){
		$this->load->view('uploadfile');

	}

	public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|txt|doc|docx|pdf|jpeg';
                $config['max_size']             = 100000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('fileupload'))
                {
                        $error['message'] = array('error' => $this->upload->display_errors());
                        //$this->load->view('file_list', $error);
                        print_r($error);
                        //$this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $this->Filelist_model->addNewFile($data);
                        $error['message'] = "Uploaded successfully";
                        //$this->load->view('file_list', $error);
                }
                redirect('Filelist');
        }

		public function deletefile() {
			$id = $this->uri->segment(3);
			$this->Filelist_model->deletefile($id);
			redirect('Filelist');
		}
}
