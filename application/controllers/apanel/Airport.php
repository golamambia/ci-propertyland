<?php
ob_start();
class Airport extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
        //****************************backtrace prevent*** START HERE*************************
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
        $this->load->library('form_validation');
        $this->load->library("PhpMailerLib");
        $this->load->model('General_model');
        $this->load->model('Country_model');
        //$this->load->model('Staff_model');
        $this->load->helper('url');
        $this->load->helper('string');
        //$this->load->helper('custom');
        if(!$this->session->userdata('is_logged_in')==1)
        {
            redirect('apanel', 'refresh');
        }

        //Admin Access
        
    }

	public function airport_code($offset=0)

    {
     //-------------- pagination event ----------------//


      $limit=10;

      $data['airport_code_list']=$this->Country_model->airport_code_list($limit,$offset);

      $total_rows=$data['total']=$this->Country_model->countall_airport_code_data();

        $config["total_rows"]=$total_rows;
        $config["per_page"]=$limit;
        $config["uri_segment"]=4;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tagl_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tagl_close'] = '</a></li>';

        $config['attributes'] = array('class' => 'page-link');

        

      if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
      //$config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

      if(count($_GET) > 0){
        $config['first_url'] = site_url("apanel/airport/airport_code".'?'.http_build_query($_GET));
      }

      $config["base_url"]=site_url("apanel/airport/airport_code");



      //$config['base_url'] = base_url('index.php/Event');

      $this->load->library('pagination');

      $this->pagination->initialize($config);

      $data['page_link']=$this->pagination->create_links();       

        $data['title']="airport_code";

        $this->load->view('apanel/header',$data);

        $this->load->view('apanel/airport_list');

        $this->load->view('apanel/footer');

    }




        public function airport_edit($id){

        $this->form_validation->set_rules('airport_name', 'Name', 'required');

        if ($this->form_validation->run() == FALSE) 

        {

            $this->session->set_flashdata('error', 'Data  update failed');

           redirect('apanel/airport/airport_code/'); 

           

        }else{

            //$id=$this->input->post('id');

            $datalist = array( 

                'name'      => $this->input->post('airport_name'),

                'iata_code'      => $this->input->post('airport_code')

            );

        $query= $this->General_model->show_data_id('airport_code',$id,'id','update',$datalist);

    $this->session->set_flashdata('message', 'Data successfully Updated');

redirect('apanel/airport/airport_code/'); 

        } 

    }


	
    
    
}

