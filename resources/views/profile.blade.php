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
                    <h4 class="title divider-3 mb-3">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</h4>
                </div>
            </div>

            <div class="row">
                <!-- THIS IS THE PHOTO BAR -->
                <div class="col-md-5 col-sm-12 col-xs-12 mb-sm-5 text-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="edit-form mb-3">
                                @if (!count($user->photos))
                                    <h3 class="text-center text-black">This user has not uploaded any photo!</h3>
                                @else
                                    @foreach($user->photos as $key => $photo)
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

                    <div class="row mt-3">
                        <div class="col-12 text-left">
                            <form action="/request-date" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $user->id }}"/>
                                <button type="submit" class="border-success button btn-success text-white">Request Date</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END OF PHOTO BAR -->

                <div class="col-md-7 col-sm-12 col-xs-12 ">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center mb-0">
                                <tbody>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{ $data['gender'][$user->gender] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sexual Preference</td>
                                        <td>{{ $data['sexual_preference'][$user->sexual_preference] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Personality Type</td>
                                        <td>{{ $data['personality_type'][$user->personality_type] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Age</td>
                                        <td>{{ $data['age'][$user->age] }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ $data['city'][$user->city] }}</td>
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