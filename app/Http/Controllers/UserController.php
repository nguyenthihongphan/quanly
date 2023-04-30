<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class UserController extends Controller
{
    //index user
    public function index(){        
        $userList=  User::paginate(6);        
        return view('users.list', compact('userList'));   
    }

    public function add(){
        return view('users.add');
    }

    public function show($id){
        $userList = User::find($id);
        return view('users.edit', compact('userList'));
    }

    public function store(Request $request){  
        $userList= new User;
        $data=$request->all();
        $userList->add($data);   
        return redirect()->route('list')->with('success', 'File uploaded successfully.');
    }

    public function editUser($id){
        $userList= User::find($id);
        $firstname = $userList->firstname;
        return view('users.edit', compact('userList'));
    }

    public function update(Request $request,$id){
        $userList= User::find($id);
        $data =$request->all();
        if($request->hasFile('avatar'))
        {
            $file=$request->file('avatar');
            $extention = $file->getClientOriginalName();
            $filename = time().'.'.$extention;
            $file->move(public_path('storage/images'),$filename);
            $userList['avatar']="$filename";
        }else{
            unset($userList['avatar']);
        }
        $userList->updateUser($data);
        return redirect()->route('list')->with('success','user updated');
    }
    public function destroy($id){
            $userList = User::find($id);
            $userList->delete();    
            return redirect()->route('list')->with('success', 'Stock removed.');  // -> resources/views/stocks/index.blade.php
        }

    public function search(Request $request){  
            $data=DB::table('users')->join('order','user_id','=','users.id=user_id');
            $data = $request->only('email', 'phone', 'user_flg', 'orderFrom', 'orderTo', 'birth','information');
            $userModel = new User();
            //check exist
            if(!isset($data['email'])){
                $data['email'] = '';
            }
            if(!isset($data['phone'])){
                $data['phone'] = '';
            }
            if(!isset($data['user_flg'])){
                $data['user_flg'] = '';
            }
            if(!isset($data['orderFrom'])){
                $data['orderFrom'] = '';
            }
            if(!isset($data['orderTo'])){
                $data['orderTo'] = '';
            }
            if(!isset($data['birth'])){
                $data['birth'] = '';
            }       
            if(!isset($data['information'])){
                $data['information'] = '';
            }      
            $type  ='';
            $users = $userModel->search($data,$type);    
            $message03 = Config::get('constant.messages.E03');
            //dd($users);
            return view('users.search')->with('users', $users)->with('message', $message03)->with('data', $data);
        }
    
}