<div class="col-md-4">
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