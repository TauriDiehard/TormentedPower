<!DOCTYPE html>
<head>
  <title>Tormented Power | Addons</title>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/Addon.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
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

</head>
        <body>
          <nav>
            <div class="logo-tormented">
                <img id="Tormenetedpowerlogo" src="{{asset('Index_kepek/Tormenetedpowerlogo.png')}}">
            </div>
                <div class="d-flex justify-content-between" >
                    <ul class="nav-links">
    
                        <li id="kezdo-mobile">
                            <a href="/" id="kezdo">Kezdőlap</a>
                        </li>
                        
                        <li  id="info-mobile">
                            <a href="#" id="info" >Info</a>
                        </li>
    
                        <li id="addon-mobile">
                            <a href="Addon">Addons</a>
                        </li>
                       
                        <li id="yticon">
                          <a href="#"><span class="fa-brands fa-youtube-play" aria-hidden="true" style="font-size:20px"></span></a>
                        </li>
    
                        <li id="dcicon" >
                            <span class="bi bi-discord" style="font-size:20px"></span>
                        </li>
    
                        <li id="progressicon">
                            <a href="https://tauriprogress.github.io/guild/Tormented%20Power?realm=[HU]%20Tauri%20WoW%20Server"><img id="progresskep" src="{{asset('Index_kepek/tauriprogresslogo.png')}}" height="20px">
                            </a>
                        </li>
                    
                    </ul>
                </div>
    
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <script src={{asset('Index_js/mainjava.js')}}></script>
        <div class="container-xxl">
            <div class="row">
              <div class="col-sm-3">
              </div>
            <div class="col-sm-6 ">
              <div class="container-addon">
                    <h5 class="card-header">
                      @auth
                      <span class="font-bold uppercase" style="font-size:25px;">Üdv: <b>{{Auth::user()->name}}</b></span>
                      <form action="/logout" method="POST">
                        <a href="/logout"><i  class="fa-solid fa-door-open" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;float:right;"></i></a>
                      </form>
                      <a href="/Addon/manage"><i class="fa-solid fa-gear" role="button" aria-hidden="true" style="font-size:25px;margin-right:30px;float:right;"></i></a>
                      @else
                      <a href="/login"><i class="fa-solid fa-arrow-right-from-bracket" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;margin-left:35px;float:right;"></i></a>
                        <a href="/register"><i class="fa-solid fa-user-plus" role="button" aria-hidden="true" style="font-size:25px;margin-right:inherit;float:right;"></i></a>
                     @endauth
                        <form action="" method="GET" name="">
                            <div class="wrap">
                              <div class="search">
                                 <input type="text" id="kereses" name="search" class="searchTerm" placeholder="Keresés...">
                                 <button type="submit" class="searchButton">
                                   <i class="fa fa-search"></i>
                                </button>
                              </div>
                           </div>
                            
                        </form>
                    </h5>
                    
                    <!--Addon panelek-->
                    @foreach ($listings as $listing)
                    <x-listing-card :listing="$listing" />
                
                    @endforeach
                    <div class="pages">
                      {{$listings->links('pagination::bootstrap-5')}}
                    </div>
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

        </body>
        <div class="footer">
          <div class="child" style="font-size: 20px;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Töltsd fel a saját customizált addonodat és ozd meg a többiekkel: <a href="/Addon/create"><button class="button-36" role="button" align="right">Addon Kreálás</button> </a> </div>
        </div>

        <div id="box">
          <p>Copyright © 2022 Tormented Power Minden jog fenntartva.</p>
      </div>
</html>