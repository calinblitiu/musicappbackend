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
        $this->load->model('sync4_item_model');
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
         
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

    public function editSync4($sync4_id)
    {
        $this->isLoggedIn();
        $sync4 = $this->sync4_list_model->getSync4($sync4_id);
        $this->global['sample'] = $sync4;
        $this->global['pageTitle'] = 'Edit Sync4';
        $this->loadViews("sync4/sync4-edit", $this->global, NULL , NULL);
    }

    public function addNewSync4_B(){
        $data['name'] = $this->input->post('sname');
        $data['description'] = $this->input->post('sdescription');
        $data['price']  = $this->input->post('sprice');
        $data['bpm'] = $this->input->post('bpm');

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

        for ($i=1; $i <= 5; $i++)
        {
            $this->sync4_item_model->addEmptyCell();
            $last_item_row = $this->sync4_item_model->getLastRow();
            $this->sync4_list_model->addKeyItem($last_row[0]['id'],$i,$last_item_row[0]['id']);
        }
        redirect('index.php/editsync4/'.$last_row[0]['id']);

    }


    public function editSync4s($sample_id){
        $this->isLoggedIn();
        $sample = $this->sync4_list_model->getSync4($sample_id);

        for ($i=1; $i <= 5; $i++) {
            $sample[0]['key_item_'.$i] = $this->sync4_item_model->getCell($sample[0]['music_'.$i]);
        }

        $this->global['sample'] = $sample[0];
        $this->global['pageTitle'] = 'Edit Sample Sets';
        $this->loadViews("sync4/sync4-cell", $this->global, NULL , NULL);
    }


    public function musicUpload()
    {
        $sync4_cell_id = $this->input->post('sync4-cell-id');
        $sync4_music_no = $this->input->post('sync4-music-no');
        $sync4_id = $this->input->post('sync4-id');
        $sync4_cell_no = $this->input->post('sync4-cell-no');
        $upload_file_name = "";

        if($_FILES['sync4-music-file']['name']){

            $uploaddir = './assets/sync4-musicfiles/';
            $path = $_FILES['sync4-music-file']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $dest_filename = 'sync4_'.$sync4_id.'_'.$sync4_cell_no.'_'.$this->player_kinds_array[$sync4_music_no-1] . '.' . $ext;
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

        $this->sync4_item_model->updateMusicFile($sync4_cell_id,$sync4_music_no,$upload_file_name);
        redirect('index.php/editsync4/'.$sync4_id);
    }

    public function updateSync4_B()
    {
        $data['id'] = $this->input->post('sid');
        $data['name'] = $this->input->post('sname');
        $data['description'] = $this->input->post('sdescription');
        $data['price']  = $this->input->post('sprice');
        $data['bpm'] = $this->input->post('bpm');
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

        redirect('index.php/editsync4-id/'.$data['id']);
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

    public function getSync4($id)
    {
        $sync = $this->sync4_list_model->getSync4($id);

        if(count($sync)>0)
        {
            $data['success'] = 0;
            $data['id'] = $sync[0]['id'];
            $data['name'] = $sync[0]['name'];
            $data['description'] = $sync[0]['description'];
            $data['is_free'] = $sync[0]['is_free'];
            $data['price'] = $sync[0]['price'];
            $data['thumb'] = $sync[0]['thumb'] == ""? base_url()."assets/thumbimages/no_img.png":base_url().'assets/thumbimages/'.$sync[0]['thumb'];
            $data['bpm'] = $sync[0]['bpm'];

            $items = array();
            for($i = 1; $i <=5; $i++ )
            {
                if($sync[0]['music_'.$i] == "" || $sync[0]['music_'.$i] == null)
                {
                    $items['music_'.$i] = "";
                }
                else
                {
                    $temp_item = $this->sync4_item_model->getCell($sync[0]['music_'.$i]);
                    if(count($temp_item) == 0 )
                    {
                        $items['music_'.$i] = "";
                    }
                    else
                    {
                        $temp['id'] = $temp_item[0]['id'];
                        $temp['name'] = $temp_item[0]['name'];
                        for($j = 1; $j <= 7; $j++)
                        {
                            $temp[$this->player_kinds_array[$j-1]] = $temp_item[0]['player_'.$j] == ""? "":base_url().'assets/sync4-musicfiles/'.$temp_item[0]['player_'.$j];
                        }

                        $items['music_'.$i] = $temp;
                    }
                }
            }

            $data['items'] = $items;

            echo json_encode($data);
            exit();
        }

        $data['success'] = 1;
        $data['message'] = 'There is no any sample';
        echo json_encode($data);
        exit();
    }

    public function deleteSync4()
    {
        $this->isLoggedIn();
        $sync4_id = $this->input->post('sync4-id');
        $this->sync4_list_model->deleteSync4($sync4_id);
        redirect('index.php/sync4-lists');
    }

    public function deleteMusicFile()
    {
        $this->isLoggedIn();
        $sync4_cell_id = $this->input->post('sync4-cell-id');
        $sync4_cell_no = $this->input->post('sync4-cell-no');
        $sync4_id = $this->input->post('sync4-id');
        $this->sync4_item_model->deleteMusicFile($sync4_cell_id, $sync4_cell_no);

        redirect('index.php/editsync4/'.$sync4_id);
    }

    public function editName()
    {
        $this->isLoggedIn();
        $sync4_cell_id = $this->input->post('sync4-cell-id');
        $sync4_cell_name = $this->input->post('sync4-cell-name');
        $sync4_id = $this->input->post('sync4-id');
        $this->sync4_item_model->editName($sync4_cell_id, $sync4_cell_name);

        redirect('index.php/editsync4/'.$sync4_id);
    }

}