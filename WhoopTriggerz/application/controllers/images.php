<?php
/**
 * Created by PhpStorm.
 * User: CStar
 * Date: 1/20/2018
 * Time: 4:38 AM
 */
if(!defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Images extends CI_Controller
{

    function listImages() {
        $sql = 'SELECT * FROM User_Images ORDER BY index_num ';
        $result = mysql_query($sql);
        $count = mysql_num_rows($result);

        // store the result in array form
        $result_set = array();
        if ($count > 0) {
            $i = 0;
            $rows = array();
            while ($row = mysql_fetch_array($result)) {
                if ($i == 0) {
                    $rows[0] = $row;
                    $i++;
                    continue;
                }
                $rows[$row['index_num']] = $row;
                $i++;
            }

            $j = 0;
            $next = 0;
            while ($j < count($rows)) {
                if ($j == 0) {
                    $result_set[] = $rows[$j];
                    $next = $rows[$j]['id'];
                    $j++;
                    continue;
                }

                $result_set[] = $rows[$next];
                $next = $rows[$next]['id'];
                $j++;
            }

            $status = "success";
            $msg = "Success!";
        } else {
            $status = "failed";
            $msg = "Images is not existing.";
        }

        mysql_close();
        // set the header to JSON
        header('Content-Type: application/json');

        echo json_encode(array('status' => $status, 'msg' => $msg, 'result' => $result_set));
    }

    function deleteImage($imageId) {
        $image = "SELECT * FROM  User_Images WHERE id = $imageId";
        $image = mysql_fetch_array(mysql_query($image));

        $delete_row = "DELETE FROM User_Images WHERE id = $imageId";
        $result = mysql_query($delete_row);

        if ($result) {
            $after_id = $image['id'];
            $after_index = $image['index_num'];
            $update_after = "UPDATE User_Images SET index_num = $after_index WHERE index_num = $after_id";
            $update_result = mysql_query($update_after);

            if ($update_result) {
                echo json_encode(array('status' => 'success', 'msg' => "Image #$after_id was removed"));
            }
        } else {
            echo json_encode(array('status' => 'failed', 'msg' => "failed"));
        }
    }
}