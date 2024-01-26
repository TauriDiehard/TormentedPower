<!DOCTYPE html>
<head>
  <title>Tormented Power | Kezelni</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/Addon.css') }}">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
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
                            <a href="/Addon">Addons</a>
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
        <script src="{{asset('Index_js/mainjava.js')}}"></script>
        <div class="container-xxl">
            <div class="row">
              <div class="col-sm-3">
              </div>
            <div class="col-sm-6">
                <div class="container-addon">
                    <a href="/Addon" class="btn btn- primary" style="margin-bottom: 5%; width:130px;height:40px; text-align:middle; font-size:20px"> <-Vissza </a>
                        
                            <table class="w-full table-auto rounded-sm">
                              <tbody>
                                @unless($listings->isEmpty())
                                @foreach($listings as $listing)
                                <tr class="border-white-300">
                                  <td class="px-4 py-8 border-t border-b border-gray-300 text-lg" style="font-size: 30px;">
                                    <a href="/Addon/{{$listing->id}}"> {{$listing->title}} </a>
                                  </td>
                                  <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <a href="/Addon/{{$listing->id}}/edit"class="btn btn- primary"><i class="fa fa-pencil" style="font-size:40px;color:white;"></i></a>
                                  </td>
                                  <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <form method="POST" action="/Addon/{{$listing->id}}">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn- primary" ><i class="fa fa-trash" style="font-size:40px;color:white;"></i></button>
                                    </form>
                                  </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="border-gray-300">
                                  <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <p class="text-center">Még nincs listád</p>
                                  </td>
                                </tr>
                                @endunless
                        
                              </tbody>
                            </table>
                </div>
            </div>
        </div>
            <div class="col-sm-3">
            </div>

        </body>
        </html>