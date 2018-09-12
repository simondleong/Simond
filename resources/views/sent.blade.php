@extends('layout')

@section('content')

<section class="page-section-ptb">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                @if (!count($dates))
                    <h3 class="text-black">No Sent Date Requests Yet</h3>
                @else
                    <h3 class="text-black">Sent Date Requests</h3>
                @endif
            </div>
        </div>

        <div class="row">
            @foreach ($dates as $date)
                <div class="col-md-4 col-sm-12 col-xs-12 mb-4">
                    <div class="profile-item-hover">
                        @if ((($date->status) % 2 == 1) || ($date->status == 0))
                            <a href="/profile/date/{{ $date->id }}" class="profile-item-hover" target="_blank">
                        @endif
                            <div class="profile-image clearfix">
                                @if (!count($date->receiver->photos))
                                    @if ($gender[$date->receiver->gender] == 'Male')
                                        <img class="img-fluid" src="{{ asset('images/man.jpeg') }}" alt="photo">
                                    @elseif ($gender[$date->receiver->gender] == 'Female')
                                        <img class="img-fluid" src="{{ asset('images/woman.jpeg') }}" alt="photo">
                                    @else
                                        <img class="img-fluid" src="{{ asset('images/others.jpg') }}" alt="photo">
                                    @endif
                                @else
                                    @foreach($date->receiver->photos as $photo)
                                        @if ($photo->is_profile_pic)
                                            <img class="img-fluid"
                                                 src="{{ \Illuminate\Support\Facades\Storage::disk('photo')
                                                         ->url($photo->filename) }}"
                                                 alt="photo"/>
                                        @endif
                                    @endforeach
                                @endif
                                <div class="profile-details profile-text">
                                    <h5 class="title">{{ $date->receiver->first_name }}&nbsp;{{ $date->receiver->last_name }}</h5>
                                    @if ($date->status == 0)
                                        <span class="text-black">{{ $status[$date->status] }}</span>
                                    @elseif (($date->status) % 2 == 1)
                                        <span class="text-green">{{ $status[$date->status] }}</span>
                                    @else
                                        <span class="text-red">{{ $status[$date->status] }}</span>
                                    @endif
                                </div>
                            </div>
                        @if ((($date->status) % 2 == 1) || ($date->status == 0))
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>


        <div class="row no-gutters mt-6">
            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <nav class="d-flex justify-content-center">
                    {{ $dates->links() }}
                </nav>
            </div>
        </div>
    </div>
</section>

@endsection