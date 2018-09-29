@extends('layout')

@section('content')

    <section class="page-section-ptb">
        <div class="container ptb-60 pt-sm-3 pb-sm-3">
            <div class="row flex-wrap">
                @foreach($matches as $match)
                    <div class="col-md-4 col-sm-12 col-xs-12 mb-4">
                        <div class="profile-item-hover">
                            <a href="profile/details/{{ $match->id }}" class="profile-item">
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


            <div class="row no-gutters mt-6">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <nav class="d-flex justify-content-center">
                        {{ $matches->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript">
        let pagination = $('.pagination');
        pagination.addClass('pagination-sm');
        pagination.addClass('pagination-nav');
        pagination.addClass('flex-sm-wrap');
        pagination.addClass('flex-wrap');
    </script>

@endsection