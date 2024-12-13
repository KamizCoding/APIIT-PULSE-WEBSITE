@extends('layouts.primarylayout')
@push('mystyle')
<style>
    body {
        font-family: 'Roboto', sans-serif;
        color: #333;
    }

    .top-section-area {
        background: #2e2972;
        color: white;
        padding: 50px 0;
    }

    .top-section-area h1 {
        font-size: 36px;
        margin-bottom: 20px;
        font-weight: 700;
        text-align: left;
    }

    .top-section-area ul {
        list-style: none;
        padding: 0;
    }

    .top-section-area ul li {
        display: inline;
        font-size: 16px;
        margin-right: 10px;
    }

    .top-section-area ul li a {
        color: white;
        text-decoration: none;
    }

    .top-section-area ul li span {
        margin-left: 5px;
    }

    .contact-info__icon {
        font-size: 24px;
        color: #2e2972;
        margin-right: 15px;
    }

    .contact-info h3, .contact-info p {
        margin: 0;
        color: #333;
    }

    .contact-info a {
        color: #333;
    }

    .contact-info a:hover {
        color: #2e2972;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px 15px;
        font-size: 16px;
        color: #333;
        margin-bottom: 15px;
    }

    .form-control:focus {
        border-color: #2e2972;
        box-shadow: none;
    }

    .button-contactForm {
        background: #2e2972;
        border: none;
        color: white;
        padding: 10px 30px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .button-contactForm:hover {
        background: #4d47a5;
    }

    .section-gap {
        padding: 60px 0;
    }

    .section-margin {
        margin: 40px 0;
    }
</style>
@endpush

@section('content')
@include('sweetalert::alert')

<!-- Start top-section Area -->
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
                <h1 class="text-white mb-20">Contact Us</h1>
                <ul>
                    <li><a href="/">Home</a><span class="lnr lnr-arrow-right"></span></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End top-section Area -->

<br><br>

<!-- Start contact section -->
<section class="section-margin--small section-margin">
    <div class="container">
        <div class="d-none d-sm-block mb-5 pb-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6460981584323!2d80.61542806996525!3d7.281047476650326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3673f5e22ab3b%3A0xcbaef11262bec73!2sAPIIT%20Kandy%20Campus!5e0!3m2!1sen!2slk!4v1711987591153!5m2!1sen!2slk" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="row">
            <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fas fa-home"></i></span>
                    <div class="media-body">
                        <h3>APIIT Kandy Campus</h3>
                        <p style="color: black">542, Peradeniya Road, Kandy</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fas fa-phone"></i></span>
                    <div class="media-body">
                        <h3><a style="color: black" href="tel:454545654">+94 817 818 181</a></h3>
                    </div>
                </div>
                <br>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fas fa-globe"></i></span>
                    <div class="media-body">
                        <h3><a style="color: black" href="mailto:support@colorlib.com">info@apiit.lk</a></h3>
                        <p style="color: black">Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <form action="{{ url('contact_us') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input class="form-control" name="user_name" id="name" type="text" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="user_email" id="email" type="email" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center text-md-right mt-3">
                        <button type="submit" class="button button--active button-contactForm">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection
