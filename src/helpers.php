<?php

if (!function_exists('impersonate')) {
    /**
     * Helper impersonate() without facade: Impersonate::login()
     *
     * @param User|null $user
     * @return \Illuminate\Foundation\Application|mixed
     */
    function impersonate(User $user = null)
    {
        $impersonate = app('impersonate');

        if (!is_null($user)) {
            return $impersonate->login($user);
        }

        return $impersonate;
    }
}