<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link href="https://fonts.cdnfonts.com/css/bastamanbold" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Index_kepek/Tormenetedpowerlogo.png">
    <!-- site metas -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Tormented | Uploader</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/index/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/index/style_i.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/index/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
<style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    .input-container {
      margin: 50px auto;
      max-width: 300px;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      box-sizing: border-box;
      border: 2px solid #ccc;
      border-radius: 5px;
      outline: none;
    }
    input[type="submit"] {
      margin-top: 10px;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body class="main-layout">

    <div id="mySidepanel" class="sidepanel">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a class="active" href="/">Homepage</a>
        <a href="Info">Logs</a>
        <a href="Addon">Addons</a>
    </div>
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="head-top">
            <div class="container-fluid">
                <div class="row d_flex">
                    <div class="col-sm-3">
                        <div class="logo">
                            <a href="/">Tormented</a>
                        </div>
                    </div>
                    
                    <div class="col-sm-5">
                        <ul class="social_icon text_align_right d_none">  
                            <li> <a class="active" href="/">Homepage</a></li>
                            <li><a href="Info">Logs</a></li>
                            <li><a href="Addon">Addons</a></li>
                        
                        </ul>
                    </div>
                    <div class="col-sm-4">
                        
                        <ul class="email text_align_right">
                            <li class="d_none"><a href="Javascript:void(0)"><i class="fa-brands fa-discord" aria-hidden="true"></i></a></li>
                            <li class="d_none"> <a href="Javascript:void(0)"><i class="fa-brands fa-youtube" style="cursor: pointer;" aria-hidden="true"></i></a> </li>
                            <li>
                                <button class="openbtn" onclick="openNav()"><img src="images/menu_btn.png"></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('Index_js/mainjava.js')}}"></script>
    </header>


<body>
  <div class="input-container">
  <form id="myForm" method="POST" action="/Logs/store" enctype="multipart/form-data">
    @csrf
      <input type="text" name="code" id="Uploader" placeholder="Enter your text here">
      <input type="submit" value="Submit">
    </form>
  </div>
</body>


<footer>
    <div class="footer">
        <div class="copyright text_align_center ">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-12 ">
                        <p>Tormented Power All rights reserved</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

      <!-- end footer -->
      <!-- Javascript files-->
      <script src="Index_js/jquery.min.js "></script>
      <script src="Index_js/bootstrap.bundle.min.js "></script>
      <script src="Index_js/jquery-3.0.0.min.js "></script>
      <script src="Index_js/custom.js"></script>
   </body>
</html>