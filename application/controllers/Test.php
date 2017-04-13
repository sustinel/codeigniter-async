<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Test extends CI_Controller {
 
        /**
         * load list modal, library and helpers
         */
         function __Construct(){
           parent::__Construct();
           $this->load->helper(array('form', 'url'));
           $this->load->model('test_model');
           $this->load->library('asynclibrary');
         }
          
        /**
         *  @desc : Function to perform multiple task in background
         *  @param :void
         *  @return : void
         */
         public  function index(){
 
               $url = base_url()."test/sendmail";
               $url1 = base_url()."test/insert";
             
               $param = array('email' => "jagroop@gmail.com" );
               $param1 = array('name' => "Jagroop Singh",
                               'email' => "jagroop@gmail.com" );
 
               $this->mylibrary->do_in_background($url, $param);
               $this->mylibrary->do_in_background($urls, $param1);
             
        }
         
        /**
         *  @desc : Function to send mail
         *  @param :void
         *  @return : void
         */
        public function sendmail(){
 
            $this->load->library('email');
            $user_email  = $_POST['email'];
            $message     = "Testing";
          
            $this->email->from('wolfy@gmail.com', 'Wolfy Singh');
            $this->email->to($user_email);
            $this->email->subject("test");
            $this->email->message($message); 
            $this->email->send();
        }
         
         /**
         *  @desc : Function to call insert() method
         *  of test_model to insert data in database
         *  @param :void
         *  @return : void
         */
       public function insert(){
 
           $email = $this->input->post('email');
           $name = $this->input->post('name');
           $this->test_model->insert($email, $name);
      }
}