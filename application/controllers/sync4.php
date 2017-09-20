<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Sync4 extends BaseController
{
    /**
     * This is default constructor of the class
     */

    //public $key_array = array('C','Db','D','Eb','E','F','Gb','G','Ab','A','Bb','B');
    //public $player_kinds_array = array('drum','bass','piano','rhodes','organ','synth','guitar');

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('sample_model');
        $this->load->model('sample_item_model');
        $this->load->model('music_cell_model');
        $this->load->model('devicetoken_model');
        $this->load->model('paidstatus_model');
        $this->load->model('sync4_list_model');
         
    }

    public function index()
    {
    	$this->isLoggedIn();  
        $this->global['pageTitle'] = 'Triggerz Sync4';
        $this->global['samples'] = $this->sync4_list_model->getAllSync4List();
        $this->global['search']='';
        $this->loadViews("sync4/sync4-lists", $this->global, NULL , NULL);
    }

    public function addNewSync4()
    {
        $this->isLoggedIn();  
        $this->global['pageTitle'] = 'Add New Sync4';
        $this->loadViews("sync4/addnewsync4", $this->global, NULL , NULL);
    }


    public function editSync4($sync4_id){
        $this->isLoggedIn();  
        $sync4 = $this->sync4_list_model->getSync4($sync4_id);
        $this->global['sample'] = $sync4;      
        $this->global['pageTitle'] = 'Edit Sync4';
        $this->loadViews("sync4/editsync4", $this->global, NULL , NULL);
    }



    public function addNewSync4_B(){
        $data['name'] = $this->input->post('sname');
        $data['description'] = $this->input->post('sdescription');
        $data['price']  = $this->input->post('sprice');

        if($this->input->post('sfree'))
        {
            $data['is_free'] = 'yes';
        }
        else{
            $data['is_free'] = 'no';
        }
        $data['thumb'] = "";
        $uploaddir = './assets/thumbimages/';
        $path = $_FILES['thumbimg']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $dest_filename = md5(uniqid(rand(), true)) . '.' . $ext;
        $uploadfile = $uploaddir .$dest_filename;
        $file_name = $dest_filename;
        if (move_uploaded_file($_FILES['thumbimg']['tmp_name'], $uploadfile)) {
            //$this->sample_item_model->editItemField($item_no,$field,$file_name);
            $data['thumb'] = $file_name;
        } else {
           // echo "Possible file upload attack!\n";
        }


        $result = $this->sync4_list_model->addNewSync4($data);
        $last_row = $this->sync4_list_model->getLastRow();
        redirect('index.php/editsync4/'.$last_row[0]['id']);

        //redirect('index.php/addnewsync4');
        
    }

    public function updateSync4_B(){
        $data['id'] = $this->input->post('sid');
        $data['name'] = $this->input->post('sname');
        $data['description'] = $this->input->post('sdescription');
        $data['price']  = $this->input->post('sprice');
        if($this->input->post('sfree'))
        {
            $data['is_free'] = 'yes';
        }
        else{
            $data['is_free'] = 'no';
        }
        if($_FILES['thumbimg']['name']){
            $data['thumb'] = "";
            $uploaddir = './assets/thumbimages/';
            $path = $_FILES['thumbimg']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $dest_filename = md5(uniqid(rand(), true)) . '.' . $ext;
            $uploadfile = $uploaddir .$dest_filename;
            $file_name = $dest_filename;
            if (move_uploaded_file($_FILES['thumbimg']['tmp_name'], $uploadfile)) {
                //$this->sample_item_model->editItemField($item_no,$field,$file_name);
                $data['thumb'] = $file_name;
            } else {
               // echo "Possible file upload attack!\n";
            }
         }

        $this->sync4_list_model->updateSync4($data);

        redirect('index.php/editsync4/'.$data['id']);
    }

    public function musicUpload()
    {
        $sync4_id = $this->input->post('sync4-id');
        $sync4_music_no = $this->input->post('sync4-music-no');
        $upload_file_name = "";

        if($_FILES['sync4-music-file']['name']){
           
            $uploaddir = './assets/sync4-musicfiles/';
            $path = $_FILES['sync4-music-file']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $dest_filename = "sync4_". $sync4_id."_" . $sync4_music_no . '.' . $ext;
            $uploadfile = $uploaddir .$dest_filename;
            $file_name = $dest_filename;
            if (move_uploaded_file($_FILES['sync4-music-file']['tmp_name'], $uploadfile)) {
                //$this->sample_item_model->editItemField($item_no,$field,$file_name);
                $upload_file_name = $file_name;
            } else {
               // echo "Possible file upload attack!\n";
               redirect('index.php/editsync4/'.$sync4_id);
            }

         }

         $this->sync4_list_model->updateMusicFile($sync4_id,$sync4_music_no,$upload_file_name);
         redirect('index.php/editsync4/'.$sync4_id);
    }


    public function getSync4List()
    {
        $result = $this->sync4_list_model->getAllSync4List();
        
        $data = array();
        if(count($result)>0)
        {
            $data['success'] = 0;
            $data['count']  =   count($result);
            //$data['items'] = $result;
            $items = array();
            for ($i=0; $i < count($result) ; $i++) { 
                $temp['id'] = $result[$i]['id'];
                $temp['name'] = $result[$i]['name'];
                $temp['description'] = $result[$i]['description'];
                $temp['is_free'] = $result[$i]['is_free'];
                $temp['price'] = $result[$i]['price'];
                $temp['thumb'] = $result[$i]['thumb'] == ""? base_url()."assets/thumbimages/no_img.png":base_url().'assets/thumbimages/'.$result[$i]['thumb'];
                $temp['music_1'] = $result[$i]['music_1'] == ""? "":base_url().'assets/sync4-musicfiles/'.$result[$i]['music_1'];
                $temp['music_2'] = $result[$i]['music_2'] == ""? "":base_url().'assets/sync4-musicfiles/'.$result[$i]['music_2'];
                $temp['music_3'] = $result[$i]['music_3'] == ""? "":base_url().'assets/sync4-musicfiles/'.$result[$i]['music_3'];
                $temp['music_4'] = $result[$i]['music_4'] == ""? "":base_url().'assets/sync4-musicfiles/'.$result[$i]['music_4'];
                $temp['bpm'] = $result[$i]['bpm'];
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

  

}