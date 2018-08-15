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

                    <div class="edit-form clearfix">
                        <form method="post" action="/password">
                            {{ csrf_field() }}
                            <div class="section-field mb-3">
                                <div class="field-widget"> <i class="glyph-icon flaticon-padlock"></i>
                                    <input id="OldPassword" class="web" type="password" placeholder="Old Password" name="old_password" required>
                                </div>
                            </div>
                            <div class="section-field mb-3">
                                <div class="field-widget"> <i class="glyph-icon flaticon-padlock"></i>
                                    <input id="NewPassword" class="web" type="password" placeholder="New Password" name="new_password" required>
                                </div>
                            </div>
                            <div class="section-field mb-3">
                                <div class="field-widget"> <i class="glyph-icon flaticon-padlock"></i>
                                    <input id="ConfirmPassword" class="web" type="password" placeholder="Confirm Password" name="confirm_password" required>
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