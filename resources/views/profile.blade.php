@extends('layout')

@section('content')

    <section class="page-section-ptb">
        <div class="container">

            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="title divider-3 mb-2 mt-2">{{ $user->first_name }}&nbsp;{{ $user->last_name }}</h4>
                </div>
            </div>
            <div class="row">
                <!-- THIS IS THE PHOTO BAR -->
                <div class="col-md-5 text-center">
                    <div class="edit-form clearfix">
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
                <!-- END OF PHOTO BAR -->

                <div class="col-md-7">
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