<!DOCTYPE html>
<html lang="HU">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/shroud.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="Shroud-img/sajt.png" type="image/gif" sizes="16x16">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'> 
    </head>
        <div class="container-xxl">
            <div class="row">
                <div class="col-sm-2">
                </div>
                  <div class="col-sm-8 ">
                    <div class="container-addon">
                      <div class="card">
                        <div class="card-body">
                          <section class="port" id="pLink">
                            <div class="pBox">
                              <a href="#" class="anchor" onclick="toggle()" id="img-1">
                                <img src="{{asset('Index_kepek\info.png')}}" align="right" style="width: 5%; height: 5%;"></a>
                            </div>
                            <div id="popup">
                            <a href="#" class="anchor" onclick="toggle()">
                            @if($listing->tags == "Elvui")
                            <img src="{{asset('Index_kepek\elvui-help.png')}}"  style="width: 100%; border: solid white;" class="img-1">
                            @else
                            <img src="{{asset('Index_kepek\weakaura-help.png')}}"  style="width: 100%; border: solid white;" class="img-1">
                            @endif

                            </a>
                            </div>
                          </section>
                          
                        <a href="/Addon" class="btn btn- primary"> <-Vissza </a>
                          
                         

                  <h1 class="card-title">{{$listing->title}}</h1> 
                  
                  @if($listing->tags == "Elvui")
                  <p id="warning" align="center" class="card-text"><b><img  src="{{asset('Index_kepek\warning.png')}}">Figyelem,elöször töltsd le az importálható több funkciós Elvuit: </b><a href="https://github.com/ElvUI-MoP/ElvUI-5.4.8"><b>Elvui</b></a><img  src="{{asset('Index_kepek\warning.png')}}"></p>
                  @else
                  <p id="warning" align="center" class="card-text"><b><img  src="{{asset('Index_kepek\warning.png')}}">Figyelem,elöször töltsd le az importálható több funkciós Weakaurát: </b><a href="https://github.com/Maczuga/WeakAuras2-MoP/releases/tag/1.2.14"><b>Weakaura</b></a><img  src="{{asset('Index_kepek\warning.png')}}"></p>
                  @endif
                  

                  <p class="card-text" style="font-size: 13px;"><i>Készítette: {{$listing->user->name}}</i></p>
                  
                  <p class="card-text" ><b>leírás:</b>
                     {{$listing->description}}</p>
                  <div onclick="myFunction()" align="left" class="example_e" id="masolas" target="_blank" rel="nofollow noopener">Másolás</div>                
                                      <input value="{{$listing->import}}"  id="myInput" >
                  </div>
                  <div class="alert-box success">Sikeres addon másolás!!!</div>
                  
                      
                <div class="row">
                  <div class="popup">
                      
            @if (!empty($listing->imgaddons))
            @foreach (json_decode($listing->imgaddons) as $imgaddon)
    <img id="heal-elvui" class="img-fluid" src="{{ asset('storage/'.$imgaddon) }}" onerror="this.style.display='none'">
@endforeach
            @endif
                    <div class="show-pop">
                      <div class="overlay">
                        <div class="img-show-pop">
                          <span style="font-size: 40px; color:rgb(255, 0, 0);">x</span>
                            <img src="">
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
      <script>
        $( "#masolas" ).click(function() {
          $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        });
      </script>
        <script>
        $(function () {
            "use strict";
            
            $(".popup img").click(function () {
                var $src = $(this).attr("src");
                $(".show").fadeIn();
                $(".img-show img").attr("src", $src);
            });
            
            $("span, .overlay").click(function () {
                $(".show").fadeOut();
            });
            
        });
          </script>

        <script>


            function myFunction() {
              var copyText = document.getElementById("myInput");
              copyText.select();
              copyText.setSelectionRange(0, 99999)
              document.execCommand("copy");
              $( "#success-btn" ).click(function() {
              $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
              });
            }
 
        </script>
        <script>
function toggle() {
  var blur = document.getElementsByClassName('blur');
 
  for (var i = 0; i < blur.length; i++) {
      blur[i].classList.toggle('active');
  }

  var popup = document.getElementById('popup');
  popup.classList.toggle('active');
}

</script>
<script>
$(function () {
    "use strict";
    
    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show-pop").fadeIn();
        $(".img-show-pop img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show-pop").fadeOut();
    });
  });
  </script>



    </body>

    </html>