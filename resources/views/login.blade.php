<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{url('assets/css/login.css')}}">
         
    <title>Login & Registration Form</title> 
</head>
<body>
    
    <div class="container">
        <div class="forms">
            <div class="form login">

                @if($errors->any())
                <div>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <span class="title">Login</span>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="input-field">
                    <input type="text" placeholder="Enter your email" id="email" name="email" required>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="password" placeholder="Enter your password" id="password" name="password" required> <!-- Campo de senha -->
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>
                <div class="checkbox-text">
                
                    <a href="#" class="text">Forgot password?</a>
                </div>
                <div class="input-field button">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="login-signup">
                <span class="text">Not a member?
                    <a href="#" class="text signup-link">Signup Now</a>
                </span>
            </div>
            </div>
            <!-- Registration Form -->
            <div class="form signup">

                  @if(session('success'))
                        <div>{{ session('success') }}</div>
                  @endif

                <span class="title">Registration</span>
                <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" id="nome" name="nome" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" id="email" name="email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your Biografy" id="biografia" name="biografia" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your Hobby's" id="interesses" name="interesses" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="file" placeholder="Enter your foto" id="foto" name="foto" required>
                        <i class="uil uil-user"></i>
                    </div>

                    <div class="input-field">
                        <input type="password" class="password" placeholder="Enter your password" id="password" name="password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Signup">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="#" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
     <script src="{{url('assets/js/login.js')}}"></script> 
</body>
</html>