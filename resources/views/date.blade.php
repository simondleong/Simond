@extends('layout')

@section('content')

    <section class="page-section-ptb">
        <div class="container">

            @if (session()->has('flash_success'))
                <div class="row mb-3">
                    <div class="col-12 text-center alert alert-success">
                        {{ session()->get('flash_success') }}
                    </div>
                </div>
            @elseif (session()->has('flash_error'))
                <div class="row mb-3">
                    <div class="col-12 text-center alert alert-danger">
                        {{ session()->get('flash_error') }}
                    </div>
                </div>
            @endif

            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h4 class="title divider-3 mb-3">{{ $target->first_name }}&nbsp;{{ $target->last_name }}</h4>
                </div>
            </div>

            <div class="row">
                <!-- THIS IS THE PHOTO BAR -->
                <div class="col-md-5 col-sm-12 col-xs-12 mb-sm-5 text-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="edit-form mb-3">
                                @if (!count($target->photos))
                                    <h3 class="text-center text-black">This user has not uploaded any photo!</h3>
                                @else
                                    @foreach($target->photos as $key => $photo)
                                        <div class="section-field mt-2 mb-2">
                                            <div class="row">
                                                <div class="col-12 picture-container">
                                                    <img id="img{{ $key }}" src="{{ \Illuminate\Support\Facades\Storage::disk('photo')->url($photo->filename) }}"
                                                         alt="picture" class="img-thumbnail" onclick="showImage(this, 'img{{ $key }}')">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    @if (!((($date->status) % 2 == 0) && ($date->status != 0)))
                        <div class="row mt-3">
                            <div class="col-12 text-left">
                                @if ($date->status == $data['config']['Sent'])
                                    @if ($user->id == $date->receiver_id)
                                        <form action="/date/{{ $date->id }}/update" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="status" value="{{ $data['config']['Accepted'] }}"/>
                                            <button type="submit" class="border-success button btn-success text-white">Accept</button>
                                        </form>
                                        <form action="/date/{{ $date->id }}/update" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="status" value="{{ $data['config']['Rejected'] }}"/>
                                            <button type="submit" class="border-danger button btn-danger text-white">Reject</button>
                                        </form>
                                    @else
                                        <form action="/date/{{ $date->id }}/update" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="status" value="{{ $data['config']['Cancelled'] }}"/>
                                            <button type="submit" class="border-danger button btn-danger text-white">Cancel</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
                <!-- END OF PHOTO BAR -->

                <div class="col-md-7 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center mb-0">
                                <tbody>
                                @if (($date->status) % 2 == 1)
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $target->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $target->phone }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $data['gender'][$target->gender] }}</td>
                                </tr>
                                <tr>
                                    <td>Sexual Preference</td>
                                    <td>{{ $data['sexual_preference'][$target->sexual_preference] }}</td>
                                </tr>
                                <tr>
                                    <td>Personality Type</td>
                                    <td>{{ $data['personality_type'][$target->personality_type] }}</td>
                                </tr>
                                <tr>
                                    <td>Age</td>
                                    <td>{{ $data['age'][$target->age] }}</td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td>{{ $data['city'][$target->city] }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div id="imageModal" class="modal">

        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="modal-content" id="modal-img">
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/photo/modal.js') }}"></script>

@endsection