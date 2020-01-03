<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Auth
{
	function __construct()
	{
		$CI =& get_instance();
        $this->db = $CI->load->database('default',TRUE);
    }
	
	function restrict()
	{
		$logged_in = $this->is_logged();
		if($logged_in == FALSE)
		{
			redirect('main/login');
		}else
			{
				return TRUE;	
			}
	}
	
	function is_logged()
	{
		$CI =& get_instance();
		if ($CI->session->userdata('id') == "")
		{
			return FALSE;
		}
		else
			{
				return TRUE;
			
			}	
	}
	
	function is_logged_in()
	{
		$logged_in = $this->is_logged();
		if($logged_in == TRUE)
		{
			redirect('main/admin');
		}
	}
	
	function routes()
	{
		$CI =& get_instance();
		$id = $CI->session->userdata('id');
		$group = $this->checkGroup($id);
		if($group == '1')
			{
				redirect('main/admin');	
			}
			else if($group == '2')
			{
				redirect('main/pimpinan');	
			}
			else if($group == '3')
			{
				redirect('kabid');	
			}
			else if($group == '4')
			{
				redirect('main/pptk');	
			}
			
	}
	
	private function userRoute()
	{
		$CI =& get_instance();
		$id = $CI->session->userdata('id');
		$this->db->select('group');
		$this->db->where('id', $id);
		$result = $this->db->get('tb_login');
		$data = $result->row();
		$group = $data->group;
		return $group;	
	}
	
	function adminRestrict()
	{
		$CI =& get_instance();
		if($this->is_logged() == FALSE)
		{
			redirect('main/login');
			
		}
		else if($this->is_logged() == TRUE && $this->userRoute() == 1)
			{
				//$this->session->set_userdata('uid', $uid);
				return TRUE;
					
			}else
				{
					show_404();	
				}			
	}
	
	function perawatRestrict()
	{
		$CI =& get_instance();
		if($this->is_logged() == FALSE)
		{
			redirect('main/login');
			
		}
		else if($this->is_logged() == TRUE && $this->userRoute() == 1 && $this->userRoute() == 2)
			{
				//$this->session->set_userdata('uid', $uid);
				return TRUE;
					
			}else
				{
					show_404();	
				}			
	}
	
	function pimpinanRestrict()
	{
		$CI =& get_instance();
		if($this->is_logged() == FALSE)
		{
			redirect('main/login');
			
		}
		else if($this->is_logged() == TRUE && $this->userRoute() == 2 || $this->userRoute() == 1)
			{
				//$this->session->set_userdata('uid', $uid);
				return TRUE;
					
			}else
				{
					$CI->utilities->notification('danger', 'Maaf anda tidak memiliki akses');
					redirect('main');	
				}			
	}
	
	function checkAkun($username,$pass)
	{
		$query = $this->db
			->where('username', $username)
			->get('tb_login');
		if($query->num_rows() == 1)
			{
				$cekUsername = TRUE;
				$cekPass = $this->checkPass($username,$pass);
			}else
				{
					$cekUsername = FALSE;
					$cekPass  = FALSE;
				}
		$cekAkun = array($cekUsername,$cekPass);
		return $cekAkun;
	}
	
	function encrypt($p) 
    {
        //return sha1(md5($user_password) . $salt);
		return base64_encode(sha1($p, true));
    }
	
	
	private function checkPass($username,$pass)
	{
		$this->db->from('tb_login');
		$this->db->where('username', $username);        
		$result = $this->db->get();
		
		$data		= $result->row();
        $password	= $data->password;
		$pass_encrypt = md5($pass);
		if($pass_encrypt === $password)
			{
				return TRUE;	
			}else
				{
					return FALSE;	
				}
	}
	
	function checkGroup($id)
	{
		$query = $this->db
				->select('group')
				->where('id', $id)
				->get('tb_login');
		$data = $query->row();
		$group = $data->group;
		return $group;
			
	}
	
}


?>