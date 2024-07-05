@extends('templates.template')

@section('title', 'Profile')

@section('estilos')
<link rel="stylesheet" href="{{ url('assets/css/profile.css') }}">    
@endsection

<div class="profile-container">
    <img src="{{ url('assets/img/default.png') }}" class="cover-img">
    <div class="profile-details">
        <div class="pd-left">
            <div class="pd-row">
                <img src="{{ url('assets/img/inacioRir.jpeg') }}" class="pd-image">
                <div>
                    <h3>J Inacio</h3>
                    <p>120 friends - 20 mutual</p>
                    <img src="{{ url('assets/img/inacioYoga.jpeg') }}">
                    <img src="{{ url('assets/img/inacioProg.jpeg') }}">
                    <img src="{{ url('assets/img/inacioRir.jpeg') }}">
                    <img src="{{ url('assets/img/story_5.jpg') }}">
                </div>
            </div>
        </div>
        <div class="pd-right">
            <button type="button"><img src="{{ url('assets/img/add-friends.png') }}">Friend</button>
            <button type="button"><img src="{{ url('assets/img/message.png') }}">Message</button><br>
            <a href=""> <img src="{{url('assets/img/settings.png')}}"></a>
        </div>
    </div>

    <div class="profile-info">
        <div class="info-col">

            <div class="profile-intro">
                <h3>Intro</h3>
                <p class="intro-text">Hooby's</p>
                <p class="intro-text">Interesses</p>
                <hr>
                <ul>
                    <li><img src="{{ url('assets/img/profile-job.png') }}">Director at 99media Ltd</li>
                    <li><img src="{{ url('assets/img/profile-study.png') }}">Studied at amity</li>
                    <li><img src="{{ url('assets/img/profile-study.png') }}">Went to DPS</li>
                    <li><img src="{{ url('assets/img/profile-home.png') }}">Lives in...</li>
                    <li><img src="{{ url('assets/img/profile-location.png') }}">From Bangalore, India</li>
                </ul>
            </div>

            <div class="profile-intro">
                <div class="title-box">
                    <h3>Photos</h3>
                    <a href="">All Photos</a>
                </div>

                <div class="photo-box">
                    <div><img src="{{ url('assets/img/inacioYoga.jpeg') }}"></div>
                    <div><img src="{{ url('assets/img/inacioProg.jpeg') }}"></div>
                    <div><img src="{{ url('assets/img/inacioRir.jpeg') }}"></div>
                    <div><img src="{{ url('assets/img/story_5.jpg') }}"></div>
                    <div><img src="{{ url('assets/img/story_3.jpg') }}"></div>
                    <div><img src="{{ url('assets/img/story_1.png') }}"></div>
                </div>
            </div>

            <div class="profile-intro">
                <div class="title-box">
                    <h3>Friends</h3>
                    <a href="">All Friends</a>
                </div>
                <p>120 (10 mutual)</p>
                <div class="friends-box">
                  @if($amigos)
                  @foreach ($amigos as $amigo)
                      <div class="friend-photo">
                          <img src="{{ asset('storage/' . $amigo->foto) }}" alt="{{ $amigo->nome }}">
                          <p>{{ $amigo->nome }}</p>
                      </div>
                  @endforeach
              @endif
                </div>
            </div>
            

        </div>
        <div class="post-col">
            <div class="write-post-container">
            </div>
        </div>
    </div>
</div>

<script src="js/app.js"></script>
