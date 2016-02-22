<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
	
	Class Blog_m extends CI_Model{
		function __construct()
		{
			parent::__construct();
		}
	
	function read($table='Blogtable',$offset='',$limit='',$serach_word){
		$limit_query='';
		if($limit !='' OR $offset !='')
		{
			$limit_query='Limit  '.$offset.','.$limit;
		}
		$sword='';
		if($serach_word != '')
		{
			$sword='WHERE title like "%'.$serach_word.'%" or content like "%'.$serach_word.'%"';
		}

		$sql ="select * from Blogtable ".$sword." order by no DESC ".$limit_query;

		$query =$this->db->query($sql);

		
		$result=$query->result();
		
		return $result;
	}
	function readone($id){
		// $sql0 ="UPDATE Blogtable SET hit=hit+1 WHERE no= '".$id."'";
		// $this->db->query($sql0);

		$sql ="select * from Blogtable where no = '".$id."'";

		$query =$this->db->query($sql);

//		$this->db->select($arrays['table'],'read_array');

		$result =$query->row();

		return $result;
	
	}

	function insert_blogtable($arrays){
		$insert_array=array(
			'title'=>$arrays['title'],
			'content'=>$arrays['content'],
			'date'=>now(),
			'pass'=>$arrays['pass'],
			//'username'=>$arrays['username'],
			'username'=>$this->session->userdata['username'],
			'cate'=>$arrays['cate']
			);

		$result=$this->db->insert($arrays['table'],$insert_array);

		return $result;
	}
	function count(){
		$sql ="select * from Blogtable";

		$query =$this->db->query($sql);

		$result =$this->db->count_all('Blogtable');

		return $result;

	}
	function modify_board($arrays){
		$modify_array=array(
			'title'=>$arrays['title'],
			'content'=>$arrays['content']
			);

		$where =array(
		'no'=>$arrays['no']
		);

		$result =$this->db->update($arrays['table'],$modify_array,$where);

		return $result;
	}
	function delete_content($no)
	{
		$delete_array=array(
			'no'=>$no
			);
		$result=$this->db->delete('Blogtable',$delete_array);

		return $result;
	}
	function writer_check()
	{
		$table='Blogtable';
		$board_id=$this->uri->segment(4);

		$sql="SELECT username FROM ".$table." WHERE no ='".$board_id."'";

		$query=$this->db->query($sql);

		return $query->row();
	}
	function userreg($arrays)
	{
		$insert_user = array(
			'username'=>$arrays['username'],
			'password'=>$arrays['password'],
			'email'=>$arrays['email'],
			'reg_date'=>now());
		$result=$this->db->insert($arrays['table'],$insert_user);
		return $result;
	}
	function comment_add($arrays)
	{
		$insert_array =array(
			'no'=>$arrays('no'),
			'title'=>$arrays('title'),
			'username'=>$arrays('username'),
			'contents'=>$arrays('comment_contents'),
			);
		$this->db->insert($arrays['table'],$insert_array);

		$board_id=$this->db->insert_id;

		return $board_id;
	}

}
?>
