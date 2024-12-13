<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Actions\CanonicalizeUsername;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\LoginResponse;

use App\Models\BlogPost;
use App\Models\User;
use App\Models\Service;
use App\Models\Order;





class AdminController extends Controller
{
    /**
     * The guard implementation.
     *
     * @var \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected $guard;

    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function loginForm(){
        return view('auth.login', ['guard' => 'admin']);
    }

    /**
     * Show the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LoginViewResponse
     */
    public function create(Request $request): LoginViewResponse
    {
        return app(LoginViewResponse::class);
    }

    /**
     * Attempt to authenticate a new session.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return mixed
     */
    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return app(LoginResponse::class);
        });
    }

    /**
     * Get the authentication pipeline instance.
     *
     * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Pipeline\Pipeline
     */
    protected function loginPipeline(LoginRequest $request)
    {
        if (Fortify::$authenticateThroughCallback) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                call_user_func(Fortify::$authenticateThroughCallback, $request)
            ));
        }

        if (is_array(config('fortify.pipelines.login'))) {
            return (new Pipeline(app()))->send($request)->through(array_filter(
                config('fortify.pipelines.login')
            ));
        }

        return (new Pipeline(app()))->send($request)->through(array_filter([
            config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
            config('fortify.lowercase_usernames') ? CanonicalizeUsername::class : null,
            Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Laravel\Fortify\Contracts\LogoutResponse
     */
    public function destroy(Request $request): LogoutResponse
    {
        $this->guard->logout();

        if ($request->hasSession()) {
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return app(LogoutResponse::class);
    }

    public function new_blog_post()
    {
        return view('/blogposts');
    }

    public function new_post ( Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $user_id = $admin->id;

        $name = $admin->name;

        $usertype = $admin->usertype;

        $post=new BlogPost;

        $post->heading = $request->heading;

        $post->about = $request->about;

        $post->post_status = 'active';

        $post->user_id = $user_id;

        $post->name = $name;

        $post->usertype = $usertype;

        $image = $request->picture;

        if($image){

            $imagename = time(). '.' .$image->getClientOriginalExtension();

            $request->picture->move('blogpostpic', $imagename);

            $post->picture = $imagename;
        }

        $post->save();

        return redirect()->back()-> with ('message','Blog Post added successfully');
    }

    public function show_blog_posts()
    {
        $post = BlogPost::all();

        return view('/displayposts', compact('post'));
    }

    public function delete_blog_post($id)
    {
        $post = BlogPost::find($id);

        $post->delete();

        return redirect()->back()->with('message','Blog Post deleted successfully');
    }

    public function accept_post($id)
    {
        $post = BlogPost::find($id);

        $post->post_status="active";

        $post->save();

        return redirect()->back()->with('message','Post status changed to active');
    }

    public function reject_post($id)
    {
        $post = BlogPost::find($id);

        $post->post_status="rejected";

        $post->save();

        return redirect()->back()->with('message','Post status changed to rejected');
    }

    public function show_users()
    {
        $post = User::all();

        return view('/displayusers', compact('post'));
    }

    public function delete_user($id)
    {
        $post = User::find($id);

        $post->delete();

        return redirect()->back()->with('message','User deleted successfully');
    }
}
