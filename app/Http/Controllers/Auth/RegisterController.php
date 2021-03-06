<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return View
     * @throws \Exception
     */
    public function showRegistrationForm(): View
    {
        $countUser = cache()->remember('user.count', now()->addHour(), function (){
            return User::count();
        });

        $number = new \NumberFormatter('Id_ID', \NumberFormatter::DECIMAL);

        return view('auth.register', compact('countUser', 'number'))
            ->with('title', __('Bergabung dengan :count Kontributor Lainnya di :app', [
                'count' => $number->format($countUser),
                'app' => config('app.name'),
            ]));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'twitter' => ['nullable', 'string', 'max:15', 'regex:/^[A-Za-z0-9_]{1,15}$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data): User
    {
        DB::transaction(function () use (&$user, $data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'twitter' => $data['twitter'] ?? null,
            ]);

            $user->assignRole(Role::firstOrCreate(['name' => config('permission.role.default')]));
        });

        return $user;
    }
}
