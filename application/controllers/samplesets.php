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
        $this->load->model('sample_model');
        $this->load->model('sample_item_model');
        $this->isLoggedIn();   
    }

    public function index()
    {
        $this->global['pageTitle'] = 'Sample Sets List';
        $this->global['samples'] = $this->sample_model->getAllSample();
        $this->global['search']='';
        $this->loadViews("samplesetslist", $this->global, NULL , NULL);
    }

    public function addNewSampleSet()
    {
    	$this->global['pageTitle'] = 'Add New Sample Set';
        $this->loadViews("addnewsampleset", $this->global, NULL , NULL);
    }

    public function editSampleSet($sample_id){
    	$sample = $this->sample_model->getSample($sample_id);
    	//var_dump($sample);
		$this->global['sample'] = $sample;    	
    	$this->global['pageTitle'] = 'Edit Sample Set';
        $this->loadViews("sampleset", $this->global, NULL , NULL);
    }

    public function editSampleSets($sample_id){
    	$sample = $this->sample_model->getSample($sample_id);
		
		for ($i=1; $i <= 18; $i++) { 
			$sample[0]['key_item_'.$i] = $this->sample_item_model->getSampleItem($sample[0]['key_'.$i]);
		}

		$this->global['sample'] = $sample[0];    	
    	$this->global['pageTitle'] = 'Edit Sample Sets';
        $this->loadViews("samplesets", $this->global, NULL , NULL);
    }
    
    public function editMusicFile(){

 		$item_no = $this->input->post('item-no');
        $field = $this->input->post('field-name');
        $sample_no = $this->input->post('sample-no');

     	$uploaddir = './assets/music-sample/';
		$uploadfile = $uploaddir .$sample_no.'_'.$item_no.'_'.$field.'_'. basename($_FILES['musicfile']['name']);
		$file_name = $sample_no.'_'.$item_no.'_'.$field.'_'. basename($_FILES['musicfile']['name']);
		if (move_uploaded_file($_FILES['musicfile']['tmp_name'], $uploadfile)) {
		    $this->sample_item_model->editItemField($item_no,$field,$file_name);
		} else {
		   // echo "Possible file upload attack!\n";
		}
		redirect('editsamplesets/'.$sample_no);

    }


    public function deleteMusicFile(){
    	$item_no = $this->input->post('item-no');
        $field = $this->input->post('field-name');
        $sample_no = $this->input->post('sample-no');
        $this->sample_item_model->editItemField($item_no,$field,"");
        redirect('editsamplesets/'.$sample_no);
    }

    public function deleteSampleSet(){

    	$sample_no = $this->input->post('sample-no');
    	$this->sample_model->deleteSample($sample_no);
    	redirect('sample-sets-list');
    }


    public function searchSample(){
    	$this->global['pageTitle'] = 'Search Sample';
    	$search = $this->input->post('searchText');
        $this->global['samples'] = $this->sample_model->searcSample($search);
        $this->global['search']=$search;
        $this->loadViews("samplesetslist", $this->global, NULL , NULL);
    }
    



    /**
    *	backend part
    */

    public function addNewSampleSet_B(){
    	$data['name'] = $this->input->post('sname');
    	$data['description'] = $this->input->post('sdescription');
    	$data['price']	= $this->input->post('sprice');

    	if($this->input->post('sfree'))
    	{
    		$data['is_free'] = 'yes';
    	}
    	else{
    		$data['is_free'] = 'no';
    	}

    	$result = $this->sample_model->addNewSample($data);

    	if ($result) {
    		$last_row = $this->sample_model->getLastRow();

    		for ($i=1; $i <= 18; $i++)
    		{ 
    			$this->sample_item_model->addEmptyItem();
    			$last_item_row = $this->sample_item_model->getLastRow();
    			$this->sample_model->addKeyItem($last_row[0]['id'],$i,$last_item_row[0]['id']);
    		}

    		//$last_item_row = $this->sample_item_model->getLastRow();

    		redirect('editsamplesets/'.$last_row[0]['id']);
    	}
    }

    public function updateSampleSet_B(){
    	$data['id'] = $this->input->post('sid');
    	$data['name'] = $this->input->post('sname');
    	$data['description'] = $this->input->post('sdescription');
    	$data['price']	= $this->input->post('sprice');
    	if($this->input->post('sfree'))
    	{
    		$data['is_free'] = 'yes';
    	}
    	else{
    		$data['is_free'] = 'no';
    	}

    	$this->sample_model->updateSample($data);

    	redirect('editsampleset/'.$data['id']);
    }

}