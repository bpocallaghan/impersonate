<?php

namespace Bpocallaghan\Impersonate;

use App\User;

class Impersonate
{
    private $isActiveKey = '';

    private $originalUserKey = '';

    /**
     * Create a new Impersonate instance.
     */
    function __construct()
    {
        $this->isActiveKey = config('impersonate.session')['is_active'];
        $this->originalUserKey = config('impersonate.session')['original_user'];
    }

    /**
     * Impersonate the given user
     * Store the currently logged in user's id in session.
     * Log the new user in
     * @param User $user
     */
    public function login(User $user)
    {
        // if not impersonated, save current logged in user
        // otherwise do not update (leave first original user in session)
        if (!$this->isActive()) {
            session()->put($this->originalUserKey, auth()->user()->id);
        }

        auth()->loginUsingId($user->id);

        session()->put($this->isActiveKey, true);
    }

    /**
     * Logout the impersonated user
     * Log back in as the orignal user
     * Delete the impersonation session
     * @return bool
     */
    public function logout()
    {
        if (!$this->isActive()) {
            return false;
        }

        auth()->logout();

        // log back in as the original user
        $originalUserId = session()->get($this->originalUserKey);

        if ($originalUserId) {
            auth()->loginUsingId($originalUserId);
        }

        session()->forget($this->originalUserKey);
        session()->forget($this->isActiveKey);

        return true;
    }

    /**
     * Is a user currently busy impersonate another user
     * @return mixed
     */
    public function isActive()
    {
        return session()->has($this->isActiveKey);
    }
}
