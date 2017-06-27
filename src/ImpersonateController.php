<?php

namespace Bpocallaghan\Impersonate;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImpersonateController extends Controller
{
    /**
     * Impersonate the given user
     * @param Request $request
     * @param User    $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function login(Request $request, User $user)
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function logout(Request $request)
    {
        impersonate()->logout();

        // if redirect url in request
        if ($request->has('redirect_to')) {
            return redirect($request->get('redirect_to'));
        }

        return back();
    }
}