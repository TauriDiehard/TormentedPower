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
    <title>Tormented</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/index/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/index/style_i.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/index/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    

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
  
    <!-- end header -->
    <!-- start slider section -->

    <!-- end slider section -->
    <!-- wallet -->
    <div id="top_section" class=" banner_main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container-fluid">
                                    <div class="carousel-caption relative">
                                        <div class="row d_flex">
                                            <div class="col-md-6">
                                                <div class="con_img">
                                                    <figure><img class="img_responsive" style="height:40% !important;" src="Index_kepek/legion-cat.png" alt="#" /></figure>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="bluid">
                                                    <h1>Welcome to the Vengeance website</h1>
                                                    <p>Unlock Thrilling Adventures - Embark on a Journey with Vengeance Guild!
                                                    </p>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- end wallet -->
    <!-- about -->
    <div id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="about_border">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="titlepage text_align_left">
                                    <h2>Community</h2>
                                </div>
                                <div class="about_text">
                                    <p>
At Tormented, we believe that a strong and supportive community is essential for personal growth and well-being. We provide a platform where individuals can come together to connect, learn, and grow, fostering an environment that nurtures both personal development and meaningful relationships.
                                    </p>
                                   

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about_img">
                                    <figure><img class="img_responsive" src="Index_kepek/confipepe.png" alt="#" /></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about -->
    <div id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about_border">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="titlepage text_align_left">
                                    <h3 style="font-family: Montserrat,sans-serif !important;Margin-bottom:20px; font-size:22px;"><b>Watch Streams</b></h3>
                                </div>
                                <div class="about_text">
                                    <div class="green-rectangle">
                                        <h3 style="font-family: 'BastamanBold' !important;font-size:24px;">@php
                                            echo date("F, Y");
                                        @endphp  </h3>
                                        <p style="font-family: 'BastamanBold' !important;font-size:14px;">Streaming pvp,m+, and Guild Raids</p>
                                        <h4 style="font-family: 'BastamanBold' !important;font-size:12px;margin-top:-35px;"><i class="fa fa-clock-o" aria-hidden="true"></i> 18:00 - 22:00</h4>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div id="test" class="embed-responsive embed-responsive-16by9">
                                
                            </div>

                            <script src="https://player.twitch.tv/js/embed/v1.js"></script>
                            <script type="text/javascript">
                              var options = {
                                channel: "therealfather1",
                                width: "100%",
                                height: "100%",
                                parent: ["local"],
                              };
                              var player = new Twitch.Player("test", options);
                              
                            </script>                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->

    <div class="testimonial">
        <div  class="container-fluid">
            <div class="row">
                <div  class="col-md-12">
                    <div id="discord" class="border_testi">
                        <div class="row">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <div class="row d_flex">
                            <div class="col-md-10 offset-md-1">
                                    <div  class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="container">
                                                <div class="carousel-caption posi_in">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="testomoniam_text text_align_center">
                                                                <i><img src="Index_kepek/discord-server.png" alt="#"/></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="titlepage text_align_left">
                                                                <h2>Discord</h2>
                                                            </div>
                                                            <div class="testomoniam_text text_align_left">
                                                                <p>Join Discord where events/raids are posted and where you can find good company</p>

                                                                <a class="read_more" href="https://discord.gg/mKPxunPQ"><i class="fab fa-discord"></i> Join</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end testimonial -->
    <!-- works -->
    <div class="works">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage text_align_center">
                        <h2>Management</h2>
                    </div>
                    <?php
                    $members = json_decode(file_get_contents('https://discord.com/api/guilds/964584415525228565/widget.json'), true)['members'];
                    $kubu = 0;
                    foreach ($members as $members) {
                        if ($members['status'] == 'online' & $members['username'] == 'Kiddo') 
                        {
                            $kubu++;
                        }

                    }
                    $members = json_decode(file_get_contents('https://discord.com/api/guilds/964584415525228565/widget.json'), true)['members'];
                    $Taping = 0;
                    foreach ($members as $members) {
                        if (($members['status'] == 'online' || 'idle' || 'dnd') & $members['username'] == 'UwU') 
                        {
                            $Taping++;
                        }

                    }
                    $members = json_decode(file_get_contents('https://discord.com/api/guilds/964584415525228565/widget.json'), true)['members'];
                    $moni = 0;
                    foreach ($members as $members) {
                        if (($members['status'] == 'online' || 'idle' || 'dnd') & $members['username'] == 'uwu master') 
                        {
                            $moni++;
                        }

                    }

                    if($kubu == 1){
                        ?>
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="image">
                                    <img src="{{asset('https://cdn.discordapp.com/widget-avatars/-w-NFrlP44QTtwnIFUgx2OQiibkbMRrpv5DSu9Ja91c/eJOUMp5V_lgwFs5BDh4eGiVP3h4E98Ff0ZDqEHBJCwb5pZ_sIwJtswxcveO38kABBQxVCHy7FJ1syhncx_LasPgwwYjcqWwfyToJ42KTs-TGvxbywXOewHiXR_Pch3gQ-VvWVGUhMsh9_g')}}" class="rounded" width="100" >
                                    </div>

                                    <div class="ml-3 w-100">
                                        
                                    <h4 class="mb-0 mt-0" style="color:white;">Kubu</h4>
                                    <span style="color:white;">Guild Master</span> <span stlye="color:green" style="color:white;"> <span class="logged-in"> ●</span> Online</span>                                          
                                    <h5 class="mb-0 mt-0" style="color:white;"> Kubu#3544 </h5>
                                    </div> 
                                    </div>
                                </div>
                        <?php
                        
                    }else
                    {
                        ?>
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="image">
                                    <img src="{{asset('Index_kepek/discord-online-offline.png')}}" class="rounded" width="100" >
                                    </div>

                                    <div class="ml-3 w-100">
                                        
                                    <h4 class="mb-0 mt-0" style="color:white;">Kubu</h4>
                                    <span style="color:white;">Guild Master</span> <span stlye="color:green" style="color:white;"> <span class="logged-out"> ●</span> Offline</span>                                          
                                    <h5 class="mb-0 mt-0" style="color:white;"> Kubu#3544 </h5>
                                    </div> 
                                    </div>
                                </div>


                        <?php
                    }



                    if($Taping == 1){
                        ?>
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="image">
                                    <img src="{{asset('https://cdn.discordapp.com/widget-avatars/M7UuTZq5FSSlGV720Zl0Xhk8czA9qtCJYSjHq_JziUc/SK1AK4-_aA88X6MBx7UEuUvy-4lObLnQf6meCPPlFGIcCe0d4QsJ77oPRSF8TfZDr8tBxzgDn5bXmxN-P5BHX3kKMr7Kj5fn90o9UT2rPlPr6WCF2eO4xACYN48SsSB_MbS88KWRrpR77w')}}" class="rounded" width="100" >
                                    </div>

                                    <div class="ml-3 w-100">
                                        
                                    <h4 class="mb-0 mt-0" style="color:white;">Taping</h4>
                                    <span style="color:white;">Officer</span> <span stlye="color:green" style="color:white;"> <span class="logged-in"> ●</span> Online</span>                                          
                                    <h5 class="mb-0 mt-0" style="color:white;"> Taping#8473 </h5>
                                    </div> 
                                    </div>
                                </div>
                        <?php
                        
                    }else
                    {
                        ?>
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="image">
                                    <img src="{{asset('Index_kepek/discord-online-offline.png')}}" class="rounded" width="100" >
                                    </div>
                                    <div class="ml-3 w-100">
                                    <h4 class="mb-0 mt-0" style="color:white;"> Taping</h4>
                                    <span style="color:white;">Officer</span> <span stlye="color:green" style="color:white;"> <span class="logged-out"> ●</span> Offline</span>                                          
                                    <h5 class="mb-0 mt-0" style="color:white;"> Taping#8473 </h5>
                                    </div> 
                                    </div>
                                </div>


                        <?php
                    }

                    if($moni == 1){
                        ?>
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="image">
                                    <img src="https://cdn.discordapp.com/widget-avatars/gfeIVcYbmTW1SGuikgI9SNifN0eLio4K7HsajlTGq0o/OR1vdxP9pl9Zz2usXDFpIpdVXcrCzxnvM-bRIcMYaIEvDQo3Fe_-6Vd4mVBdv_aROFFJIg3Up3e5tp0Fwg4LJ238KcR5e6BF9P8g9muUl-l1wjNg9AMvJ9x1jkYaElTO2gHdBCWtLj1nHg" class="rounded" width="100" >
                                    </div>

                                    <div class="ml-3 w-100">
                                        
                                    <h4 class="mb-0 mt-0" style="color:white;">Móni</h4>
                                    <span style="color:white;" >Officer</span> <span stlye="color:green" style="color:white;"> <span class="logged-in" style="color:white;"> ●</span> Online</span>                                          
                                    <h5 class="mb-0 mt-0" style="color:white;"> Bröfi#8202 </h5>
                                    </div> 
                                    </div>
                                </div>
                        <?php
                        
                    }else
                    {
                        ?>
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="image">
                                    <img src="{{asset('Index_kepek/discord-online-offline.png')}}" class="rounded" width="100" >
                                    </div>

                                    <div class="ml-3 w-100">
                                        
                                    <h4 class="mb-0 mt-0" style="color:white;">Móni</h4>
                                    <span style="color:white;">Officer</span> <span style="color:white;" stlye="color:green" > <span  class="logged-out">●</span> Offline</span>                                          
                                    <h5 class="mb-0 mt-0" style="color:white;"> Bröfi#8202 </h5>
                                    </div> 
                                    </div>
                                </div>


                        <?php
                    }
                   
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- works -->
    <!-- contact -->
    
   
    <!-- end contact -->
    <!-- footer -->
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