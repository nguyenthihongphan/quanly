<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'user_flg',
        'phone',
        'address',
        'birth',
        'avatar',
        'information',
        'deleted_by',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * create user
     */
    public function getAllUser(){
        return User::all();
    }

    public function register($data){
        $email   = $data['email'];
        $firstname   = $data['firstname'];
        $lastname   = $data['lastname'];
        $password   = $data['password'];           
        $user_flg   = $data['user_flg'];
        $city   = $data['city_name'];
        $district   = $data['district_name'];
        $checkEmail = User::where('email', $email)->first(); 
        if (!$checkEmail) {
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->user_flg = $user_flg ;
            $this->address = $city .",". $district;
            $this->email = $email;
            $this->password = Hash::make($password);
            // $this->created_by = 1;
            // $this->updated_at = $request->update_at;
            // $this->created_at = $request->created_at;
            $this->save();
            return true;
        } 
        else {
            return false;
        }
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:Y-m-d',   
        'options' => Json::class,
    ];

    public function getUserEmail($email){
        return User::where('email', $email)->first();
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   
    public function order(){
        return $this->hasMany('App\Models\Order', 'user_id', 'id');
    }

    public function getFullName($id){
        $fullname = User::find($id);
        if($fullname){
            return $fullname->firstname.' '.$fullname->lastname;
        } 
        else {
            return false;
        }
    }

    public static function search($word,$type){
            $result = User::Query();    
            $email   = $word['email'];
            $orderFrom = $word['orderFrom'];
            $orderTo   = $word['orderTo'];
            $phone   = $word['phone'];
            $birth   = $word['birth'];
            $user_flg  = $word['user_flg'];   
            // $information  = $word['information'];            
                if( $email != null){
                    $result = $result->where('email', 'LIKE', "%" . $email. "%");
                }
                if( $phone != null){
                    $result = $result->where('phone', 'LIKE', "%" . $phone . "%");
                }
                if( $birth != null){
                    $result = $result->where('birth', 'LIKE', "%" . $birth . "%");
                }
                if( $user_flg != null){
                    $result = $result->where('user_flg', 'LIKE', "%" . $user_flg . "%");
                }
                if( $orderFrom!= null &&  $orderTo!= null){
                    $result =$result->whereHas('order', function ($query) use ($word){
                    $query->whereBetween('created_at', [$word['orderFrom'], $word['orderTo']]);
                    });
                }
                if( $orderFrom){
                    $result = $result->where('created_at', '>=', $orderFrom);
                    $result = $result->with(['order' => function($query){
                        $query->orderBy('created_at', 'desc');
                    }]);
                }
                // if( $information != null){
                //     $result = $result->where('information', 'LIKE', "%" . $information . "%");
                // }
                else{
                    return $result->get();
                }        
                if($type == 'pdf') {
                    return $result->get();
                }        
                return $result->paginate(20);           
    }

    public function checkEmail($email){
        $checkEmail = User::where('email', $email)->first();
        if($checkEmail){
            return true;
        } 
        else {
            return false;
        }
    }

        public function add($data){           
            $this->firstname = $data['firstname'];
            $this->lastname = $data['lastname'];
            $this->user_flg = $data['user_flg'];
            $this->email = $data['email'];
            $this->phone = $data['phone'];
            $this->address = $data['address'];
            $this->birth = $data['birth'];
            $this->information = $data['information'];
            $this->password = Hash::make($data['password']);
            $this->save();           
        }
        
        public function updateUser($data){
            $this->firstname = $data['firstname'];
            $this->lastname = $data['lastname'];
            $this->user_flg = $data['user_flg'];
            $this->email = $data['email'];
            $this->phone = $data['phone'];
            $this->address = $data['address'];
            $this->birth = $data['birth'];
            $this->password = Hash::make($data['password']);
            $this->avatar = $data['avatar'];
            $this->information = $data['information'];
            $this->save();
            return true;
    
        }
        //Mutators
        public function firstname():Attribute{
            return Attribute::make(
                get: fn($value)=>ucfirst($value),
                set: fn ($value) => strtolower($value),
            );
        }
}

