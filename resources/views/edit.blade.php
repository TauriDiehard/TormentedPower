<!DOCTYPE html>
<html lang="HU">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ secure_asset('css/create_addon.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="icon" href="Shroud-img/sajt.png" type="image/gif" sizes="16x16">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        

    </head>
        <body>
          
        <div class="container-xxl">
            <div class="row">
                <div class="col-sm-2">
                </div>
  
              <div class="col-sm-8 ">
  
         <div class="container-addon">
            <div class="card">
                <form id="myForm" method="POST" action="/Addon/{{$listing->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="addnos-label">
                    <a href="/Addon" class="btn btn- primary"> <-Vissza </a>
                    </div>
                    <div id="addnos-label">
                        <h1> Modosítás:</h1>
                    </div>
                    <div id="addnos-label">
                      
                        <label>Addon címe:</label><br/>
                        <input type="text" name="title" value="{{$listing->title}}" placeholder="Addon címe">
                        @error('title')
                        <p class="text-red-500 text-xs mt-1" style="color:red">Nem töltötted ki a címet*</p>
                        @enderror
                    </div>
                    
                    <div id="addon-checkbox">
                        <label>Addon tipusa:</label><br/>
                        <label for="scales">Weakaura:</label>
                        <input type="radio" id="scales" name="tags" value="Weakaura" >

                        <label for="scales">Elvui:</label>
                        <input type="radio" id="scales" name="tags" value="Elvui" >

                        <label for="scales">Opie</label>
                        <input type="radio" id="scales" name="tags" value="Opie" >
                        @error('tags')
                        <p class="text-red-500 text-xs mt-1" style="color:red">Nem töltöttél ki a tags-et*</p>
                        @enderror
                    </div>
                    
                     
                    <div id="addnos-label">
                        <label> Kezdő logo:</label><br/>
                        <input type="file" id="files" name="logo">
                        <img id="heal-elvui" class="img-fluid" src="{{Storage::disk('s3')->temporaryUrl($listing->logo, '+2 minutes')}}" >
                        @error('logo')
                        <p class="text-red-500 text-xs mt-1" style="color:red">Nem töltöttél ki a logot*</p>
                        @enderror
                    </div>
                    
                     <div id="addnos-label">
                        <label for="comment">
                            Leírás:
                        </label><br/>
             
                        <!-- multi-line text input control -->
                        <textarea name="description" value="{{$listing->description}}" id="comment">
                        </textarea>
                   
                        
                    </div>

                    <div id="addnos-label">
                        <label for="comment">
                            Kép feltöltés az addonról (max 3 kép, nem muszály kitölteni)
                        </label><br>
                        <label for="comment">
                            Első:
                        </label>
                        <input type="file" name="imgaddons1" class="myfrm form-control">
                        <?php
                        if ($listing->imgaddons1 >= 1 ) {
                            ?>
                             <img id="heal-elvui" class="img-fluid" src="{{Storage::disk('s3')->temporaryUrl($listing->imgaddons1, '+2 minutes')}}" onerror="this.style.display='none'">
                             <?php
                           }else
                           {
                             ?>
                             <img id="heal-elvui" class="img-fluid" style="display:none;">
                             <?php
                           }
                           ?>
                        @error('imgaddons1')
                        <p class="text-red-500 text-xs mt-1" style="color:red">Képnek kell lennie* </p>
                        @enderror
                        <br>
                        <label for="comment">
                            Második:
                        </label>
                        <input type="file" name="imgaddons2" class="myfrm form-control">
                        <?php
                        if ($listing->imgaddons2 >= 1 ) {
                            ?>
                             <img id="heal-elvui" class="img-fluid" src="{{Storage::disk('s3')->temporaryUrl($listing->imgaddons2, '+2 minutes')}}" onerror="this.style.display='none'">
                             <?php
                           }else
                           {
                             ?>
                             <img id="heal-elvui" class="img-fluid" style="display:none;">
                             <?php
                           }
                           ?>
                        @error('imgaddons2')
                        <p class="text-red-500 text-xs mt-1" style="color:red">Képnek kell lennie* </p>
                        @enderror
                        <br>
                        <label for="comment">
                            Harmadik:
                        </label>
                        <input type="file" name="imgaddons3" class="myfrm form-control">
                        <?php
                        if ($listing->imgaddons3 >= 1 ) {
                            ?>
                             <img id="heal-elvui" class="img-fluid" src="{{Storage::disk('s3')->temporaryUrl($listing->imgaddons3, '+2 minutes')}}" onerror="this.style.display='none'">
                             <?php
                           }else
                           {
                             ?>
                             <img id="heal-elvui" class="img-fluid" style="display:none;">
                             <?php
                           }
                           ?>
                        @error('imgaddons3')
                        <p class="text-red-500 text-xs mt-1" style="color:red">Képnek kell lennie* </p>
                        @enderror

                    </div>


                    <div id="addnos-label">
                        <label for="comment">
                            Import:
                        </label><br/>
                        <!-- multi-line text input control -->
                        <textarea name="import" oninput="validate(this)" value="{{$listing->import}}" id="comment"
                           >
                        </textarea>
                        @error('import')
                        <p class="text-red-500 text-xs mt-1" style="color:red">Nem töltötted ki az importot* </p>
                        @enderror
                        <script>
                        function validate(input){
                        if(/^\s/.test(input.value))
                        input.value = '';
}
                        </script>

                        
                    </div>
                    <div id="addnos-label">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
                   
          
                    </div>

                </div>
            </form>
          
              </div>
              </div>
            </div>
        </div>
    </div>

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
              alert("Sikeres másolás");
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
    <div id="box">
        <p>Copyright © 2021 "DieHard" Minden jog fenntartva.</p>
        <a href="D:\Die hard web\Index\Copyright\copyright.html">
            <p id=tovabbi>További tudnivalók</p>
        </a>
    </div>
    </html>