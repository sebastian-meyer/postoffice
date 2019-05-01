<?php

namespace App\Http\Controllers\Account;

use Hash;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Show the account management.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('account.index');
    }

    /**
     * Show the form to change the password.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePasswordForm()
    {
        return view('account.password');
    }

    /**
     * Process the password change.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePasswordAction(Request $request)
    {
        // Get the currently authenticated user
        $user = $request->user();

        // Validate the provided data
        Validator::make(
            $request->only('currentPassword', 'newPassword', 'newPassword_confirmation'),
            [
                'currentPassword' => [
                    'bail',
                    'required',
                    function ($attribute, $value, $fail) use ($user) {
                        if (! Hash::check($value, $user->getAuthPassword())) {
                            $fail($attribute.' is invalid.');
                        }
                    },
                ],
                'newPassword' => 'bail|required|confirmed|different:currentPassword|min:8',
            ]
        )->validate();

        // Update password
        $user->password = Hash::make($request->newPassword);
        $user->save();

        return redirect()->route('account.index')->with('status', 'Password updated!');
    }
}
