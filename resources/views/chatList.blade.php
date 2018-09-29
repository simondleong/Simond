@extends('layout')

@section('content')

    <section class="page-section-ptb">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    @if (!count($chats))
                        <h3 class="text-black">No Ongoing Chat at the Moment</h3>
                    @else
                        <h3 class="text-black">Chat List</h3>
                    @endif
                </div>
            </div>

            <div class="row">
                @foreach ($chats as $chat)
                    <div class="col-12">
                        <a href="/chat/{{ $chat->id }}">
                            <div class="row mb-3 pt-2 pb-2 profile-item-hover border border-secondary">
                                <div class="col-4">
                                    <div class="chat-profile-image clearfix">
                                        @if ($user->id == $chat->date->receiver->id)
                                            @if (!count($chat->date->sender->photos))
                                                @if ($gender[$chat->date->sender->gender] == 'Male')
                                                    <img class="img-fluid img-small" src="{{ asset('images/man.jpeg') }}" alt="photo">
                                                @elseif ($gender[$chat->date->sender->gender] == 'Female')
                                                    <img class="img-fluid img-small" src="{{ asset('images/woman.jpeg') }}" alt="photo">
                                                @else
                                                    <img class="img-fluid img-small" src="{{ asset('images/others.jpg') }}" alt="photo">
                                                @endif
                                            @else
                                                @foreach($chat->date->sender->photos as $photo)
                                                    @if ($photo->is_profile_pic)
                                                        <img class="img-fluid img-small"
                                                             src="{{ \Illuminate\Support\Facades\Storage::disk('photo')
                                                         ->url($photo->filename) }}"
                                                             alt="photo"/>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @else
                                            @if (!count($chat->date->receiver->photos))
                                                @if ($gender[$chat->date->receiver->gender] == 'Male')
                                                    <img class="img-fluid img-small" src="{{ asset('images/man.jpeg') }}" alt="photo">
                                                @elseif ($gender[$chat->date->receiver->gender] == 'Female')
                                                    <img class="img-fluid img-small" src="{{ asset('images/woman.jpeg') }}" alt="photo">
                                                @else
                                                    <img class="img-fluid img-small" src="{{ asset('images/others.jpg') }}" alt="photo">
                                                @endif
                                            @else
                                                @foreach($chat->date->receiver->photos as $photo)
                                                    @if ($photo->is_profile_pic)
                                                        <img class="img-fluid img-small"
                                                             src="{{ \Illuminate\Support\Facades\Storage::disk('photo')
                                                         ->url($photo->filename) }}"
                                                             alt="photo"/>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4 d-flex justify-content-start align-items-center">
                                    <p class="text-big no-decoration">
                                        @if ($user->id == $chat->date->receiver->id)
                                            {{ $chat->date->sender->first_name }} {{ $chat->date->sender->last_name }}
                                        @else
                                            {{ $chat->date->receiver->first_name }} {{ $chat->date->receiver->last_name }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-4 d-flex justify-content-start align-items-center big">
                                    <p class="text-big no-decoration">
                                        {{ $chat->created_at }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>


            <div class="row no-gutters mt-6">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <nav class="d-flex justify-content-center">
                        {{ $chats->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </section>

@endsection