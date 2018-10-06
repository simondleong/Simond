@extends('layout')

@section('content')

<!--=================================
 login-->

<section class="login-form dark-bg page-section-ptb bg-overlay-black-30 bg" style="background: url(images/pattern/02.png) no-repeat 0 0;">
    <div class="container">

        @if ($errors->any())
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-10 col-xs-10 mb-sm-3 alert alert-danger text-center">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            </div>
        @endif

        @if (session()->has('flash_error'))
            <div class="row justify-content-center">
                <div class="col-md-6 alert alert-danger text-center">
                    {{ session()->get('flash_error') }}
                </div>
            </div>
        @endif

        <div class="row  justify-content-center">
            <div class="col-md-6">
                <div class="login-1-form register-1-form clearfix">
                    <form method="post" action="/register">
                        <h4 class="title divider-3 mb-3 text-white">sign up</h4>
                        {{ csrf_field() }}
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="glyph-icon flaticon-user"></i>
                                <input id="Firstname" name="first_name" class="web" type="text" placeholder="First name"
                                       pattern="[a-zA-Z]+" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="glyph-icon flaticon-user"></i>
                                <input id="Lastname" name="last_name" class="web" type="text" placeholder="Last name"
                                       pattern="[a-zA-Z]+" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <input id="email" class="web" type="email" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="glyph-icon flaticon-padlock"></i>
                                <input id="Password" class="web" type="password" placeholder="Password" name="password" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="glyph-icon flaticon-padlock"></i>
                                <input id="ConfirmPassword" class="web" type="password" placeholder="Confirm Password" name="confirm_password" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-mobile"></i>
                                <input id="PhoneNumber" class="web" type="text" placeholder="Phone Number" name="phone"
                                       pattern="[0-9]+" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-user" aria-hidden="true"></i>
                                <select name="gender" class="web" required>
                                    <option disabled selected value>Gender</option>
                                    @foreach ($data['gender'] as $key=>$gender)
                                        <option class="web" value="{{ $key }}">{{ $gender }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-transgender" aria-hidden="true"></i>
                                <select name="sexual_preference" class="web" required>
                                    <option disabled selected value>Sexual Preference</option>
                                    @foreach ($data['sexual_preference'] as $key=>$sex)
                                        <option class="web" value="{{ $key }}">{{ $sex }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-question" aria-hidden="true"></i>
                                <select name="personality_type" class="web" required>
                                    <option disabled selected value>Personality Type</option>
                                    @foreach ($data['personality_type'] as $key=>$personality)
                                        <option class="web" value="{{ $key }}">{{ $personality }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                                <select name="age" class="web" required>
                                    <option disabled selected value>Age</option>
                                    @foreach ($data['age'] as $key=>$age)
                                        <option class="web" value="{{ $key }}">{{ $age }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-globe" aria-hidden="true"></i>
                                <select name="city" class="web" required>
                                    <option disabled selected value>City</option>
                                    @foreach ($data['city'] as $key=>$city)
                                        <option class="web" value="{{ $key }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="section-field text-uppercase text-right mt-2"> <button class="button btn-lg btn-theme full-rounded animated right-icn" type="submit"><span>sign up<i class="glyph-icon flaticon-hearts" aria-hidden="true"></i></span></button> </div>
                        <div class="clearfix"></div>
                        <div class="section-field mt-2 text-center text-white">
                            <p class="lead mb-0">Have an account? <a class="text-white" href="/login"> <u> Sign In!</u> </a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!--=================================
 login-->

@endsection