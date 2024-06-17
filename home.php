<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <!--meta-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--title-->
    <title>ColdPlay | Music of the Spheres</title>
    
    <!--bootstrap CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    
    <!--custom CSS-->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .btn-access {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        body {
            margin: 0;
            padding: 0;
        }
        .chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }
        .chat-button img {
            width: 120px;
            height: 120px;
            cursor: pointer;
    </style>

    <script>
        function openChatWindow() {
            window.open('index.php', '_blank'); // Opens the chat window in a new tab
        }
    </script>
</head>

<body id="top">
    <nav class="navbar navbar-default navbar-static-top">
        <!--navbar-->
        <div class="container-fluid">
            <div class="navbar-header">
                <div id="mobile-nav" class="navbar-brand visible-xs active"><a href="index.html">The ColdPlay</a></div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#band">Band</a></li>
                    <li><a href="#gigs">Gigs</a></li>
                    <li><a href="#music">Music</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#video">Video</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid callout-container">
        <div class="opaque-overlay">&nbsp;</div>
        <!-- Callout -->
        <div class="row">
            <div class="col-xs-12">
                <section class="callout jumbotron text-center">
                    <br><br>
                    <img class=" img-logo center-block" alt="logo" src=" ./images/c11.png" />
                    <br><br>
                    <h2 class="lead music-text">ColdPlay: Greatest Hits </h2>
                    <hr class="block-divider block-divider--white">
                    <p class="lead music-text">Available December 27th</p> <br>
                    <p class="text-center">
                        <a class="music-service lead" href="https://www.amazon.com/stores/ColdplayOfficial/ColdplayOfficial/page/BEABDE78-7C18-4B8A-A749-A5A16E98B1AE" target="_blank">Amazon</a>
                        <a class="music-service lead" href="https://music.apple.com/us/album/x-y/1123076757" target="_blank">iTunes</a>
                        <a class="music-service lead" href="https://open.spotify.com/artist/4gzpq5DPGxSnKTe4SA8HAU" target="_blank">Spotify</a>


                    </p>
                </section>
            </div>
        </div>
        <!-- /.callout -->
    </div>
    <div class="container-wrapper">
        <div class="container band-container content-container">
            <!-- Band -->
            <section id="band">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-header">
                            <h2 class="text-title">Band</h2>
                            <hr class="block-divider block-divider--black">
                            <p class=" text-muted">About our band</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p class="section-text">Coldplay is a British rock band formed in London in 1996. The group is known for its distinctive sound, which blends elements of alternative rock, pop, electronic, and post-Britpop genres. Over the years, Coldplay has become one of the world's best-selling music artists, with numerous hit singles and critically acclaimed albums. </p>
                        <br>
                    </div>
                    <br>
                    <div class="col-xs-12 col-md-6">
                        <div class="media band-member">
                            <div class="media-left">
                                <img src=" ./images/Chris Martin.jpg" alt="Davy Jones" class="img-circle media-object" height=100 width=100>
                            </div>
                            <div class="media-body">
                                <blockquote class="quote">
                                    <p> "I just wanted to make music I was proud of, to put on a show that I would love to go to."</p>
                                    <footer>Chris Martin - <cite title="Twitter">Lead Vocals</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="media band-member ">
                            <div class="media-left">
                                <img src=" ./images/Guy Berryman.jpg" alt="Peter Tork" class="img-circle media-object" height=100 width=100>
                            </div>
                            <div class="media-body">
                                <blockquote class="quote">
                                    <p> "Music is a great healer, it's also a great equalizer. It doesn't matter what culture, what background, what nationality, what religious background you come from; you listen to music and it makes you feel good."</p>
                                    <footer>Guy Berryman - <cite title="Twitter">Bass Guitar</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="media band-member">
                            <div class="media-left ">
                                <img src=" ./images/Jonny Buckland .jpg" alt="Michael Nesmith" class="img-circle media-object" height=100 width=100>
                            </div>
                            <div class="media-body">
                                <blockquote class="quote">
                                    <p> "I think it's important to keep pushing yourself in music."</p>
                                    <footer>Jonny Buckland - <cite title="Twitter">Lead Guitar</cite></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="media band-member">
                            <div class="media-left">
                                <img src=" ./images/Will Champion .jpg" alt="Mickey Dolenz" class="img-circle media-object" height=100 width=100>
                            </div>
                            <div class="media-body">
                                <blockquote class="quote">
                                    <p> "It's impossible to completely define what makes music good. It is down to the individual."</p>
                                    <footer>Will Champion- <cite title="Twitter">Percussion, Drums</cite></footer>
                                </blockquote>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.band -->
    </div>
   <div class="container-wrapper gigs-container">
    <div class="gig-opaque-overlay">&nbsp;</div>
    <div class="container-fluid content-container">
        <!-- Gigs -->
        <section id="gigs">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <h2 class="text-title white-title">Gigs</h2>
                        <hr class="block-divider block-divider--white">
                        <p class="gigs-text text-muted">See us live in action!</p>
                        <br>
                    </div>
                </div>
            </div>
            <div class="row gigs-section">
                <div class="col-xs-12 col-md-12">
                    <div class="media">
                        <div class="gigs-table text-center">
                            <table class="table gigs-table">
                                <thead>
                                </thead>
                                <tbody class="text-center">
                                    <tr class="visible-sm visible-md visible-lg">
                                        <td class="soldout">28/12/17</td>
                                        <td class="soldout">Brooklyn, New York</td>
                                        <td class="soldout">Beacon Theatre</td>
                                        <td class="dead-link soldout">
                                            <h4><span class="label label-danger">Sold Out!</span></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>04/05/18</td>
                                        <td>Los Angeles, California</td>
                                        <td>The Roxy</td>
                                        <td><a href="#">Buy Tickets</a></td>
                                    </tr>
                                    <tr>
                                        <td>08/06/18</td>
                                        <td>Chicago, Illinois</td>
                                        <td>House of Blues</td>
                                        <td><a href="#">Buy Tickets</a></td>
                                    </tr>
                                    <tr>
                                        <td>19/09/18</td>
                                        <td>Toronto, Canada</td>
                                        <td>Massey Hall</td>
                                        <td><a href="#">Buy Tickets</a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                        <div class="booking-container text-center">
                            <a href="https://www.ticketmaster.com/coldplay-tickets/artist/806431" class="btn btn-info btn-lg">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.gigs -->
    </div>
</div>

    <div class="container-wrapper music-container">
        <div class="container-fluid  content-container">
            <!-- Music -->
            <section id="music">
                <div class="row">
                    <br>
                    <div class="col-xs-12">
                        <div class="page-header">
                            <h2 class="text-title">Music</h2>
                            <hr class="block-divider block-divider--black">
                            <p class=" text-muted"> A selection of our most popular songs</p>
                        </div>
                    </div>
                </div>
               <div class="row audio-section">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="media">
            <div class="audio-player text-center">
                <h4 class="song-title text-center">Coldplay - A Sky Full Of Stars</h4>
                <br>
                <audio class="song" controls>
                    <source src="./music/Coldplay - A Sky Full Of Stars (Official Video) (320kbps).mp3" type="audio/mp3">
                </audio>
            </div>
        </div>
        <br>
        <p class="section-text">"A Sky Full of Stars" is a departure from Coldplay's typical sound, featuring a more electronic and dance-oriented style. The song was produced in collaboration with EDM artist Avicii and incorporates pulsating beats, euphoric synths, and Martin's soaring vocals. Lyrically, "A Sky Full of Stars" explores themes of love, longing, and the beauty of the universe. The title evokes a sense of wonder and awe, reflecting the idea of finding love and light amidst the darkness of the night sky. The song's energetic and uplifting vibe makes it a popular choice for both dance floors and concert arenas.</p>
        <br>
    </div>
</div>
<div class="row audio-section">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="media">
            <div class="audio-player text-center">
                <h4 class="song-title text-center">Coldplay - Paradise</h4>
                <br>
                <audio class="song" controls>
                    <source src="./music/Coldplay - Paradise (Official Video) (320kbps).mp3" type="audio/mp3">
                </audio>
            </div>
        </div>
        <br>
        <p class="section-text">"Paradise" is a powerful and emotive song that blends anthemic rock with electronic elements. The song features driving rhythms, lush orchestration, and Martin's impassioned vocals. Lyrically, "Paradise" tells the story of a young girl's journey to find her own paradise and escape from the struggles of everyday life. The imagery in the lyrics paints a vivid picture of her dreams and aspirations, as she seeks refuge in a world of fantasy and imagination. The song's chorus, with its soaring melody and anthemic chants of "Para-para-paradise," captures the spirit of hope and resilience in the face of adversity.</p>
        <br>
    </div>
</div>
<div class="row audio-section">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="media">
            <div class="audio-player text-center">
                <h4 class="song-title text-center">Coldplay - Viva La Vida</h4>
                <br>
                <audio class="song" controls>
                    <source src="./music/Coldplay - Viva La Vida (Official Video) (320kbps).mp3" type="audio/mp3">
                </audio>
            </div>
        </div>
        <br>
        <p class="section-text">"Viva la Vida" is one of Coldplay's most iconic songs, known for its grandeur and anthemic quality. The title, which translates to "Long Live Life" in Spanish, reflects themes of power, revolution, and redemption. The song features lush instrumentation, including strings and marching band-style drums, creating a dramatic and cinematic atmosphere. Lyrically, it explores the downfall of a once-powerful ruler and his reflection on his lost kingdom. Despite its darker themes, the song ultimately carries a message of hope and resilience.</p>
        <br>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var audioPlayers = document.querySelectorAll(".audio-player audio");

        audioPlayers.forEach(function (player) {
            player.addEventListener("play", function (event) {
                var currentAudio = event.target;

                // Pause other audio elements
                audioPlayers.forEach(function (otherPlayer) {
                    if (otherPlayer !== currentAudio) {
                        otherPlayer.pause();
                    }
                });
            });
        });
    });
</script>
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <div class="media">
                            <div class="audio-player text-center">
                                <h4 class="song-title text-center"> Coldplay - Yellow</h4>
                                <br>
                                <audio class="song" controls>
                                    <source src=" ./music/Coldplay - Yellow (Official Video) (320kbps).mp3" type="audio/mp3">
                                </audio>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <p class="section-text">  "Yellow" is a quintessential Coldplay song that has become a classic in the alternative rock genre. The song is characterized by its dreamy guitar riff, melodic vocals by Chris Martin, and heartfelt lyrics. Lyrically, "Yellow" is a love song with themes of devotion and admiration. The color yellow is used as a metaphor for brightness, warmth, and positivity, symbolizing the intense emotions of love and longing. The song's uplifting melody and heartfelt lyrics have made it a favorite among fans and a staple of Coldplay's discography.</p>
                    </div>
                </div>
            </section>
            <!-- /.music -->
        </div>
   <div class="container-wrapper gallery-container">
    <div class="opaque-overlay">&nbsp;</div>
    <div class="container-fluid content-container">
        <section id="gallery">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <h2 class="text-title white-title">Gallery</h2>
                        <hr class="block-divider block-divider--white">
                        <p id="gallery-text" class="text-muted">See our gallery</p>
                        <br>
                    </div>
                </div>
            </div>
            <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#imageCarousel" data-slide-to="1"></li>
                    <li data-target="#imageCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img class="center-block gallery-img" src="./images/c1.jpg" alt="The Monkees">
                        <div class="carousel-caption">
                            <h3>More Greatest ColdPlay</h3>
                        </div>
                    </div>
                    <div class="item">
                        <img class="center-block gallery-img" src="./images/c71.jpg" alt="album cover">
                        <div class="carousel-caption">
                            <h3>The Very Best of The ColdPlay</h3>
                        </div>
                    </div>
                    <div class="item">
                        <img class="center-block gallery-img" src="./images/c3.jpg" alt="New York">
                        <div class="carousel-caption">
                            <h3>The ColdPlay</h3>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <a class="left carousel-control" href="#imageCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#imageCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
    </div>
</div>

<div class="container-wrapper video-container">
    <div class="container-fluid content-container">
        <!-- Video -->
        <section id="video">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <h2 class="text-title white-title">Video</h2>
                        <hr class="block-divider block-divider--white">
                        <p id="video-text" class="text-muted">Watch our music videos</p>
                        <br>
                    </div>
                </div>
            </div>
            <div id="videoCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#videoCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#videoCarousel" data-slide-to="1"></li>
                    <li data-target="#videoCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <!-- First Video -->
                    <div class="item active">
                        <div class="row">
                            <div class="col-xs-12">
                                <div>
                                    <video class="video-player" controls preload="metadata">
                                        <source src="./video/Coldplay X BTS - My Universe (Official Video).mp4#t=0.5" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Second Video -->
                    <div class="item">
                        <div class="row">
                            <div class="col-xs-12">
                                <div>
                                    <video class="video-player" controls preload="metadata">
                                        <source src="./video/Coldplay - Adventure Of A Lifetime (Official Video).mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Third Video -->
                    <div class="item">
                        <div class="row">
                            <div class="col-xs-12">
                                <div>
                                    <video class="video-player" controls preload="metadata">
                                        <source src="./video/Coldplay - Hymn For The Weekend (Official Video).mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br><br>
                <a class="left carousel-control" href="#videoCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#videoCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <!-- /.video -->
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var videoPlayers = document.querySelectorAll(".video-player");

        videoPlayers.forEach(function (player) {
            player.addEventListener("play", function (event) {
                var currentVideo = event.target;

                // Pause other video elements
                videoPlayers.forEach(function (otherPlayer) {
                    if (otherPlayer !== currentVideo) {
                        otherPlayer.pause();
                    }
                });
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var audioPlayers = document.querySelectorAll(".audio-player audio");
        var videoPlayers = document.querySelectorAll(".video-player");

        audioPlayers.forEach(function (player) {
            player.addEventListener("play", function (event) {
                var currentAudio = event.target;

                // Pause other audio elements
                audioPlayers.forEach(function (otherPlayer) {
                    if (otherPlayer !== currentAudio) {
                        otherPlayer.pause();
                    }
                });

                // Pause video elements
                videoPlayers.forEach(function (video) {
                    video.pause();
                });
            });
        });

        videoPlayers.forEach(function (player) {
            player.addEventListener("play", function (event) {
                var currentVideo = event.target;

                // Pause other video elements
                videoPlayers.forEach(function (otherPlayer) {
                    if (otherPlayer !== currentVideo) {
                        otherPlayer.pause();
                    }
                });

                // Pause audio elements
                audioPlayers.forEach(function (audio) {
                    audio.pause();
                });
            });
        });
    });
</script>

</div>

    </div>
    <div class="container-wrapper social-container">
        <footer>
            <div class="container-fluid content-container ">
                <!-- Social -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-header">
                            <h2 class="text-title social-title">Follow The ColdPlay</h2>
                            <hr class="block-divider block-divider--black">
                            <br>
                        <div>
    <ul class="social-list list-inline">
        <li>
            <a href="https://www.facebook.com/coldplay" target="_blank"><i class="fa fa-facebook"></i></a>
        </li>
        <li>
            <a href="https://x.com/coldplay" target="_blank"><i class="fa fa-twitter"></i></a>
        </li>
        <li>
            <a href="https://www.youtube.com/channel/UCDPM_n1atn2ijUwHd0NNRQw" target="_blank"><i class="fa fa-youtube"></i></a>
        </li>
    </ul>
</div>
                        <br
                        <p class="text-muted text-center">Created: By Darryl Pabulario & Salm Virnel Lig-ang. </p>
                        <br>
                        <p class="text-muted text-center">Copyright © 2024 all rights reserved </p>
                        <br>
                        <p> <a id="awts" href="privacy_policy.html">Privacy and policy <a/></p> 
                        <p><a id="fuck" href="Disclaimer.html">Disclaimer</a></p>
                        <style>
                            #fuck{
                                color: #615EFC;
                                text-decoration: none;
                                font-size: 20px;
                                font-weight: 500;
                                font-style: italic;
                            }
                        </style>
                        <style>
                            #awts{
                                color: #615EFC;
                                text-decoration: none;
                                font-size: 20px;
                                font-weight: 500;
                                font-style: italic;
                            }
                        </style>
                        <br>
                        <p class="text-center"><a id="back" href="#top">Back to top</a></p>
                    </div>
                </div>
                <!-- /.social -->
            </div>
        </footer>
    </div>
    <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <!-- Modal -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Book The ColdPLay!</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Full Name*</label>
                            <input type="text" class="form-control" id="name" placeholder="Full Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address*</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" required>
                            <p class="help-block">We'll never share your email address with anyone</p>
                        </div>
                        <div class="form-group">
                            <label for="event">Event Type*</label>
                            <select class="form-control" id="event" required>
                                        <option disabled value="" selected hidden>Select an event type</option>
                                        <option>Wedding</option>
                                        <option>Private Function</option>
                                        <option>Christmas Party</option>
                                        <option>Corporate Event</option>
                                        <option>Funeral</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date*</label>
                            <input type="date" class="form-control" id="date" required>
                            <p class="help-block">* Required</p>
                        </div>
                        <div class="text-center">
                            <input class="btn btn-success" type="submit" name="btnADD" id="btnADD" value="Submit Booking" onclick="disableButton(this)"/>
                        </div> <br>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Button -->
    
    <div class="chat-button">
        <img src="./images/chat1.png" alt="Community Chat" onclick="openChatWindow()">
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
        // Open the Modal
        function openModal() {
            document.getElementById('gallery').style.display = "block";
        }

        // Close the Modal
        function closeModal() {
            document.getElementById('gallery').style.display = "none";
        }
 
        function disableButton(button) {
            button.disabled = true;
            button.value = "Booking Sent"
            alert("Booking Sent");
            button.form.submit();
        }
    </script>
    <script>
        // Open the login modal
        function openLoginModal() {
            $('#loginModal').modal('show');
        }

        // Open the sign-up modal
        function openSignupModal() {
            $('#signupModal').modal('show');
        }

        // Close the Modal
        function closeModal() {
            $('.modal').modal('hide');
        }
    </script>
    <script>
    $(document).ready(function() {
        $('#signupModal').modal('show');
    });
</script>

<script>
    // Open the sign-up modal
    function openSignupModal() {
        $('#signupModal').modal('show');
    }
</script>
</body>

</html>
