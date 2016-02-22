<form class="form-horizontal" method="post" action="" id="writeblog">
   <script type="text/javascript" src="/todo/include/js/HuskyEZCreator.js" charset="utf-8"></script>
<?php echo validation_errors(); ?>
		<fieldset>
		  <div class="control-group">
		    <label class="control-label" for="input01">제목</label>
		    <div class="controls">
		   	<input type="text" class="input-xlarge" id="input01" name="title" style="width:50%" value="<?php echo set_value('title');?>">
		   	<p class="help-block">제목을 써주세요</p>
		   	<ul class="dropdown-menu">
          		<li><a href="#">PHP</a></li>
          		<li><a href="#">MYSQL</a></li>
          		<li><a href="#">TOEIC</a></li>
        		</ul>
		   	</div>
		 <!--   	 	<label class="control-label" for="input02">userid</label>
			<div class="controls">
		 	<input type ="text" class="input-xlarge" id="input02"  name="username" style="width:50%">
		  	<p class="help-block"></p>
		  	</div> -->
		  		 	<label class="control-label" for="input03">pass</label>
			<div class="controls">
		 	<input type ="password" class="input-xlarge" id="input03"  name="pass" style="width:50%">
		  	<p class="help-block"></p>
		  	</div>
		  		 	<label class="control-label" for="input04">cate</label>
			<div class="controls">
			<select name="cate">
			<option value="php">php</option>
			<option value="mysql">mysql</option>
			<option value="toeic">toeic</option>
			</select>
		 	<!-- <input type ="text" class="input-xlarge" id="input04"  name="cate" style="width:50%">
		  	<p class="help-block"></p> -->
		  	</div>
		<label class="control-label" for="intput05">내용</label>
			<div class="controls">
			<textarea  class="input-xlarge" id="input05" name="content" rows="10" style="width:50%">
			<?php echo set_value('content');?>
			</textarea>
			<p class ="help-block"></p>
			</div>
		
		  <div class="form-actions">
		 
		  	<button type="submit" class="btn btn-primary" id="write_btn" onclick="submitContents()">작성</button>
		  	<button class="btn btn-warning" onclick="document.location.reload()">취소</button>
		  	</div>
		  	</fieldset>
		  	  <script type="text/javascript">
			var oEditors = [];
			nhn.husky.EZCreator.createInIFrame({
    		oAppRef: oEditors,
    		elPlaceHolder: "input05",
    		sSkinURI: "/todo/include/SmartEditor2Skin.html",
    		fCreator: "createSEditor2"
			});
			</script>
			 <script>
			function submitContents() {
   			 // 에디터의 내용이 textarea에 적용된다.
   			 oEditors.getById["input05"].exec("UPDATE_CONTENTS_FIELD", []);
   			 var write=document.getElementById("write_btn");
 			try
 			{
 				write.form.submit();
 			}
 			catch(e)
 			{
 				alert('error');
 			}
 			}
   			
    		</script>
		  	</form>
		
			