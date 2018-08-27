@extends('layout')

@section('content')

    <section class="page-section-ptb">
        <div class="container">
            <div class="row">

                @include('sidebar')

                <div class="col-md-8">

                    @if (session()->has('flash_error'))
                        <div class="row justify-content-center">
                            <div class="col-md-12 alert alert-danger text-center">
                                {{ session()->get('flash_error') }}
                            </div>
                        </div>
                    @elseif (session()->has('flash_success'))
                        <div class="row justify-content-center">
                            <div class="col-md-12 alert alert-success text-center">
                                {{ session()->get('flash_success') }}
                            </div>
                        </div>
                    @elseif ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-12 alert alert-danger text-center">
                                    {{ $error }}
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div class="edit-form clearfix">
                            <!-- if user has no photo -->
                            @if (!count(session()->get('user')->photos))
                                <h3 class="text-center text-black">You have not uploaded any photo!</h3>
                            @else
                                <h3 class="text-center text-black mb-4">Your Photos</h3>
                                <!-- if user has photo(s) -->
                                @foreach (session()->get('user')->photos as $key=>$photo)
                                    <div class="section-field mt-3">
                                        <div class="row">
                                            <div class="col-md-6 picture-container">
                                                <img id="img{{ $key }}" src="{{ \Illuminate\Support\Facades\Storage::disk('photo')->url($photo->filename) }}"
                                                     alt="picture" class="img-thumbnail" onclick="showImage(this, 'img{{ $key }}')">
                                            </div>
                                            <div class="col-md-6 picture-button">
                                                @if (!$photo->is_profile_pic)
                                                    <form action="photos/set/{{ $photo->id }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-info mr-4 text-white">
                                                            Set as Profile Picture
                                                        </button>
                                                    </form>
                                                @endif
                                                @if ((count(session()->get('user')->photos) == 1) or ($photo->is_profile_pic))
                                                    <button class="btn btn-dark text-right text-white"
                                                            title="Cannot delete profile picture" disabled>Delete</button>
                                                @else
                                                    <form action="photos/delete/{{ $photo->id }}" method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-danger text-white">Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="edit-form clearfix">
                            @if (count(session()->get('user')->photos) > 3)
                                <h3 class="text-center text-black">You have reached the maximum number of photos!</h3>
                            @else
                                <h2 class="text-black text-center">Image Upload</h2>
                                <form class="mt-4" action="/photos/upload" method="POST" enctype="multipart/form-data">
                                    <div id="increment"  class="input-group mb-2">
                                        <input id="file1" class="form-control" type="file" name="file[]"
                                               onchange="sizeCheck(this, 1)" required>
                                        <div class="btn-add">
                                            <button class="btn btn-success" id="add" type="button">Add</button>
                                        </div>
                                    </div>
                                    <div id="upload-message" class="text-right text-danger mb-2 mt-2 text-big hidden">
                                        File size is too big! (Max. 2MB)
                                    </div>
                                    <div class="section-field text-right mt-3"> <button id="upload-btn" class="button btn-lg btn-theme full-rounded animated right-icn" type="submit"><span>Upload<i class="glyph-icon flaticon-hearts" aria-hidden="true"></i></span></button> </div>
                                    {{ csrf_field() }}
                                </form>
                            @endif
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
    <script type="text/javascript" src="{{ asset('js/photo-upload/photo.js') }}"></script>
    <script type="text/javascript">
        /* ******************************************** */
        /* THROWS VALUE TO THE JAVASCRIPT */

        PHOTOCOUNT.init([{!! json_encode(count(session()->get('user')->photos)) !!}]);
        /* ******************************************** */
    </script>


@endsection