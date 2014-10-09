<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->view('welcome_message');
    }

    /**
     * Cara routing parameter fungsi dan query string lewat URL
     * pola => {base_url}/{controller}/{function}/{param1}/{param2}/... ?{nama_query1}={isi_query1}&{nama_query2}={isi_query2}&...
     * buka:localhost/xproject/welcome/sample/es/teh/?q1=manis&q2=anget
     * @param type $msg
     */
    public function sample($param1 = "tidak ada", $param2 = "tidak ada") {
        if (isset($_GET['q1'])) {
            $queryString1 = filter_input(INPUT_GET, "q1");
        } else {
            $queryString1 = "tidak ada";
        }
        if (isset($_GET['q2'])) {
            $queryString2 = filter_input(INPUT_GET, "q2");
        } else {
            $queryString2 = "tidak ada";
        }
        echo "<pre>function param 1 :" . $param1
        . "\n<br>function param 2 :" . $param2
        . "\n<br>query string 1   :" . $queryString1
        . "\n<br>query string 2   :" . $queryString2 . "</pre>";
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */