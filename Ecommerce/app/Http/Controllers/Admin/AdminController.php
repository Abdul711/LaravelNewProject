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
 function  websetting(){
         $data=DB::table('setting')->get();
            if(isset($data[0])){
             $result['delivery_charge']=$data[0]->delivery_charge;
             $result['cart_min_amount']=$data[0]->cart_min_amount;
             $result['delivery_time']=$data[0]->delivery_time;
             $result['web_status']=$data[0]->web_status;
             $result['min_item']=$data[0]->min_item;
             $result['referral_amount']=$data[0]->referral_amount;
             $result['welcome_amount']=$data[0]->welcome_amount;
             $result['amount_delivery']=$data[0]->amount_delivery;
            }else{
               $result['delivery_charge']="";
               $result['cart_min_amount']="";
                 $result['delivery_time']="";
                 $result['web_status']="";
               $result['min_item']="";
                 $result['referral_amount']="";
                 $result['welcome_amount']="";
                 $result['amount_delivery']="";
            }


  $result["pageTitle"]="Manage Setting";
      return view("admin/manage_setting",$result);
   }
   function banner(){
      $data=DB::table('banner')->get();
      $result["banners"]=$data;

        return view("admin/banner",$result);
   }
function   manage_banner($id=null){
     if($id==null){
        $pageTitle="Add Banner";
        $image="";
        $linktext="";
        $bannerText="";
     }else{
      $pageTitle="Update Banner";
      $image=time().".png";
      $ti=time();
      $today=date("d-m-Y H:i");
     $t= strtotime("+1 days");
     $data=DB::table('banner')->where('id','=',$id)->get();
     $image=$data[0]->image;
   $linktext=  date('d-F-Y h:i a', strtotime(' +1 month 29 day 2 hours 15 minutes', strtotime($today)));
 $bannerText="shop";

 $linktext=$data[0]->linktext;;

 $bannerText=$data[0]->text;
     }
      $result["pageTitle"]=$pageTitle;
      $result["id"]=$id;
      $result["image"]=$image;
      $result["LinkText"]=$linktext;
      $result["bannerText"]=$bannerText;
       return view("admin/manage_banner",$result);
      prx($result);
   }
 function  banner_manage(Request $req){
   $id=$req->post("id");
   $linktext=$req->post("LinkText");
   $bannerText=$req->post("bannerText");

        if($id==""){

         if($req->hasfile("bannerImage")){
         $image=$req->file("bannerImage");
         $ext=$image->extension();
        $image_name=time().".".$ext;
        $path="/public/media/banner";
          $image->storeAs($path,$image_name);
          DB::table('banner')->insert([
             "image"=>$image_name,
            "text"=>$bannerText,
            "linktext"=>$linktext,
         "added_on"=>date("Y-m-d H:i:s")
          ]);
         }else{
            return redirect(url()->previous());
         }
        }else{
         if($req->hasfile("bannerImage")){
            $image=$req->file("bannerImage");
            $ext=$image->extension();
           $image_name=time().".".$ext;
           $path="/public/media/banner";
             $image->storeAs($path,$image_name);
            }else{
         $data=DB::table('banner')->where('id','=',$id)->get();
               $image_name-$data[0]->image;
            }
            DB::table('banner')->where('id','=',$id)->update([
               "image"=>$image_name,
              "text"=>$bannerText,
              "linktext"=>$linktext,
           "added_on"=>date("Y-m-d H:i:s")
            ]);
        }

       return redirect("admin/banner");



      prx($req->post());




   }
   function  websettingmanage(Request $req){


     $result=$req->post();

     unset($result["_token"]);



             $data_sett=DB::table('setting')->get();
                if($data_sett[0]){
                  $data_set=DB::table('setting')->first();
                  $id=$data_set->id;
                  $result["id"]=$id;
                  DB::table('setting')->where('id','=',$id)->update($result);
                }else{

                   DB::table('setting')->insert($result);
                   $y=url()->previous();

                }
                return redirect("admin/setting");

       }
}
