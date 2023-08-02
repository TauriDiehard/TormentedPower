<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="Index_kepek/Tormenetedpowerlogo.png">
    <!-- site metas -->
    <title>Tormented | Addons</title>

    <link rel="icon" type="image/x-icon" href="Index_kepek/Tormenetedpowerlogo.png">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">    
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/index/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/index/style_i.css">
    <!-- responsive-->
    <link rel="stylesheet" href="css/index/responsive.css">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
<style>
  .addonkrealas {
    z-index: 0;
    display: flex;
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 20%;
    background-color: transparent;
    color: white;
 }
 #apa:hover{
background-color:green !important;
 }
 .child {
    margin-left: auto;
    order: 2;
    margin-right: 5%;
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
                    <div class="col-sm-6">
                        <ul class="social_icon text_align_right d_none">
                            <li> <a class="active" href="/">Homepage</a></li>
                            <li><a href="Info">Logs</a></li>
                            <li><a href="Addon">Addons</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="email text_align_right">
                            
                            <li>
                                <button class="openbtn" onclick="openNav()"><img src="images/menu_btn.png"></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
        <script src="{{asset('Index_js/mainjava.js')}}"></script>



        <div class="container-xxl">
            <div class="row">
              <div class="col-sm-4">
                
              <h5 class="card-header">
                  
                  @auth
                  
                  <form action="/logout" method="POST">
                    <a href="/logout"><i  class="fa-solid fa-door-open" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;float:right;"></i></a>
                  </form>
                  <a href="/Addon/manage"><i class="fa-solid fa-gear" role="button" aria-hidden="true" style="font-size:25px;margin-right:30px;float:right;"></i></a>
                  @else
                  <a href="/login"><i class="fa-solid fa-arrow-right-from-bracket" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;margin-left:35px;float:right;"></i></a>
                    <a href="/register"><i class="fa-solid fa-user-plus" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;float:right;"></i></a>
                 @endauth

                </h5>
              </div>
              @auth
              <span class="font-bold uppercase" style="font-size:25px;color:white;">Üdv: <b>{{Auth::user()->name}}</b></span>
              @endauth

            <div class="col-sm-4 ">
              
              <div class="container-addon">
                    
                    <form action="" method="GET" name="">
                        <div class="search-box" style="">
                          <button type="submit"  class="btn-search"><i class="fas fa-search"></i></button>
                          <input type="text"  name="search" class="input-search" placeholder="Type to Search...">
                        </div>
                        </div>
                        </form>
                    <!--Addon panelek-->
        </div> 
      </div> 
    </div> 
  </div> 
</div> 

<div class="container-xxl">
            <div class="row">
              <div class="col-sm-3">
              </div> 
              <div class="col-sm-6 ">
                
              
              @foreach ($listings as $listing)
                    <x-listing-card :listing="$listing" />
                    @endforeach
                    <div class="pages">
                      {{$listings->links('pagination::bootstrap-5')}}
                    </div>
               </div> 
            <div class="col-sm-3">
        </div> 
      </div> 
    </div> 
  </div> 
</div>


  <button class="scrollToTopBtn"></button>



  <script>
    var scrollToTopBtn = document.querySelector(".scrollToTopBtn")
    var rootElement = document.documentElement
    
    function handleScroll() {
    
      var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight
      if ((rootElement.scrollTop / scrollTotal ) > 0.80) {
    
        scrollToTopBtn.classList.add("showBtn")
      } else {
    
        scrollToTopBtn.classList.remove("showBtn")
      }
    }
    
    function scrollToTop() {
      // Scroll to top logic
      rootElement.scrollTo({
        top: 0,
        behavior: "smooth"
      })
    }
    scrollToTopBtn.addEventListener("click", scrollToTop)
    document.addEventListener("scroll", handleScroll)
    </script>
        <div class="addonkrealas">
          <div class="child" style="font-size: 20px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Make Addons Import <a href="/Addon/create"><button id="apa" style="color:white;border:solid 2px green; background-color:transparent;" role="button" align="right">Addon Create</button></a> </div>
        </div>

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
</html>

