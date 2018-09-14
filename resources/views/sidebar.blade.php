<div class="col-md-4 col-sm-12 col-xs-12 mb-4">
    <div class="row mb-4">
        <div class="col-12">
            @foreach (session()->get('user')->photos as $key=>$photo)
                @if ($photo->is_profile_pic)
                    <img id="img{{ $key }}" src="{{ \Illuminate\Support\Facades\Storage::disk('photo')->url($photo->filename) }}"
                         alt="picture" class="img-thumbnail" onclick="showImage(this, 'img{{ $key }}')">
                    @break
                @endif
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center mb-0">
                    <tbody>
                    <tr>
                        <td class="profile-item-hover edit-sidebar {{ Request::is('profile') ? "bg-warning" : null }}">
                            <a href="/profile">User Profile</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-item-hover edit-sidebar {{ Request::is('password') ? "bg-warning" : null }}">
                            <a href="/password">Password</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-item-hover edit-sidebar {{ Request::is('preferences') ? "bg-warning" : null }}">
                            <a href="/preferences">Preferences</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="profile-item-hover edit-sidebar {{ Request::is('photos') ? "bg-warning" : null }}">
                            <a href="/photos">Photos</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>