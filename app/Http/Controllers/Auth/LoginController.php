<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

	public function login(Request $request) {

//		$this->validate($request, [
//			'mobile_no' => 'required',
//			'national_code' => 'required',
//		]);

		$mobile = $request->mobile_no;
		$nCode = $request->national_code;

		$check = User::where('mobile_no', $mobile)->where('national_code', $nCode)->first();

		if( $check === null )
		{
			$request->session()->flash('status', 'It is not registered yet');
			return redirect(route('login'));
//			return redirect(route('login'))->with('message', 'not found');
		}
		else
		{
			Auth::login($check);

			return redirect(route('home'));
		}

//		if (Auth::attempt(['mobile_no' => $mobile, 'password' => $nCode]) )
//		{
//			return redirect()->intended('/');
//		}
//		else
//		{
//			return redirect('/login');
//		}
    }

	/*protected function validateLogin(Request $request)
	{
//		dd($request);
		$request->validate([
			$this->username() => 'required|string',
			'national_code' => 'required|string',
		]);
	}
	protected function credentials(Request $request)
	{
//		dd($request->only($request->mobile_no, $request->national_code));
		return $request->only($request->mobile_no, $request->national_code);
	}
	public function username()
	{
//		dd("ss");
		return 'mobile_no';
	}

	public function authenticate(Request $request)
	{
//		$credentials = $request->only('mobile_no', 'national_code');

//		dd(Auth::user()->mobile_no);
		if (Auth::attempt(['mobile_no'=>$request->mobile_no, 'national_code'=> $request->national_code()])) {
//		if (Auth::attempt(['mobile_no'=>Auth::user()->mobile_no, 'national_code'=> Auth::user()->national_code()])) {
			// Authentication passed...
			return redirect()->intended('dashboard');
		}
	}*/
}
