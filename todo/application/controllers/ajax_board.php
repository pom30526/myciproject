<?php if( !defined('BASEPATH')) exit('NO direct script access allowed ');
Class Ajax_board extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function test()
	{
		$this->load->view('ajax/test_v');

	}
	public function ajax_action()
	{
		echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
		$name=$this->input->post("name");
		echo $name."님 반갑습니다"; 
	}
	public function ajax_coment_add()
	{
		if(@$this->session->userdata('logged_in') ==TRUE)
		{
			$this->load->model('blog_m');\

			$table='blogtable';
			$board_id=$this->input->post('no',TRUE);
			$comment_contents=$this->input->post("comment_contents",TRUE);
			if($comment_contents !='')
			{
				$write_data=array
				(
				'table'=>'blogtable',
				'no'=>$board_id,
				'title'=>'',
				'content'=>$comment_contents,
				'username'=>$this->session->userdata('username')	
				);

				$result= $this->blog_m->insert_comment($write_data);

				if($result)
				{
					$sql="SELECT * FROM blogtable WHERE no = '"$board_id."' ORDER BY no desc";
					$query=$this->db->query($sql);
					?>
					<table cellspacing="0" cellpadding="0" class="table table-striped" id="comment_table">
					<?php
					foreach($query->result() as $lt)
					{
					?>
					<tr id="row_num_<?php echo $lt->no;?>">
					   <th scope="row">
					   <?php echo $lt->username;?>
					   </th>
					   <td><?php echo $lt->content;?></td> 
					   <td><time datetime="<?php echo mdata("%Y-%M-%j",human_to_unix($lt->reg_date));?>">
					   <?php echo $lt->reg_date;?></time></td>
					   <td><a href="#" onclick="javascript:comment_delete('<?php echo $lt->no;?>')"><i class="icon-trash">
					   </i>삭제</a></td>
					   </td>
					   </tr>
					   <?php
						}
						?>
						</table>
						<?php 
					   		}
					   		else
					   		{
					   			echo "2000";
					   		}
					   		else
					   		{
					   			echo "1000";
					   		}
						}
							else
							{
								echo "9000";
							}
		}
	}
}

?>