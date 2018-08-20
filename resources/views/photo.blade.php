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

                    <div class="row">
                        <div class="edit-form clearfix">
                            <!-- if user has no photo -->
                            <h3 class="text-center text-black">You have not uploaded any photo!</h3>
                            <!-- if user has photo(s) -->
                            <div class="section-field mt-3">
                                <div class="row">
                                    <div class="col-md-6 picture-container">
                                        <img id="img" src="{{ asset('images/profile_pic.png') }}" alt="picture" class="img-thumbnail"
                                         onclick="showImage(this, 'img')">
                                    </div>
                                    <div class="col-md-6 picture-button">
                                        <button class="btn btn-info mr-4     text-right">Set as Profile Picture</button>
                                        <button class="btn btn-danger text-right">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="edit-form clearfix">
                            <h2 class="text-black text-center">Image Upload</h2>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="section-field mb-3">
                                    <div class="field-widget"> <i class="fa fa-picture-o" aria-hidden="true"></i>
                                        <label>Select image to upload:</label>
                                        <input type="file" name="file" id="file">
                                    </div>
                                </div>
                                <div class="section-field text-uppercase text-right mt-2"> <button class="button btn-lg btn-theme full-rounded animated right-icn" type="submit"><span>Upload<i class="glyph-icon flaticon-hearts" aria-hidden="true"></i></span></button> </div>
                                {{ csrf_field() }}
                            </form></div>
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

    <script>
        // Get the modal
        let a = document.getElementById('imageModal');
        let modal = document.getElementById('imageModal');
        a.parentNode.removeChild(a);
        document.body.insertBefore(modal, document.body.childNodes[0]);

        function showImage(element , i) {

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            let img = document.getElementById(i);
            let modalImg = document.getElementById("modal-img");

            modal.style.display = "block";
            modalImg.src = element.src;
        }

        let span = document.getElementsByClassName("close")[0];

        span.onclick = function () {
            modal.style.display = "none";
        }
    </script>

@endsection