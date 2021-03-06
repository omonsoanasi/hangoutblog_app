<?php
	class Category_m extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_categories(){
		$this->db->order_by('cat_name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

		public function create_category(){
			$data = array(
				'cat_name' => $this->input->post('cat_name')
			);

			return $this->db->insert('categories', $data);
		}
		public function get_category($id){
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row();
		}
			public function delete_category($id){
			$this->db->where('id',$id);
			$this->db->delete('categories');
			return true;
		}
	} 