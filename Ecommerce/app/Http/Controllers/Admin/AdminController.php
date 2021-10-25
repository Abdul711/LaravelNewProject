<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Hash;
use Cookie;
class AdminController extends Controller
{
   public function login(Request $request){

     $email=$request->post("email");
     $password=$request->post("password");




     $validEmail="/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i";
     if(!preg_match_all($validEmail,$email)){
      session()->flash("error_message","Invalid Email You Entered");
      return    redirect("admin");
     }  
       $data=DB::table("admins")->where("email","=",$email)->get();
         if(isset($data[0])){
            if($data[0]->role!=0 && $data[0]->verified==0){
               session()->flash("error_message","Please Wait Until Admin Give Permisssion To Login");
               return    redirect("admin");
             }
             if($data[0]->role!=0 && $data[0]->status==0){
               session()->flash("error_message","Your Are Blocked By Admin");
               return    redirect("admin");
             }
             if(Hash::check($password, $data[0]->password)){
               $request->session()->put('ADMINID',$data[0]->id );
               $request->session()->put('ADMINUSER',$data[0]->username );
               $request->session()->put('ADMIN_LOGIN',true);
               $request->session()->put('ADMINROLE',$data[0]->role );
                return redirect('admin/dashboard');
            }else{
               session()->flash("error_message","Wrong Password");
               return    redirect("admin");
            }
         }else{
            session()->flash("error_message"," Email $email is Not Register");
            return    redirect("admin");
         }
   


   }
     public function index()
     {
        if(session()->has("ADMIN_LOGIN")){
           return redirect("admin/dashboard");
        }
  return view("admin/login");   
     }
      public function signup()
     {
        return view('admin/signup');
     }
     public function forgot()
     {
         
        return view('admin/forgot');
     }
     public function register(Request $req){
      $mobile=$req->post("mobile");
      $agree=$req->post("aggree");
      $email=$req->post("email");
      $post=$req->post("post");
  
      $username=$req->post("username");
      $password=$req->post("password");
   $validator = Validator::make($req->all(), [
      'username' => 'required|min:5|max:55|min:5|alpha',
 
   "mobile"=>"required",
   "password"=>"required",
          
            "email"=>"required|email|unique:admins,email,032",
   "post"=>"required"
  ],['username.required'=>"User Name Must Be Filled Out","username.alpha"=>"Username Must Be Alphabatic"]);

  if ($validator->fails()) {
      return redirect('admin/signup')
                  ->withErrors($validator)
                  ->withInput();
  }else{
  

     if(!isset($agree)){
        session()->flash("agreecondition","Must Agree With Temm And condition");
        return redirect("admin/signup");
     }
        if($post=="vendor"){
         $role=1;
        }if($post=="rider"){
           $role=2;
        }

       
        $de= DB::table("admins")->insert([
           "status"=>1,
           "email"=>$email,
           "added_on"=>date('Y-m-d'),
           "password"=>Hash::make($password),
           "role"=>$role,"verified"=>0,"mobile"=>$mobile,"username"=>$username]);
    if($de){
       session()->flash("successmsg","Success");
       return redirect("admin/signup");
    }
      }


     }
     public function dashboard(){
return view("admin/index");
   }
}
