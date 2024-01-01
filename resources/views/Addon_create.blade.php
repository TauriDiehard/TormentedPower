<!DOCTYPE html>
<html lang="HU">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/create_addon.css') }}">
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
                <form id="myForm" method="POST" action="{{asset('/Addon/store')}}" enctype="multipart/form-data">
                    @csrf
                    <div id="addnos-label">
                    <a href="/Addon" style="background-color:green !important;" class="btn btn- primary"> <-Vissza </a>
                    </div>
                    <div id="addnos-label">
                      

                        <div style="margin-left:-30px;" class="page">
                            <div class="field field_v1" style="margin-top:40px;">
                                
                                <input id="first-name" class="field__input" name="title" value="{{old('title')}}" placeholder="e.g. 7.3.5  Arms Warrior WA...">
                                <span class="field__label-wrap" aria-hidden="true">
                                <span class="field__label">Title*</span>
                                </span>
                            </div>
                        </div>
                        @error('title')
                        <p class="text-red-500 text-xs mt-1" style="color:red">You did not fill the title*</p>
                        @enderror
                    </div>
                    
                    <div id="addon-checkbox">
                        <label>Addon's type*:</label><br/>

                        <label for="scales">Weakaura:</label>
                        <input type="radio" id="scales" name="tags" value="{{'Weakaura'}}" style="margin-right:30px;">

                        <label for="scales" >Elvui:</label>
                        <input type="radio" id="scales" name="tags" value="{{'Elvui'}}" style="margin-right:30px;" >

                        <label for="scales">Opie:</label>
                        <input type="radio" id="scales" name="tags" value="{{'Opie'}}" >
                        @error('tags')
                        <p class="text-red-500 text-xs mt-1" style="color:red">You did not fill the tag*</p>
                        @enderror
                    </div>
                    
                     
                    <div id="addnos-label">
                    <label for="images" class="drop-container">
                    <span class="drop-title" style="color:white;">Startup logo (One IMG)</span>
                    <span class="drop-title" style="color:white; "><em>Drop file here</em></span>

                        <input type="file"  id="images" accept="image/*" name="logo" >
                        @error('logo')
                        <p class="text-red-500 text-xs mt-1" style="color:red">You did not fill the logo*</p>
                        @enderror
                        </label>
                    </div>
                    
                     <div id="addnos-label">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
<textarea id="message" name="description"  rows="4" class="textarea is-success" style="border:3px solid green; background-color:transparent; color:white;" placeholder="Write your thoughts here..." >
</textarea>

                    </div>
                    <div id="addnos-label">
                    <label for="images" class="drop-container">
                    <span class="drop-title" style="color:white;">Addons imgs (multy) (Not requried)</span>
                    <span class="drop-title" style="color:white; "><em>Drop files here</em></span>

                        <input type="file"  id="images" accept="image/*" name="imgaddons[]" multiple>
                       
                        </label>
                    </div>

                        <div id="addnos-label">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description*:</label>
        <textarea id="message" name="import" oninput="validate(this)" value="{{old('import')}}"  rows="4" class="textarea is-success" style="border:3px solid green; background-color:transparent; color:white;" placeholder="Write your thoughts here..." >
        </textarea>

                        @error('import')
                        <p class="text-red-500 text-xs mt-1" style="color:red">You did not fill the Import* </p>
                        @enderror
                        <script>
                        function validate(input){
                        if(/^\s/.test(input.value))
                        input.value = '';
}
                        </script>

                        
                    </div>
                    <div id="addnos-label">
                    <input type="submit" style="background-color:green !important;" class="btn btn-success" value="Submit">
                </div>
                   
          
                    </div>

                </div>
            </form>
          
              </div>
              </div>
            </div>
        </div>
    </div>
    <button class="scrollToTopBtn"></button>
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
   
    </html>