
                <a href="<?php echo $this->uri->segment(3);?>/write" class="btn btn-success" align="right">글 쓰기</a>
                <a href="/todo/main/modfyblog/no/<?php echo $this->uri->segment(3);?>/page/1" class="btn btn-info" algign="right">수정하기</a>
                <a href="/todo/main/delete/no/<?php echo $this->uri->segment(3);?>" class="btn btn-primary" algign="right">삭제</a>
                <a href="" class="btn btn-warning" algign="right">rmf</a>
                <hr>
                <script type="text/javascript" >
                $(function()
                {
                	$("#comment_add").click(function()
                	{
                		$.ajax(
                		{
                			url:"/todo/ajax_board/ajax_comment_add",
                			type:"POST",
                			data:
                			{
                				"comment_contents":encodeURIComponent($("#input01").val()),
                				"csrf_test_name":getCookie('csrf_cookie_name'),
                				"table":"blogtable",
                				"no":<?php echo $this->uri->segment(3)?>
                			},
                			datatype:"html",
                			complete:function(xhr,textStatus)
                			{
                				if(textStatus =='success')
                				{
                					if(xhr.responseText == 1000 )
                					{
                						alert('댓글 내용을 입력하세요');
                					}	
                					else if(xhr.responseText == 2000) 
                					{
                						alert('다시 입력하세요');
                					}else if(xhr.responseText == 9000)
                					{
                						alert('로그인 하여야합니다');
                					}  
                					else
                					{
                						$("#comment_area").html(xhr.responseText);
                						$("#input01").val('');
                					}
                			    }
                			}
                		});
                	});
                });
                </script>

                <script type="text/javascript">
                function comment_add()
                {
                	var csrf_token =getCookie('csrf_cookie_name');
                	var name="comment_contents="+encodeURIComponent(document.com_add_comment_contents.value)
                	+"&csrf_test_name="+csrf_token+"&table=blogtable&no=<?php $this->uri->segment(4);?>";

                	function add_action()
                	{
                		if(httpRequest.readyState==4)
                		{
                			if(httpRequest.status ==200)
                			{
                				if(httpRequest.responseText ==1000)
                				{
                					alert('댓글 내용을 입력하세요');

                				}else if(httpRequest.responseText==2000)
                				{
                					alert('다시 입력하세요');

                				}else if(httpRequest.respinseText ==9000)
                				{
                					alert('로그인 하셔야합니다');
                				}
                				else
                				{
                					var contents =document.getElementnById("comment_area");
                					contents.innerHTML =HttpRequest.responseText;

                					var textareas =document.getElementnById("input01");
                					textareas.value='';
                				}
                			}
                		}
                	}
                }
                function getCookie( name )
	{
		var nameOfCookie = name + "=";
		var x = 0;

		while ( x <= document.cookie.length )
		{
			var y = (x+nameOfCookie.length);

			if ( document.cookie.substring( x, y ) == nameOfCookie ) {
				if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
					endOfCookie = document.cookie.length;

				return unescape( document.cookie.substring( y, endOfCookie ) );
			}

			x = document.cookie.indexOf( " ", x ) + 1;

			if ( x == 0 )

			break;
		}

		return "";
	}
                </script>
                <?php $this->output->enable_profiler(true);?>
                <?php echo $views->content;?>
                <?php echo $views->hit;?>
            	
            	<form class="form-horizontal" method="post" action="" name="com_add"?>
            		<fieldset>
            		<div class="control-group">
            			<label class="control-label" for="input01">댓글</label>
            			<div class="controls">
            			   <textarea class="input-xlarge" id="input01" name="comment_contents" rows="3" style="width:50%">
            			     </textarea>
            			     </div>
            	<input class="btn btn-primary" type="button" id="comment_add()" value="작성">
            		<p class="help-block"></p>
            		</div>
            		</div>
            		</fieldset>
            		</form>


               
                </article>