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

    public $key_array = array('C','Db','D','Eb','E','F','Gb','G','Ab','A','Bb','B');
    public $player_kinds_array = array('drum','bass','piano','rhodes','organ','synth','guitar');

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('sample_model');
        $this->load->model('sample_item_model');
        $this->load->model('music_cell_model');
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
        $sample_item = $this->sample_item_model->getSampleItem($item_no);
        $cur_cell=array();
        if($sample_item[0][$field] == NULL || $sample_item[0][$field] =="" || $sample_item[0][$field] =="0")
        {
        	$this->music_cell_model->addEmptyCell();
        	$cur_cell = $this->music_cell_model->getLastRow();
        	$this->sample_item_model->editItemField($item_no,$field,$cur_cell[0]['id']);
        }
        else{
        	$cur_cell = $this->music_cell_model->getCell($sample_item[0][$field]);
        		
        }

		
     	$uploaddir = './assets/music-sample/';
     	$cell_data = array();
     	for($i = 1;$i <= 7; $i++)
     	{
     		$uploadfile = $uploaddir .$sample_no.'_'.$item_no.'_'.$field.'_'.$cur_cell[0]['id'].'_'.$i.'_'. basename($_FILES['player_'.$i]['name']);
     		$file_name = $sample_no.'_'.$item_no.'_'.$field.'_'.$cur_cell[0]['id'].'_'.$i.'_'. basename($_FILES['player_'.$i]['name']);
     		if (move_uploaded_file($_FILES['player_'.$i]['tmp_name'], $uploadfile)) {
		    	//$this->sample_item_model->editItemField($item_no,$field,$file_name);
		    	$cell_data['player_'.$i] = $file_name;
			} else {
			   // echo "Possible file upload attack!\n";
			}
     	}

     	$this->music_cell_model->updateCell($cur_cell[0]['id'],$cell_data);

		//$uploadfile = $uploaddir .$sample_no.'_'.$item_no.'_'.$field.'_'. basename($_FILES['musicfile']['name']);
		// $file_name = $sample_no.'_'.$item_no.'_'.$field.'_'. basename($_FILES['musicfile']['name']);
		// if (move_uploaded_file($_FILES['musicfile']['tmp_name'], $uploadfile)) {
		//     $this->sample_item_model->editItemField($item_no,$field,$file_name);
		// } else {
		//    // echo "Possible file upload attack!\n";
		// }
		redirect('editsamplesets/'.$sample_no);

    }


    public function deleteMusicFile(){
    	$item_no = $this->input->post('item-no');
        $field = $this->input->post('field-name');
        $sample_no = $this->input->post('sample-no');
        $this->sample_item_model->editItemField($item_no,$field,"");
        redirect('editsamplesets/'.$sample_no);
    }

    public function deletMusicOneFile()
    {
    	$item_no = $this->input->post('item_no');
        $field = $this->input->post('field_name');
        $sample_no = $this->input->post('sample_no');
        $player_no = $this->input->post('player_no');
        $sample_item = $this->sample_item_model->getSampleItem($item_no);
        $music_cell = $this->music_cell_model->getCell($sample_item[0][$field]);
        $data['player_'.$player_no] = '';
        $this->music_cell_model->updateCell($music_cell[0]['id'],$data);
		$data['success'] = 0;
    	
        echo json_encode($data);

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
    			//$item_upadate_data = array();
    			// foreach($this->key_array as $key_item) { 
    			// 	$this->music_cell_model->addEmptyCell();
    			// 	$last_cell = $this->music_cell_model->getLastRow();
    			// 	$item_upadate_data[$key_item] = $last_cell[0]['id'];
    			// }
    			// $this->sample_item_model->updateItem($last_item_row[0]['id'],$item_upadate_data);
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


    public function getSetList()
    {
    	$result = $this->sample_model->getAllSample();
    	
    	$data = array();
    	if(count($result)>0)
    	{
    		$data['success'] = 0;
    		$data['count']  =	count($result);
    		//$data['items'] = $result;
    		$items = array();
    		for ($i=0; $i < count($result) ; $i++) { 
    			$temp['id'] = $result[$i]['id'];
    			$temp['name'] = $result[$i]['name'];
    			$temp['description'] = $result[$i]['description'];
    			$temp['is_free'] = $result[$i]['is_free'];
    			$temp['price'] = $result[$i]['price'];
    			$items[] = $temp;
    		}
    		$data['items'] = $items;
    		echo json_encode($data);
    		exit();
    	}
    	else{
    		$data['success'] = 1;
    		$data['message'] = 'There is no any sample';
    		echo json_encode($data);
    		exit();
    	}
    }

    public function getSet($sample_id,$key){
    	$sample = $this->sample_model->getSample($sample_id);
		$data = array();

		if (count($sample)>0)
		{
			$data['success'] = 0;
			$data['id'] = $sample[0]['id'];
			$data['name'] = $sample[0]['name'];
			$data['description'] = $sample[0]['description'];
			$data['is_free'] = $sample[0]['is_free'];
			$data['key'] = $key;
			$items = array();
			for ($i=1; $i <= 18; $i++) { 
				$temp = $this->sample_item_model->getSampleItem($sample[0]['key_'.$i]);
				$items['key_'.$i] = $temp[0][$key];
				if($items['key_'.$i] != null){
					//$items['key_'.$i] = base_url().'assets/music-sample/'.$items['key_'.$i];
					$cell = $this->music_cell_model->getCell($items['key_'.$i]);
					if (count($cell)>0) {
						
						$temp = array();
						for($j = 1;$j<=7;$j++)
						{

							if($cell[0]['player_'.$j] == NULL)
							{
								//$items['key_'.$i]['player_'.$j] = '';
								$temp[$this->player_kinds_array[$j-1]] = '';
							}
							else{
								//$items['key_'.$i]['player_'.$j] = base_url().'assets/music-sample/'.$cell[0]["player_".$j];
								$temp[$this->player_kinds_array[$j-1]] = base_url().'assets/music-sample/'.$cell[0]["player_".$j];
							}
						}
						$items['key_'.$i] = $temp;

					}
					else{
						$items['key_'.$i] = '';
					}

				}
				else{
					$items['key_'.$i] = '';
				}

			}
			$data['items'] = $items;
			echo json_encode($data);
			exit();
		}
		else{
			$data['success'] = 1;
    		$data['message'] = 'There is no any sample';
    		echo json_encode($data);
    		exit();
		}
		
    }

    public function getMusicFile($sample_id,$key,$num){
    	$sample = $this->sample_model->getSample($sample_id);
    	if(count($sample)>0)
    	{
    		$item_id = $sample[0]['key_'.$num];
    		$item = $this->sample_item_model->getSampleItem($item_id);
    		$url = $item[0][$key];
    		if($url == NULL)
    		{
    			$data['success'] = 1;
    			$data['message'] = 'This item is empty!';
    			echo json_encode($data);
    			exit();
    		}
    		else{
    			$data['success'] = 0;
    			//$data['url'] = base_url().'assets/music-sample/'.$url;
    			$cell = $this->music_cell_model->getCell($url);
    			if(count($cell)>0)
    			{
    				$data['id'] = $url;
    				$temp = array();
    				for ($i=1; $i <= 7; $i++) { 
    					$temp[$this->player_kinds_array[$i-1]] = base_url().'assets/music-sample/'.$cell[0]['player_'.$i];
    				}
    				$data['items'] = $temp;
    			}
    			else{
    				$data['items'] = '';
    			}
    			echo json_encode($data);
    			exit();
    		}
    	}
    	else{
    		$data['success'] = 1;
    		$data['message'] = 'There is no any sample';
    		echo json_encode($data);
    		exit();
    	}
    }

    public function updateOrder()
    {
    	$sample_id = $this->input->post('sample_id');
    	$order = $this->input->post('order');
    	$type = $this->input->post('type');
    	$this->sample_model->updateOrder($sample_id,$order,$type);
    	$data = array(
    		'success' => 0,
    		'message' => 'update successed'
    	);
    	echo json_encode($data);
    }

    public function getOrder($sample_id,$type)
    {
    	$sample = $this->sample_model->getSample($sample_id);
    	if(count($sample)>0)
    	{
			$data['success'] = 0;
			$data['type'] = $type;
			$data['order'] = $sample[0][$type];
			echo json_encode($data);
    	}
    	else{
    		$data['success'] = 1;
    		$data['message'] = 'There is no any sample';
    		echo json_encode($data);
    		exit();
    	}
    }

    public function getMusicFiles($cell_id)
    {
    	$cell = $this->music_cell_model->getCell($cell_id);
    	if(count($cell)>0){
    		
    		$data = $cell[0];
    		$data['success'] = 0;
    		//var_dump($cell);
    		for($i=1;$i<=7;$i++)
    		{
    			$data['player_'.$i] = base_url().'assets/music-sample/'.$cell[0]['player_'.$i];
    			if($cell[0]['player_'.$i] == NULL)
    			{
    				$data['player_'.$i] = "";
    			}
    		}
    		echo json_encode($data);
    		exit();
    	}
    	else{
			$data['success'] = 1;
    		$data['message'] = 'There is no any sample';
    		echo json_encode($data);
    		exit();
    	}
    }

    public function sendNotification()
    {
	    $ch = curl_init("https://fcm.googleapis.com/fcm/send");
	    //The device token.
	    $token = ""; //token here
	    //Title of the Notification.
	    $title = "Title Notification";
	    //Body of the Notification.
	    $body = "This is the body show Notification";
	    //Creating the notification array.
	    $notification = array('title' =>$title , 'text' => $body);
	    //This array contains, the token and the notification. The 'to' attribute stores the token.
	    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
	    //Generating JSON encoded string form the above array.
	    $json = json_encode($arrayToSend);
	    //Setup headers:
	    $headers = array();
	    $headers[] = 'Content-Type: application/json';
	    $headers[] = 'Authorization: key= XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; // key here
	    //Setup curl, add headers and post parameters.
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);       
	    //Send the request
	    $response = curl_exec($ch);
	    //Close request
	    curl_close($ch);
	    return $response;
    }

}