<?php

namespace App\Http\Middleware;

use App\Models\UserView;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $this->setSessionUser($request->route('username'));

        $this->authenticate($request, $guards);
        return $next($request);
    }

    /**
     * I defined the session user using the username route parameter, if authenticated.
     *
     * @param $username
     */
    private function setSessionUser($username)
    {
        if ($this->auth->check()) {
            $user = $this->getAllowedUser($username);
            $user->himself = $user['id'] === $this->auth->user()->id;

            Session::put('user', $user);
        }
    }

    /**
     * Obtain a user whose access is allowed to the authenticated user.
     *
     * @param $username
     * @return mixed
     */
    private function getAllowedUser($username)
    {
        if ($username === $this->auth->user()->username) {
            return UserView::find($this->auth->user()->id);
        }

        $user = UserView::where('username', $username)->first();
        if ($user === null || $user->access_profile === config('model.user.access_profile.superuser')) {
            return UserView::find($this->auth->user()->id);
        }

        return ($this->auth->user()->access_profile !== config('model.user.access_profile.superuser') &&
            $this->auth->user()->access_profile !== config('model.user.access_profile.admin'))
            ? UserView::find($this->auth->user()->id)
            : $user;
    }
}
