<link rel="stylesheet" href={{ url('assets/css/leftSide.css') }}>

<div class="left">

    <div class="img">
        <img src="{{url('assets/img/profile.png')}}">
        <a href="{{ route('profile') }}">John Deo</a>
    </div>

    <div class="img">
        <img src="{{url('assets/img/friend.png')}}">
        <p>Friends</p>
    </div>

    <div class="img">
        <img src="{{url('assets/img/group.png')}}">
        <p>Grupos</p>
    </div>

    <hr>

    <h2>Access Fast</h2>
    <p class="edit">Edit</p>

    <div class="shortcuts">
        <img src="{{url('assets/img/shortcuts_4.png')}}">
        <p>Clubes</p>
    </div>

    <div class="shortcuts">
        <img src="{{url('assets/img/shortcuts_5.webp')}}">
        <p>Comunidades</p>
    </div>

    <div class="shortcuts">
        <img src="{{url('assets/img/down_arrow.png')}}">
        <p>See more</p>
    </div>

</div>

@yield('leftSide')