<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\PrsonalInfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Handel the request to return profile page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.profile');
    }


    /**
     * Handel the request to personal information
     *
     * @param PrsonalInfoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePersonalInfo(PrsonalInfoRequest $request)
    {
        Auth::user()->update($request->only(['name', 'email']));

        return redirect()->back()->with(['success' => 'User updated successfully.']);


    }


    /**
     * Handel the request to update profile image
     *
     * @param AvatarRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeProfileImage(AvatarRequest $request)
    {

        if (Auth::user()->profile_image) {
            Storage::disk('public')->delete(Auth::user()->profile_image);
        }

        Auth::user()->update([
            'profile_image' => Storage::disk('public')->put('Users/Avatars', $request->file('profile_image'))
        ]);

        return redirect()->back()->with(['success' => 'Profile image updated successfully.']);

    }


    /**
     * Handel the request to change password
     *
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(ChangePasswordRequest $request)
    {

        if (!Auth::attempt(['email' => Auth::user()->email, 'password' => $request->password])) {
            return redirect()->back()->with(['fail' => 'Please, enter current password correctly']);
        }

        Auth::user()->update(['password' => bcrypt($request->new_password)]);

        return redirect()->back()->with(['success' => 'Password updated successfully.']);

    }

}
