@extends('layout')

@section('content')

<!--=================================
 login-->

<section class="login-form dark-bg page-section-ptb bg-overlay-black-30 bg" style="background: url(images/pattern/02.png) no-repeat 0 0;">
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-6">
                <div class="login-1-form register-1-form clearfix">
                    <h4 class="title divider-3 mb-3 text-white">sign up</h4>
                    <div class="section-field mb-3">
                        <div class="field-widget"> <i class="glyph-icon flaticon-user"></i>
                            <input id="Firstname" class="web" type="text" placeholder="First name">
                        </div>
                    </div>
                    <div class="section-field mb-3">
                        <div class="field-widget"> <i class="glyph-icon flaticon-user"></i>
                            <input id="Lastname" class="web" type="text" placeholder="Last name">
                        </div>
                    </div>
                    <div class="section-field mb-3">
                        <div class="field-widget"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <input id="email" class="email" type="email" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="section-field mb-3">
                        <div class="field-widget"> <i class="glyph-icon flaticon-padlock"></i>
                            <input id="Password" class="Password" type="password" placeholder="Password" name="Password">
                        </div>
                    </div>
                    <div class="section-field mb-3">
                        <div class="field-widget"> <i class="glyph-icon flaticon-padlock"></i>
                            <input id="ConfirmPassword" class="Password" type="password" placeholder="Confirm Password" name="Password">
                        </div>
                    </div>
                    <div class="section-field mb-3">
                        <div class="field-widget"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <input id="Collagename" class="web" type="text" placeholder="Collage name">
                        </div>
                    </div>
                    <div class="section-field mb-3">
                        <div class="field-widget"> <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <input id="Proffesionname" class="web" type="text" placeholder="Proffesion">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="section-field text-uppercase text-right mt-2"> <a class="button btn-lg btn-theme full-rounded animated right-icn" href="step.html"><span>next<i class="glyph-icon flaticon-hearts" aria-hidden="true"></i></span></a> </div>
                    <div class="clearfix"></div>
                    <div class="section-field mt-2 text-center text-white">
                        <p class="lead mb-0">Have an account? <a class="text-white" href="/login"> <u> Sign In!</u> </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
 login-->

@endsection