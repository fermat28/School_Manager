<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * User_model class.
 *
 * @extends CI_Model
 */
class Filiere extends Model {

	/**
	 * __construct function.
	 *
	 */
	/**
	 * create_table function.
	 */
	public function save_tab($table, $data = array()){
        if(sizeof($data) == 0) {
            return false;
        }

        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    /**
	 * update_table function.
	 */
    public function update_tab($table, $cond = array(), $data  = array()) {
        if(sizeof($data) == 0) {
            return false;
        }

		$this->db->where($cond);
		$this->db->update($table, $data);
		if($this->db->affected_rows() > 0){
			return true;
		} else {
			return false;
		}
    }

    /**
	 * delete_table function.
	 */
    public function delete_tab($table, $data = array()){
        if(sizeof($data) == 0) {
            return false;
        }

        $this->db->delete($table, $data);
    }

    /**
	 * get_table function.
	 */
	public function get_tab($table, $data = array()) {
        if(sizeof($data) == 0) {
            $query = $this->db->select('*')
					->from($table)
					->get();
			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
        }
		return $this->db->select('*')
					->from($table)
					->where($data)
					->get()
					->result();
	}

    public function get_tab_desc($table, $data = array(), $order = '') {
            if(sizeof($data) == 0) {
                $query = $this->db->select('*')
                                    ->from($table)
                                    ->order_by($order, 'desc')
                                    ->get();
                if($query->num_rows() > 0) {
                        return $query->result();
                } else {
                        return false;
                }
            }
            if($order){
                return $this->db->select('*')
                                ->from($table)
                                ->where($data)
                                ->order_by($order, 'desc')
                                ->get()
                                ->result();
            }else{
                return $this->db->select('*')
                                ->from($table)
                                ->where($data)
                                ->get()
                                ->result();
            }

    }

    public function get_tab_asc($table, $data = array(), $order = '') {
            if(sizeof($data) == 0) {
                $query = $this->db->select('*')
                                    ->from($table)
                                    ->order_by($order, 'asc')
                                    ->get();
                if($query->num_rows() > 0) {
                        return $query->result();
                } else {
                        return false;
                }
            }
            if($order){
                return $this->db->select('*')
                                ->from($table)
                                ->where($data)
                                ->order_by($order, 'asc')
                                ->get()
                                ->result();
            }else{
                return $this->db->select('*')
                                ->from($table)
                                ->where($data)
                                ->get()
                                ->result();
            }

    }

    /**
    * get_table function.
    */
    public function exist_in_tab($table, $data = array()) {
        if(sizeof($data) == 0) {
            return false;
        }

        $query = $this->db->select('*')
                            ->from($table)
                            ->where($data)
                            ->get();
        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * get_table function.
     */
    public function count_tab($table, $data = array()) {
        if(sizeof($data) == 0) {
            return 1;
        }

        $query = $this->db->select('*')
            ->from($table)
            ->where($data)
            ->get();
        return $query->num_rows()+1;
    }
}
