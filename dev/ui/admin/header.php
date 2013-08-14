<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" lang="en">

  <head>
    <meta charset="utf-8">
    <title>Outbirds - Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/dev/ui/admin/css/bootstrap.css" rel="stylesheet">
    <link href="/dev/ui/admin/style.css" rel="stylesheet">
    <link href="/dev/ui/admin/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/dev/ui/admin/css/fileuploader.css" rel="stylesheet">
    <link href="/dev/ui/admin/css/jquery.touchpanview.css" rel="stylesheet">
    <link href="/dev/ui/admin/css/jquery.Jcrop.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.0/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/bootstrap.wysihtml5/0.0.2/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>



    <?php if(is_logged_in()) { ?> 
      <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/dev/administrator">Outbirds</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              	<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Content <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/dev/administrator/pages">Pages</a></li>
                          <li><a href="/dev/administrator/news">News</a></li>                          
                          <li><a href="/dev/administrator/interests">Interests</a></li>
                          <li><a href="/dev/administrator/tags">Tags</a></li>
                        </ul>
                      </li>              
              	<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Activites <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/dev/administrator/activity">All Activites</a></li>
                          <li><a href="/dev/administrator/activity/add">Add New</a></li>                          
                        </ul>
                      </li>  
              	<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/dev/administrator/users">All Users</a></li>
                          <li><a href="/dev/administrator/users/add">Add User</a></li>   
                          <li><a href="/dev/administrator/users/add">Add Company</a></li>                          
                                                 
                        </ul>
                      </li>                                                 
              <li><a href="#">Reports</a></li>
              <li class="pull-right"><a href="/dev/administrator/logout/">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<?php } ?>