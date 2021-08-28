<?php 
function is_logged_in(){
	$ci = get_instance();
	if(!$ci->session->userdata('email')){
		redirect('auth');
	}else{
		$role_id = $ci->session->userdata('role_id');
		$menu = $ci->uri->segment(1);

		$menu_id = $ci->db->get_where('user_menu',['menu'=>$menu])->row_array()['id'];

		$userAccess = $ci->db->get_where('user_access_menu',[
			'role_id'=>$role_id,
			'menu_id'=>$menu_id]);
		
		$userAccess = ($menu=='assets')?0:$userAccess;

		if($userAccess->num_rows()<1){
			redirect('user');			
		}
	}
}