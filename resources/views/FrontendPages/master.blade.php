@extends('layouts.primarylayout')
@push('mystyle')
<style>
    .mainhd {
        font-weight: 900;
        font-size: 35pt;
        color: #0224a1;
    }

    h4 {
        font-size: 24px;
        font-weight: 700;
        color: #333;
        margin-top: 15px;
    }

    p {
        font-size: 17px;
        color: #555;
        line-height: 1.6;
    }

    #text_p {
        font-weight: bold;
        text-align: center;
        color: #0224a1;
        margin-top: 20px;
    }

    .text_para {
        text-align: center;
        color: #555;
    }

    #about_para {
        font-size: 17px;
        text-align: center;
        color: #777;
    }

    #main_topic {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        margin-top: 15%;
        padding: 50px;
        color: white;
        font-size: 42px;
        font-weight: 800;
    }



    #p_padding {
        padding-left: 5px;
        margin-top: 2%;
    }

    .banner-area {
        position: relative;
        background: url('img/mainbg.jpeg') no-repeat center center/cover;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .banner-content {
        z-index: 2;
    }

    .overlay-bg {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
    }

    .section-gap {
        padding: 80px 0;
    }

    .title {
        margin-bottom: 50px;
    }

    .single-team {
        margin: 15px;
        text-align: center;
    }

    .single-team .thumb {
        overflow: hidden;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .single-team img {
        width: 100%;
        transition: transform 0.3s;
    }

    .single-team:hover img {
        transform: scale(1.1);
    }

    .single-team .meta-text {
        padding: 10px;
    }

    .single-team h4 {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }

    .single-team p {
        font-size: 14px;
        color: #777;
    }


</style>
@endpush

@section('content')
<!-- Start banner Area -->
<section class="banner-area" id="home">
    <div class="overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen">
            <div class="banner-content d-flex align-items-center col-lg-12 col-md-12">
                <h1 id="main_topic">
                    APIIT PULSE STUDENT BLOG <br>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start travel Area -->
<section class="travel-area section-gap" id="travel">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mainhd">ABOUT APIIT LIFE</h1>
                    <br>
                    <p id="about_para">Asia Pacific Institute of Information Technology (APIIT) offers a vibrant and dynamic community where curiosity, innovation, and a passion for global perspectives thrive. Nestled in the heart of Kandy, APIIT is not just a hub for academic excellence but a melting pot of cultures, ideas, and aspirations. With a rich tapestry of students from various corners of the world, APIIT life is a unique journey of learning, discovery, and personal growth.

                        At APIIT, every day is an opportunity to explore new horizons, both within and beyond the classroom walls. From cutting-edge technology labs and collaborative projects that spark innovative solutions, to cultural festivals and student-led initiatives that celebrate diversity, the campus is alive with energy and creativity. Whether you're engaging in thought-provoking discussions with peers, participating in exciting extracurricular activities, or contributing to meaningful community service projects, APIIT nurtures talents and dreams, preparing students not just for the careers of tomorrow, but for a lifetime of leadership and impact.</p>

                    <p id="text_p">Welcome to APIIT, where your journey to make a difference in the world begins.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End travel Area -->

<!-- Start team Area -->
<section class="team-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mainhd">MEET THE APIIT BLOGGER TEAM</h1>
                    <br>
                    <p class="text_para">Get to know the passionate individuals behind the APIIT Student Blog.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center d-flex align-items-center">
            <div class="col-lg-6 team-left">
                <p>Meet the dedicated team of APIIT students who strive to bring you engaging and insightful content through the APIIT Student Blog.</p>
                <p>Discover their stories, experiences, and perspectives on various topics ranging from academics to lifestyle, travel, fashion, and more.</p>
            </div>
            <div class="col-lg-6 team-right d-flex justify-content-center">
               
                <div class="single-team">
                    <div class="thumb">
                        <img class="img-fluid" id="img_padding" src="img/team2.jpg" alt="Lokitha Yapa" style="width: 200px; height: 130px;">
                    </div>
                    <div class="meta-text mt-30 text-center" id="p_padding">
                        <h4>Lokitha Yapa</h4>
                        <p>Senior Blogger</p>
                    </div>
                </div>
                <div class="single-team">
                    <div class="thumb">
                        <img class="img-fluid" id="img_padding" src="img/kamiz.png" alt="Lokitha Yapa" style="width: 200px; height: 130px;">
                    </div>
                    <div class="meta-text mt-30 text-center" id="p_padding">
                        <h4>Lukmaan Kamiss</h4>
                        <p>Blogger</p>
                    </div>
                </div>
                <div class="single-team">
                    <div class="thumb">
                        <img class="img-fluid" id="img_padding" src="img/Amila.png" alt="Lokitha Yapa" style="width: 140px; height: 130px;">
                    </div>
                    <div class="meta-text mt-30 text-center" id="p_padding">
                        <h4>Amila Ariyachandra</h4>
                        <p>Blogger</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End team Area -->
@endsection
