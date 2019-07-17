<?php
	class User_m extends CI_Model{
		
			public function register($enc_password){
				//creating data array
				$data = array(
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => $enc_password
				);

				//insert 
				return $this->db->insert('users',$data);
			}

			//login user
			public function login($username, $password){
				//validate
				$this->db->where('username', $username);
				$this->db->where('password',$password);

				$result = $this->db->get('users');

				if($result->num_rows() == 1){
					return $result->row(0)->id;

				} else{
					return false;
				}
			}

			// checking username
			public function check_username_exists($username){
				$query = $this->db->get_where('users', array('username' => $username));
				if(empty($query->row_array())){
					return true;
				} else{
					return false;
				}
			}

			// checking email
			public function check_email_exists($email){
				$query = $this->db->get_where('users', array('email' => $email));
				if(empty($query->row_array())){
					return true;
				} else{
					return false;
				}
			}
		}
	