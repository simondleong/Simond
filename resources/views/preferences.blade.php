@extends('layout')

@section('content')

<section class="page-section-ptb">
    <div class="container">
        <div class="row">

            @include('sidebar')

            <div class="col-md-8">
                <div class="edit-form clearfix">
                    <form method="put" action="/profile">
                        {{ csrf_field() }}
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-question" aria-hidden="true"></i>
                                <select name="personality_type" class="web" required>
                                    <option disabled selected value>Personality Type</option>
                                    @foreach ($data['personality_type'] as $key=>$personality)
                                        @if (session()->has('preference'))
                                            @if (session()->get('preference')->personality_type == $personality)
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
                        </div>
                        <div class="section-field mb-3">
                            <div class="field-widget"> <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                                <select name="age" class="web" required>
                                    <option disabled selected value>Age</option>
                                    @foreach ($data['age'] as $key=>$age)
                                        @if (session()->has('preference'))
                                            @if (session()->get('preference')->age == $age)
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