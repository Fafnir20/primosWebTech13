<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href={{ url('assets/css/header.css') }}>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    @yield('estilos') <!-- Adicionar a seção de estilos -->

</head>
<body>

    <nav>
        <div class="left">
            <div class="logo">
                <img src="assets/img/SOGA.png">
            </div>
            <div class="search_bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search EBook">
            </div>
        </div>
    
        <div class="center">
            <i class="fa-solid fa-house"></i>
            <i class="fa-solid fa-tv"></i>
            <i class="fa-solid fa-store"></i>
            <i class="fa-solid fa-users"></i>
        </div>
    
        <div class="right">
            <i class="fa-solid fa-list-ul"></i>
            <i class="fa-brands fa-facebook-messenger"></i>
            <i class="fa-solid fa-bell"></i>
            <i class="fa-solid fa-moon"></i>
            <img src="{{url('assets/img/profile.png')}}">
        </div>
    </nav>
       
        @yield('conteudo') <!-- Garantir que o nome da seção corresponda -->
    
        @yield('javaScript')
</body>
</html>
