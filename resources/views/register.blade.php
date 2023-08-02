<!DOCTYPE html>
<head>
  <title>Tormented Power | Register</title>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="register_css/style.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>
        <body>
          <nav>
            <div class="logo-tormented">
                <img id="Tormenetedpowerlogo" src="{{asset('Index_kepek/Tormenetedpowerlogo.png')}}">
            </div>
                <div class="d-flex justify-content-between" >
                    <ul class="nav-links">
    
                        <li id="kezdo-mobile">
                            <a href="/" id="kezdo">Homepage</a>
                        </li>
                        
                        <li  id="info-mobile">
                            <a href="Info" id="info" >Logs</a>
                        </li>
    
                        <li id="addon-mobile">
                            <a href="Addon">Addons</a>
                        </li>
                       
                    
                    </ul>
                </div>
    
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <script src="Index_js/mainjava.js"></script>
        
        <div class="main">
            <!-- Sign up form -->
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Registration</h2>
                            <form method="POST" action="/users" >
                                @csrf
                                <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="name" value="{{old('name')}}" id="name" placeholder="Name"/>
                                    @error('name')
                                    <p class="text-red-500 text-xs mt-1" style="color:red">not filled in (Min 5 characters) or this username is already in use*</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email"><i class="zmdi zmdi-email"></i></label>
                                    <input type="email" name="email" value="{{old('email')}}" id="email" placeholder="Email"/>
                                    @error('email')
                                    <p class="text-red-500 text-xs mt-1" style="color:red">
is not filled in or must be an email and is used* </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="password" id="pass" placeholder="Password"/>
                                    @error('password')
                                    <p class="text-red-500 text-xs mt-1" style="color:red">not filled in (Min 6 characters)* </p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"></i></label>
                                    <input type="password" name="password_confirmation" id="re_pass" placeholder="password confirmation"/>
                                    @error('password_confirmation')
                                    <p class="text-red-500 text-xs mt-1" style="color:red">not filled in or must be the same* </p>
                                    @enderror
                                </div>
                               
                                <div class="form-group form-button">
                                    <input type="submit" id="signup" class="form-submit" value="Registration"/>
                                </div>
                            </form>
                        </div>
                        <div class="signup-image">
                            <figure><img src="{{asset('Index_kepek/register_kep.png')}}" alt="sing up image"></figure>
                            <a href="/login" class="signup-image-link">
I already have an account!</a>
                        </div>
                    </div>
                </div>
            </section>

    </body>
    </html>