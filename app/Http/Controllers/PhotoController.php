<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    protected $photo, $user;
    public function __construct(Photo $photo, User $user) {
        $this->photo    = $photo;
        $this->user     = $user;
    }

    /*
     * Handle upload
     */
    public function upload(Request $request) {
        $this->validate($request, [
            'file'      => 'required|array',
            'file.*'    => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $files = $request->file;

        // cache user credential
        $user       = session()->get('user');

        // get file and extension
        foreach ($files as $key=>$file) {
            $extension  = $file->getClientOriginalExtension();
            $filename   = $this->generateFilename($user->id, $key, $extension);

            // create instance of model
            $photo = $this->createInstance($user, $filename);

            // store the photo to storage folder and to DB
            $path = $file->storePubliclyAs('/public/photos', $filename);
            $photo  = $photo->save();
        }

        // update user credential in session
        $this->updateUserInfo($user);

        return redirect('/photos')->with('flash_success', 'Photo has been uploaded!');
    }

    public function setProfilePicture(Request $request) {
        $user   = session()->get('user');
        $photos = $user->photos;
        $new_id = $request->id;

        // find profile picture id
        $profile_pic = $this->findProfilePictureId($photos);

        if ($profile_pic < 0) {
            return redirect('/photos')->with('flash_error', 'Unexpected error, please contact administrator.');
        }

        // cache current and new profile picture instance
        $curr_pp    = $this->photo->find($profile_pic);
        $new_pp     = $this->photo->find($new_id);

        $curr_pp->is_profile_pic    = false;
        $new_pp->is_profile_pic     = true;

        $curr_pp    = $curr_pp->save();
        $new_pp     = $new_pp->save();

        $this->updateUserInfo($user);

        return redirect('/photos')->with('flash_success', 'Profile picture successfully changed');
    }

    public function deletePicture(Request $request) {
        $photo_id   = $request->id;
        $photo      = $this->photo->find($photo_id);
        $user       = session()->get('user');

        Storage::disk('photo')->delete($photo->filename);
        $photo->delete();

        $this->updateUserInfo($user);

        return redirect()->back()->with('flash_success', 'Photo has been deleted');
    }

    private function findProfilePictureId($photos) {
        foreach ($photos as $key=>$photo) {
            if ($photo->is_profile_pic) {
                return $photo->id;
            }
        }

        return -1;
    }

    /*
     * create instance of 'photo'
     */
    private function createInstance($user, $filename) {
        $photo = new Photo;

        $photo->user_id         = $user->id;
        $photo->filename        = $filename;
        $photo->is_profile_pic  = false;

        if ($user->photos->isEmpty()) {
            $photo->is_profile_pic = true;
        }

        return $photo;
    }

    /*
     * generate filename
     */
    private function generateFilename($id, $num, $extension) {
        // get user's credentials and current clock
        $now        = Carbon::now();

        // generate a new filename
        $filename   = md5($now . $num . $id);
        $filename.= ('.' . $extension);

        return $filename;
    }

    /*
     * replace user info in session with new one
     */
    private function updateUserInfo($user) {
        $user   = $this->user->find($user->id);
        session()->put('user', $user);
    }
}
