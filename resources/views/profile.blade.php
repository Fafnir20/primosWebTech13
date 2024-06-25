@extends('templates.template')

@section('title', 'Profile')

@section('estilos')
<link rel="stylesheet" href="{{url('assets/css/profile.css')}}">    
@endsection

<div class="profile-container">
    <img src="img/cover.png" class="cover-img">
    <div class="profile-details">
      <div class="pd-left">
        <div class="pd-row">
          <img src="img/profile.png" class="pd-image">
          <div>
            <h3>Jack Nicholson</h3>
            <p>120 friends - 20 mutual</p>
            <img src="img/member-1.png">
            <img src="img/member-2.png">
            <img src="img/member-3.png">
            <img src="img/member-4.png">
          </div>
        </div>
      </div>
      <div class="pd-right">

        <button type="button"><img src="img/add-friends.png">Friend</button>
        <button type="button"><img src="img/message.png">Message</button><br>
        <a href=""><img src="img/more.png"></a>
      </div>
    </div>

    <div class="profile-info">
      <div class="info-col">

        <div class="profile-intro">
          <h3>Intro</h3>
          <p class="intro-text">Believe in yourself and you can do unbelievable things.
          <img src="img/feeling.png"></p>
          <hr>
          <ul>
            <li><img src="img/profile-job.png">Director at 99media Ltd</li>
            <li><img src="img/profile-study.png">Studied at amity</li>
            <li><img src="img/profile-study.png">Went to DPS</li>
            <li><img src="img/profile-home.png">Lives in...</li>
            <li><img src="img/profile-location.png">From Bangalore, India</li>
          </ul>
        </div>


        <div class="profile-intro">
          <div class="title-box">
            <h3>Photos</h3>
            <a href="">All Photos</a>
          </div>

          <div class="photo-box">
            <div><img src="img/photo1.png"></div>
            <div><img src="img/photo2.png"></div>
            <div><img src="img/photo3.png"></div>
            <div><img src="img/photo4.png"></div>
            <div><img src="img/photo5.png"></div>
            <div><img src="img/photo6.png"></div>
          </div>
        </div>

        <div class="profile-intro">
          <div class="title-box">
            <h3>Friends</h3>
            <a href="">All Friends</a>
          </div>
          <p>120 (10 mutual)</p>
          <div class="friends-box">
            <div><img src="img/member-1.png"><p>Joseph N</p></div>
            <div><img src="img/member-2.png"><p>Nathan X</p></div>
            <div><img src="img/member-3.png"><p>George K</p></div>
            <div><img src="img/member-4.png"><p>Francis J</p></div>
            <div><img src="img/member-5.png"><p>Anthony E</p></div>
            <div><img src="img/member-6.png"><p>Michael</p></div>
            <div><img src="img/member-7.png"><p>Edward M</p></div>
            <div><img src="img/member-8.png"><p>Bradon C</p></div>
            <div><img src="img/member-9.png"><p>James Doe</p></div>
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