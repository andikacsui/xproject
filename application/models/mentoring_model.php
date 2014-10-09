<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Specific model function for product which can't be handled by generic model.
 * @copyright PT. Badr Interactive (c) 2014
 * @author Ryan Riandi
 */
class mentoring_Model extends CI_Model {
	
	
	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->load->database();
		
	}

    /**
     * Get related item of given ..........
     * @param string .............
     * @param string .............
     * @return mixed all related item
     */
    public function get_related_item($xxx = "", $xxx="") {

        $query = ;
        $result_rows = $this->db->query($query);
        $result = $result_rows->result_array();

        return $result;
    }

}