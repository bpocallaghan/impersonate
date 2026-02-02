<?php

namespace Bpocallaghan\Impersonate;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ImpersonateController extends Controller
{
    /**
     * Impersonate the given user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request, User $user)
    {
        impersonate()->login($user);

        // if redirect url in request
        if ($request->has('redirect_to')) {
            return redirect($request->get('redirect_to'));
        }

        return back();
    }

    /**
     * Logout as the impersonated user
     * Log back in as the original user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        impersonate()->logout();

        // if redirect url in request
        if ($request->has('redirect_to')) {
            return redirect($request->get('redirect_to'));
        }

        return back();
    }
}
