@extends('layout')

@section('content')

    <section class="page-section-ptb ptb-100">
        <div class="container ptb-60">
            <div class="row">
                @foreach($matches as $match)
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-4">
                        <div class="profile-item-hover">
                            <a href="profile/details/{{ $match->id }}" class="profile-item" target="_blank">
                                <div class="profile-image clearfix">
                                    @if (!count($match->photos))
                                        @if ($gender[$match->gender] == 'Male')
                                            <img class="img-fluid" src="{{ asset('images/man.jpeg') }}" alt="photo">
                                        @elseif ($gender[$match->gender] == 'Female')
                                            <img class="img-fluid" src="{{ asset('images/woman.jpeg') }}" alt="photo">
                                        @else
                                            <img class="img-fluid" src="{{ asset('images/others.jpg') }}" alt="photo">
                                        @endif
                                    @else
                                        @foreach($match->photos as $photo)
                                            @if ($photo->is_profile_pic)
                                                <img class="img-fluid"
                                                     src="{{ \Illuminate\Support\Facades\Storage::disk('photo')
                                                     ->url($photo->filename) }}"
                                                     alt="photo"/>
                                            @endif
                                        @endforeach
                                    @endif
                                    <div class="profile-details profile-text">
                                        <h5 class="title">{{ $match->first_name }}&nbsp;{{ $match->last_name }}</h5>
                                        <span class="text-black">{{ $match->percentage }}% match</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


            <div class="row mt-6">
                <div class="col-12 text-center">
                    {{ $matches->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection