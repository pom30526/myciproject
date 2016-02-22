 <a href="writeblog" class="btn btn-success" align="right">글 쓰기</a>
 <a href="" class="btn btn-info" algign="right">rmf</a>
 <a href="" class="btn btn-primary" algign="right">혹시 몰라서</a>
 <a href="" class="btn btn-warning" algign="right">rmf</a>

 <!-- from 검증 script -->
 <script>
 	$(document).ready(function(){
 		$("#write_btn").click(function(){
 		if($("#input01").val()==''){
 			alert('제목을 입력해주세요');
 			$("#input01").focus();
 			return false;
 			}
 		else if($("#input02").val()=='')
 		{
 			alert('내용을 입력해주세요');
 			$("#input02").focus();
 			return false;
 		}
 		else
 		{
 			$("#write_action").submit();
 		}
 	  });
 	});
 	</script>
	<?php $this->output->enable_profiler(true);	?>
 	<form class="form-horizontal" method="post" action="" id="write_action">
 		<fieldset>
 		   <legend>게시물 수정</legend>
 		   <div class="control-group">
 		      <label class="control-label" for="input01">제목</label>
 		      <input type="text" class="input-xlarge" id="input01" name="title" value="<?php echo $views->title;?>">
 		   </div>
 		      <label class="control-label" for="input02">내용</label>
 		      <div class="controls">
 		      <textarea  class="input-xlarge" id="input02" name="content" rows="10" style="width:50%">
 		      <?php echo $views->content;?>
			  </textarea>
		   </div>

		   <div class="form-actions">
		      <button type="submit" class="btn btn-primary" id="write_btn">수정</button>
		      <button class="btn" onlcick="document.location.reload()">취소</button>
		   </div>
		</fieldset>
	</form>
 		  
