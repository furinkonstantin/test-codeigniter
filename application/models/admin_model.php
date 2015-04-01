<?
	class Admin_model extends CI_Model {
	
		public function change_password($password, $repeat_password) {
			$data = array(
				"password"=>$password,
			);
			$q = $this
					->db
					->where('id', $_SESSION["id"])
					->update("users", $data);
			return $q;
		}
		
		public function verify_user($login, $password) {
			$q = $this
					->db
					->where("login", $login)
					->where("password", md5($password))
					->limit(1)
					->get("users");
			if ($q->num_rows() > 0) {
				return $q->row();
			}
			return false;
		}
	}