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
                    <form method="post" action="/preferences">
                        {{ csrf_field() }}
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-question" aria-hidden="true"></i>
                                <select name="gender" class="web" required>
                                    <option disabled selected value>Gender</option>
                                    @foreach ($data['gender'] as $key=>$gender)
                                        @if (session()->get('user')->preference != null)
                                            @if (session()->get('user')->preference->gender == $key)
                                                <option class="web" value="{{ $key }}" selected>{{ $gender }}</option>
                                            @else
                                                <option class="web" value="{{ $key }}">{{ $gender }}</option>
                                            @endif
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $gender }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @foreach ($data['importance'] as $key=>$importance)
                                <div class="form-check form-check-inline">
                                    @if (session()->get('user')->preference != null)
                                        @if (session()->get('user')->preference->gender_weight == $data['imp_value'][$key])
                                            <input class="form-check-input" name="gender_weight" type="radio"
                                                   id="gender{{ $key }}" value="{{ $data['imp_value'][$key] }}" checked required>
                                        @else
                                            <input class="form-check-input" name="gender_weight" type="radio"
                                                   id="gender{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                        @endif
                                    @else
                                        <input class="form-check-input" name="gender_weight" type="radio"
                                               id="gender{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                    @endif
                                    <label class="form-check-label" for="gender{{ $key }}">
                                        {{ $importance }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-question" aria-hidden="true"></i>
                                <select name="sexual_preference" class="web" required>
                                    <option disabled selected value>Sexual Preference</option>
                                    @foreach ($data['sexual_preference'] as $key=>$sexual_preference)
                                        @if (session()->get('user')->preference != null)
                                            @if (session()->get('user')->preference->sexual_preference == $key)
                                                <option class="web" value="{{ $key }}" selected>{{ $sexual_preference }}</option>
                                            @else
                                                <option class="web" value="{{ $key }}">{{ $sexual_preference }}</option>
                                            @endif
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $sexual_preference }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @foreach ($data['importance'] as $key=>$importance)
                                <div class="form-check form-check-inline">
                                    @if (session()->get('user')->preference != null)
                                        @if (session()->get('user')->preference->sexual_weight == $data['imp_value'][$key])
                                            <input class="form-check-input" name="sexual_weight" type="radio"
                                                   id="sexual{{ $key }}" value="{{ $data['imp_value'][$key] }}" checked required>
                                        @else
                                            <input class="form-check-input" name="sexual_weight" type="radio"
                                                   id="sexual{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                        @endif
                                    @else
                                        <input class="form-check-input" name="sexual_weight" type="radio"
                                               id="sexual{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                    @endif
                                    <label class="form-check-label" for="sexual{{ $key }}">
                                        {{ $importance }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-question" aria-hidden="true"></i>
                                <select name="personality_type" class="web" required>
                                    <option disabled selected value>Personality Type</option>
                                    @foreach ($data['personality_type'] as $key=>$personality)
                                        @if (session()->get('user')->preference != null)
                                            @if (session()->get('user')->preference->personality_type == $key)
                                                <option class="web" value="{{ $key }}" selected>{{ $personality }}</option>
                                            @else
                                                <option class="web" value="{{ $key }}">{{ $personality }}</option>
                                            @endif
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $personality }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @foreach ($data['importance'] as $key=>$importance)
                                <div class="form-check form-check-inline">
                                    @if (session()->get('user')->preference != null)
                                        @if (session()->get('user')->preference->personality_weight == $data['imp_value'][$key])
                                            <input class="form-check-input" name="personality_weight" type="radio"
                                                   id="personality{{ $key }}" value="{{ $data['imp_value'][$key] }}" checked required>
                                        @else
                                            <input class="form-check-input" name="personality_weight" type="radio"
                                                   id="personality{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                        @endif
                                    @else
                                        <input class="form-check-input" name="personality_weight" type="radio"
                                               id="personality{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                    @endif
                                    <label class="form-check-label" for="personality{{ $key }}">
                                        {{ $importance }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                                <select name="age" class="web" required>
                                    <option disabled selected value>Age</option>
                                    @foreach ($data['age'] as $key=>$age)
                                        @if (session()->get('user')->preference != null)
                                            @if (session()->get('user')->preference->age == $key)
                                                <option class="web" value="{{ $key }}" selected>{{ $age }}</option>
                                            @else
                                                <option class="web" value="{{ $key }}">{{ $age }}</option>
                                            @endif
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $age }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @foreach ($data['importance'] as $key=>$importance)
                                <div class="form-check form-check-inline">
                                    @if (session()->get('user')->preference != null)
                                        @if (session()->get('user')->preference->age_weight == $data['imp_value'][$key])
                                            <input class="form-check-input" name="age_weight" type="radio"
                                                   id="age{{ $key }}" value="{{ $data['imp_value'][$key] }}" checked required>
                                        @else
                                            <input class="form-check-input" name="age_weight" type="radio"
                                                   id="age{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                        @endif
                                    @else
                                        <input class="form-check-input" name="age_weight" type="radio"
                                               id="age{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                    @endif
                                    <label class="form-check-label" for="age{{ $key }}">
                                        {{ $importance }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-globe" aria-hidden="true"></i>
                                <select name="city" class="web" required>
                                    <option disabled selected value>City</option>
                                    @foreach ($data['city'] as $key=>$city)
                                        @if (session()->get('user')->preference != null)
                                            @if (session()->get('user')->preference->city == $key)
                                                <option class="web" value="{{ $key }}" selected>{{ $city }}</option>
                                            @else
                                                <option class="web" value="{{ $key }}">{{ $city }}</option>
                                            @endif
                                        @else
                                            <option class="web" value="{{ $key }}">{{ $city }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @foreach ($data['importance'] as $key=>$importance)
                                <div class="form-check form-check-inline">
                                    @if (session()->get('user')->preference != null)
                                        @if (session()->get('user')->preference->city_weight == $data['imp_value'][$key])
                                            <input class="form-check-input" name="city_weight" type="radio"
                                                   id="city{{ $key }}" value="{{ $data['imp_value'][$key] }}" checked required>
                                        @else
                                            <input class="form-check-input" name="city_weight" type="radio"
                                                   id="city{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                        @endif
                                    @else
                                        <input class="form-check-input" name="city_weight" type="radio"
                                               id="city{{ $key }}" value="{{ $data['imp_value'][$key] }}" required>
                                    @endif
                                    <label class="form-check-label" for="city{{ $key }}">
                                        {{ $importance }}
                                    </label>
                                </div>
                            @endforeach
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