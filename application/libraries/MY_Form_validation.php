<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
    private $ci;

    public function __construct($config = array())
    {

        parent::__construct($config);
        $this->ci =& get_instance();

    }

    public function cekname()
    {
        $username = $this->ci->input->post('username');
        $check = $this->ci->user->cek_username($username);
        if ($check > 0) {
            $this->ci->form_validation->set_message('cekname', 'Username sudah digunakan');
            return FALSE;
        } else return TRUE;
    }
	
	

    public function check_password()
    {
        $password = md5($this->ci->input->post('pass_old'));
        $check = $this->ci->user->check_password($password);
        if ($check < 1) {
            $this->ci->form_validation->set_message('check_password', 'Password lama salah');
            return FALSE;
        } else return TRUE;
    }

    /**
     * Check recaptcha
     * @return boolean
     */
    public function is_recaptcha_valid()
    {

        $response = recaptcha_check_answer(
            GOOGLE_RECAPTCHA_PRIVATE_KEY,
            $_SERVER["REMOTE_ADDR"],
            $this->ci->input->post("recaptcha_challenge_field"),
            $this->ci->input->post("recaptcha_response_field")
        );

        if (!$response->is_valid) {
//			$this->ci->form_validation->set_message("is_recaptcha_valid", $response->error);
            $this->ci->form_validation->set_message("is_recaptcha_valid", "Invalid captcha");
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

?>