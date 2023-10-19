<?php

class User_model extends CI_model
{
    function login($username)
    {
        $this->db->select('*');
        $this->db->from('clinical_admin_master');
        $this->db->where('adminName', $username);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Returns a single row
        } else {
            return false;
        }
    }


    function loginWithHealthWorkerCredentials($username)
    {
        $this->db->select('healthworkermaster.*, (SELECT COUNT(*) FROM child_partial_registration INNER JOIN healthworkermaster ON child_partial_registration.healthworker_id = healthworkermaster.hw_id) as totalRecord');
        $this->db->from('healthworkermaster');
        $this->db->where('hw_name', $username);

        $result = $this->db->get();


        if ($result->num_rows() > 0) {
            return $result->row_array(); // Returns a single row
        } else {
            return false;
        }
    }


    function authorised()
    {
        $user = $this->session->userdata('user');
        if (!empty($user)) {
            return true;
        } else {
            return false;
        }
    }

    function childData()
    {

        $tbl_name1 = "child_partial_registration";
        $tbl_name2 = "screening_result";
        $tbl_name3 = "healthworkermaster";

        $this->db->select("$tbl_name1.*, $tbl_name2.cp_approved, $tbl_name2.vi_approved, $tbl_name2.hi_approved, $tbl_name2.id_approved, $tbl_name2.ep_approved, $tbl_name2.asd_approved, $tbl_name3.hw_name");
        $this->db->from($tbl_name1);
        $this->db->join($tbl_name2, "$tbl_name1.child_id = $tbl_name2.child_id");
        $this->db->join($tbl_name3, "$tbl_name3.hw_id = $tbl_name1.healthworker_id");
        $this->db->where("$tbl_name1.status", 1);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        } else {
            $result = array();
        }
        return $result;
    }


    function pendingSupervisionChildData()
    {

        $tbl_name = "child_partial_registration";
        $tbl_name1 = "healthworkermaster";
        $status = "0";
        $this->db->select("chm.*, hwm.hw_name");
        $this->db->from($tbl_name . " chm");
        $this->db->join($tbl_name1 . " hwm", "hwm.hw_id = chm.healthworker_id", "inner");
        $this->db->where("chm.status", $status);
        $this->db->order_by("chm.child_id", "desc");

        $query = $this->db->get();

        // You can now execute the query and retrieve the result
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
        } else {
            $result = array();
        }
        return $result;
    }


    public function getRegion()
    {
        $this->db->select('*');
        $this->db->from('region');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Returns a single row
        } else {
            return false;
        }
    }



    // function getScreeningDetails($child_id)
    // {

    //     $this->db->select('chpr.child_name, chpr.dateofbirth, scr.*');
    //     $this->db->from('child_partial_registration chpr');
    //     $this->db->join('screening_result scr', 'chpr.child_id = scr.child_id', 'inner');
    //     $this->db->where('chpr.child_id', $child_id);

    //     $query = $this->db->get();

    //     if ($query->num_rows() > 0) {
    //         $result = $query->result_array();
    //     } else {
    //         $result = array();
    //     }
    //     return $result;
    // }


    public function getScreeningDetails($child_id)
    {
        $this->db->select('chpr.child_name, chpr.dateofbirth, scr.*');
        $this->db->from('child_partial_registration chpr');
        $this->db->join('screening_result scr', 'chpr.child_id = scr.child_id', 'inner');
        $this->db->where('chpr.child_id', $child_id);

        $query = $this->db->get();

        // $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return a single row as an array
        } else {
            return array(); // Return an empty array if no results found
        }
    }

    public function createHealthWorker($formArray)
    {
        $this->db->insert('healthworkermaster', $formArray);
    }

    public function submitClinicalAdminApproval($childId, $problems)
    {
        $cp = 0;
        $hearingImpairment = 0;
        $visualImpairment = 0;
        $intellectualDisability = 0;
        $epilepsy = 0;
        $ASD = 0;

        if (isset($problems['CP'])) {
            $cp = $problems['CP'];
        } else {
            $cp = 0;
        }

        if (isset($problems['VI'])) {
            $visualImpairment = $problems['VI'];
        } else {
            $visualImpairment = 0;
        }

        if (isset($problems['HI'])) {
            $hearingImpairment = $problems['HI'];
        } else {
            $hearingImpairment = 0;
        }

        if (isset($problems['ID'])) {
            $intellectualDisability = $problems['ID'];
        } else {
            $intellectualDisability = 0;
        }

        if (isset($problems['EP'])) {
            $epilepsy = $problems['EP'];
        } else {
            $epilepsy = 0;
        }

        if (isset($problems['ASD'])) {
            $ASD = $problems['ASD'];
        } else {
            $ASD = 0;
        }



        $data = array(
            'cp_approved' => $cp,
            'vi_approved' => $visualImpairment,
            'hi_approved' => $hearingImpairment,
            'id_approved' => $intellectualDisability,
            'ep_approved' => $epilepsy,
            'asd_approved' => $ASD
        );
        $this->db->where('child_id', $childId);

        $this->db->update('screening_result', $data);


        $statusData = array(
            'status' => 1 // Update 'status' column in 'child_partial_registration' table
        );
        $this->db->where('child_id', $childId);
        $this->db->update('child_partial_registration', $statusData);

        // Check if the update was successful
        if ($this->db->affected_rows() > 0) {
            return true; // Update successful
        } else {
            return false; // Update failed
        }
    }
}
