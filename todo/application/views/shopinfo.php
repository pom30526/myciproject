    
    <div class="col-md-9">
                <a href="writeblog" class="btn btn-success" align="right">글 쓰기</a>
                <a href="" class="btn btn-info" algign="right">rmf</a>
                <a href="" class="btn btn-primary" algign="right">혹시 몰라서</a>
                <a href="" class="btn btn-warning" algign="right">rmf</a>
                <hr>
                <!-- 여기에 검색이 들어갑니다. -->
               
                <script>
                    $(document).ready(function(){
                        $("#serach_btn").click(function(){
                        if($("#q").val() ==''){
                            alert('input search word');
                            return false;
                        }else{
                            var act='/todo/main/test/Blogtable/q/'+$("#q").val()+'/page/1';
                            $("#bd_search").attr('action',act).submit();
                        }
                    });
                    });

                    function board_search_enter(form){
                        var keycode =window.event.keyCode;
                        if(keycode == 13) $("#search_btn").click();
                    }
                </script>
                <div>
                <form id="bd_search" method="post">
                    <input type="text" name="serach_word" id="q" onkeypress="board_search_enter(document,q);" />
                    <input type="button" value="검색" id="serach_btn" class="btn btn-primary" />

                    
                </form> 
                </div>
                    <table border=0 cellpadding="0" cellspacing="0" style="width:100%">
                    <thead>
                    <tr>
                        <th>no</th>
                        <th>title</th>
                        <th>id</th>
                        <th>hit</th>
                        <th>data</th>
                    </tr>
                    </thead>
                    <tbody style="width:100%">
            <?php foreach ($blog as $it){ 
            ?>
                    <tr>
                    <td><?php echo $it->no;?></td>
                    <td><a rel="external" href="http://localhost/todo/main/viewone/<?php echo $it->no?>"><?php echo $it->title;?></a></td>
                    <td><?php echo $it->username;?></td>
                    <td><?php echo $it->hit;?></td>
                    <td><?php echo $it->date;?></td>
            </br> 
                    </tr>
                     <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                    <th calspan="5"><?php echo $pagination;?></th>
                    </tr>
                    </tfoot>
                    </table>
           </div>
          </div>
        </div>
         

         
          
        
      
            
    
     
       
      
