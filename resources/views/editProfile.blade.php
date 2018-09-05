@extends('layout')

@section('content')

<section class="page-section-ptb">
    <div class="container">
        <div class="row">

            @include('sidebar')

            <div class="col-md-8">

                @if (session()->has('flash_error'))
                    <div class="row justify-content-center">
                        <div class="col-md-10 alert alert-danger text-center">
                            {{ session()->get('flash_error') }}
                        </div>
                    </div>
                @elseif (session()->has('flash_success'))
                    <div class="row justify-content-center">
                        <div class="col-md-10 alert alert-success text-center">
                            {{ session()->get('flash_success') }}
                        </div>
                    </div>
                @endif

                <div class="edit-form clearfix">
                    <form method="post" action="/profile">
                        {{ csrf_field() }}
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="glyph-icon flaticon-user"></i>
                                <input id="Firstname" name="first_name" class="web" type="text"
                                       value="{{ session()->get('user')->first_name }}" placeholder="First name" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="glyph-icon flaticon-user"></i>
                                <input id="Lastname" name="last_name" class="web" type="text"
                                       value="{{ session()->get('user')->last_name }}" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <input id="email" class="web" type="email" placeholder="Email" name="email"
                                       value="{{ session()->get('user')->email }}" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-mobile"></i>
                                <input id="PhoneNumber" class="web" type="text" placeholder="Phone Number" name="phone"
                                       value="{{ session()->get('user')->phone }}" required>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-user" aria-hidden="true"></i>
                                <select name="gender" class="web" required>
                                    <option disabled selected value>Gender</option>
                                    @foreach ($data['gender'] as $key=>$gender)
                                        @if ($key == session()->get('user')->gender)
                                            <option class="web" value="{{ $key }}" selected>{{ $gender }}</option>
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $gender }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-transgender" aria-hidden="true"></i>
                                <select name="sexual_preference" class="web" required>
                                    <option disabled selected value>Sexual Preference</option>
                                    @foreach ($data['sexual_preference'] as $key=>$sex)
                                        @if ($key == session()->get('user')->sexual_preference)
                                            <option class="web" value="{{ $key }}" selected>{{ $sex }}</option>
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $sex }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-question" aria-hidden="true"></i>
                                <select name="personality_type" class="web" required>
                                    <option disabled selected value>Personality Type</option>
                                    @foreach ($data['personality_type'] as $key=>$personality)
                                        @if ($key == session()->get('user')->personality_type)
                                            <option class="web" value="{{ $key }}" selected>{{ $personality }}</option>
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $personality }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                                <select name="age" class="web" required>
                                    <option disabled selected value>Age</option>
                                    @foreach ($data['age'] as $key=>$age)
                                        @if ($key == session()->get('user')->age)
                                            <option class="web" value="{{ $key }}" selected>{{ $age }}</option>
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $age }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-globe" aria-hidden="true"></i>
                                <select name="city" class="web" required>
                                    <option disabled selected value>City</option>
                                    @foreach ($data['city'] as $key=>$city)
                                        @if ($key == session()->get('user')->city)
                                            <option class="web" value="{{ $key }}" selected>{{ $city }}</option>
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $city }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="section-field text-uppercase text-right mt-2"> <button class="button btn-lg btn-theme full-rounded animated right-icn" type="submit"><span>Update<i class="glyph-icon flaticon-hearts" aria-hidden="true"></i></span></button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection