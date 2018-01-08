<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\JobSeeker;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_type' => isset($data['user_type'])?$data['user_type']:'job_seeker',
        ]);

        $job_seeker = new JobSeeker([
        'name'=> $data['name'],
        'email'=> $data['email'],
        'phone'=> $data['phone'],
        'date_of_birth' => $data['date_of_birth'],
        'gender' => $data['gender'],
        'education_level' => $data['education_level'],
        'current_location' => $data['current_location'],
        'tribe' => $data['tribe'],
        // 'photo' => isset($data['photo'])?$data['photo']:NULL,
        'national_id' => $data['national_id'],
        // 'experience_years' => $data['experience_years'],
        // 'spoken_languages' => $data['spoken_languages'],
        // 'religion' => $data['religion'],
        // 'employment_status' => $data['employment_status'],
        // 'marital_status' => $data['marital_status'],
        // 'max_children' => $data['max_children'],
        // 'health_conditions' => $data['health_conditions']
        ]);

        $user->jobSeeker()->save($job_seeker);

        return $user;
    }
}
