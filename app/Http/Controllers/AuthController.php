<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\City;
use App\Models\District;
use App\Jobs\SendEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        #check if user is logged in by session using middleware Authenticate
        return view('auth.dashboard');
    

    }

    public function login(){
        if (Auth::check()) {
            return redirect()->route('admin');
        } else {
            
            return view('auth.login');
        }
    }

    public function register(Request $request){
        if(Auth::check()){
            return redirect()->route('admin');
        } 
        else {
            $data = $request->session()->get('data');
            $cities = new City();
            $data['city']=$cities->getAll();        
                 
            return view('auth.register')->with('data', $data);
        }

    }

    public function account(Request $request){
        $users = new User();
        $user_flg = config('constant.values.role.user');    
        $data = $request->session()->get('data');
        $data['user_flg'] = $user_flg;
        $acc = $users->register($data);
        SendEmail::dispatch($data)->delay(now()->addMinute(1));
        if ($acc == true) {
            return redirect()->route('login')->with('success', 'Create account successfully!');
        } 
        else {
            return redirect()->route('register')->with('error', 'Email is existed!');
        }     
    }

    public function checkLogin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        #check if user is logged in by session
        if (Auth::check()) {
            return redirect()->route('admin');
        } 
        else {
            #check if user is logged in by database
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    #login user
                    Auth::login($user);
                    return redirect()->route('admin');
                } 
                else {
                    return redirect()->route('login')->with('error', 'Password is incorrect!');
                }
            } 
            else {
                return redirect()->route('login')->with('error', 'Email is incorrect!');
            }
        }
    }
    
    public function logout(Request $request){
        Auth::logout();
        return redirect('login');
    }
   
    public function confirm(Request $request){
        $data = $request->all();
        $userControll = new User();
        $pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
        $validated_data = Validator::make($data, [
            'password' => 'regex:'.$pattern,
        ])->validate();
        if($validated_data == true){
            $data['password'] = Hash::make($data['password']);
            $checkEmail = $userControll ->checkEmail($data['email']);
            if($checkEmail == true){
                $messageE01 = config('constant.messages.E01');
                return redirect()->route('register')->with('error', $messageE01);
            } 
            else {
                $request->session()->put('data', $data);
                return redirect()->route('register.confirm');
            }
        }
        else {
            $messageE02 = config('constant.messages.E02');
            return redirect()->route('register')->with('error', $messageE02);
        }
    }

    public function confirmRegister(Request $request){
        $data = $request->session()->get('data');
        $CityControl = new City();
        $allName = $CityControl->getAllNameById($data['city'], $data['district']);
        $data['city_name'] = $allName['city_name'];
        $data['district_name'] = $allName['district_name'];
        $request->session()->put('data', $data);
        if($data == null){
            return redirect()->route('register');
        } 
        else {
            return view('auth.confirm', compact('data'));
        }
    }
   
    public function getDistrict(Request $request)
    {   $data = $request->all();
         $data['district']= District::where("city_id",$request->city_id)->get(["name", "id"]);
        return response()->json($data);
    }  
}

