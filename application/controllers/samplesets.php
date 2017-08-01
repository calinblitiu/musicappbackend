<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class SampleSets extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();   
    }

    public function index()
    {
        $this->global['pageTitle'] = 'Sample Sets List';
        
        $this->loadViews("samplesetslist", $this->global, NULL , NULL);
    }

    public function addNewSampleSet()
    {
    	$this->global['pageTitle'] = 'Add New Sample Set';
        
        $this->loadViews("addnewsampleset", $this->global, NULL , NULL);
    }
    
}