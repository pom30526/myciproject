<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>lsm blog 연습</title>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 
    <!-- Bootstrap Core CSS -->
    <link href="/todo/include/js/jquery.js" rel="javascript">
    <link href="/todo/include/js/jquery-2.1.4.min.js" rel="javascript">
    <link href="/todo/include/css/bootstrap.min.css" rel='stylesheet' >
    <link href="/todo/include/css/bootstrap.css" rel='stylesheet'  >
    <!-- Custom CSS -->
    <link href="/todo/include/css/shop-item.css" rel='stylesheet' >
    <link href="/todo/include/css/shop-homepage.css" rel='stylesheet' >
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" rel="internal" href="/todo/main/test">lsm's blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/todo/main/devel">제작자</a>
                    </li>
                    <li>
                        <a href="#">자유게시판 </a>
                    </li>
                    <li>
                        <a href="/todo/form_value/forms">회원가입 </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <?php
    if(@$this ->session->userdata('logged_in')== TRUE)
    {
    ?>
    <?php echo $this->session->userdata('username')?>님 환영합니다.<a href="/todo/auth/logout" class="btn">로그아웃</a>
    <?php } 
    else {
    ?>
    <a href="/todo/auth/login" class="btn btn-primary">로그인</a>
    <?php
    }
    ?>
    <!-- Page Content -->
    <div id="sidebar" style="width:60%,float=left">
            <div class="col-md-3">
                <p class="lead">카테고리</p>
                <div class="list-group">
                    <a href="/todo/main/test" class="list-group-item active">my Blog</a>
                    <a href="/todo/main/ppthelp" class="list-group-item">ppt 도움 되는 사이트</a>
                    <a href="/todo/main/colorhelp" class="list-group-item">색 조합 사이트</a>
                    <a href="#" class="list-group-item">Category 4</a>
                    <a href="#" class="list-group-item">Category 5</a>
                </div>
            </div>
            </div>

