
<div class="col-md-9">
   <?php echo validation_errors(); ?>
   <form method="post" class="form-horizontal">
   	 
   	   <legend>회원가입</legend>
   	   <div class="control-group">
   	     <label class="control-label" for="input01">id</label>
   	     <div class ="controls">
   	       <input type="text" name="username" class="input-xlarge" id="input01" value="<?php echo set_value('username');?>">
   	       <p class="help-block">아이디를 입력하세요</p>
   	       </div>
   	     </div>
   	    <div class="control-group">
   	      <label class="control-label" for="input02">password</label>
   	    	<div class="controls">
   	    	<input type="password" name="password" class="input-xlarge" id="input02" value="<?php echo set_value('password');?>">
   	    	<p class="help-block">비밀번호를 입력하세요</p>
   	        </div>
   	    </div>
   	    <div class="control-group">
   	      <label class="control-label" for="input03">password-config</label>
   	    	<div class="controls">
   	    	<input type="password" name="passconf" class="input-xlarge" id="input03" value="<?php echo set_value('passconf');?>">
   	    	<p class="help-block">비밀번호를 다시 입력하세요 </p>
   	        </div>
   	    </div>
   	    <div class="control-group">
   	      <label class="control-label" for="input04">email</label>
   	    	<div class="controls">
   	    	<input type="text" name="email" class="input-xlarge" id="input03" value="<?php echo set_value('email');?>">
   	    	<p class="help-block">이메일을 입력하세요</p>
   	        </div>
   	    </div>


   	<div>
   	<input type="submit" value="전송" class="btn btn-primary" />
   	  <a href="../main/test" class="btn btn-warning" algign="right">돌아가기</a>
   	</div>

   	</form>

</div>



