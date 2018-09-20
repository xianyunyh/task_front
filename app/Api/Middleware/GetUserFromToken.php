<?php
namespace App\Api\Middleware;
use Closure;
use Illuminate\Http\Request;
use Dingo\Api\Auth\Auth;
class GetUserFromToken
{

    protected $auth;
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

}