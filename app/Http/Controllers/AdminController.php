<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Motels;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $countUsers = User::all()->count(); //thong ke tong so nguoi dung
        $countPost = Motels::all()->count(); // thong ke tong so bai dang 
        $countMotelsOk = Motels::where('approve','1')->count(); // thong ke tong so phong tro da thue
        $countMotelsNotOk = Motels::where('approve', '0')->count(); //thong ke tong so phong tro chua thue
        return view('dashboards.admins.index',compact('countUsers', 'countPost', 'countMotelsOk', 'countMotelsNotOk'));
    }
    
    function profile(){

        return view('dashboards.admins.profile');
    }

   
    function listMotels(){
        $motels = Motels::orderBy('created_at', 'DESC')->paginate(2);
        // dd($motels);
        // xu ly tim kiem theo gia phong tro
        if($key=request()->key){
            $motels = Motels::orderBy('created_at', 'DESC')->where('price','like', '%'.$key.'%')->paginate(2);
        }
        
        return view('dashboards.admins.managermotels.index',compact('motels'));
    }

    // hien thi giao dien them danh sach phong tro nhap tu form 
    public function addMotels(){

        return view('dashboards.admins.managermotels.add');
    }

    // xu ly khi them danh sach phong tro tu form da dc nhap 
    public function storeMotels(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'images' => 'required',
            'price' => 'required',
        ]);
        
        $motels = Motels::create($request->all());
        if($request->hasFile('images')){
            $request->file('images')->move('fotopegawai/', $request->file('images')->getClientOriginalName());
            $motels->images = $request->file('images')->getClientOriginalName();
            $motels->save();
        }
        // dd($motels);
        return redirect()->route('admin.listmotels')->with('Thongbao', 'Them danh sach phong tro thanh cong');
    }
        
    // hien thi giao dien sua danh sach phong tro 
    public function editMotels($id){
        $motels = Motels::find($id);
        // dd($motels);
        return view('dashboards.admins.managermotels.edit',compact('motels'));
    }
    
    // xu ly sua danh sach phong tro tu form
    public function updateMotels(Request $request, $id){
        $motels = Motels::find($id);
        $motels->update($request->all());
        return redirect()->route('admin.listmotels')->with('Thongbao', 'Sua danh sach phong tro thanh cong');

    }

    // xu ly xoa danh sach phong tro theo id
    public function destroyMotels($id){
        $motels = Motels::find($id);
        $motels->delete();
        return redirect()->route('admin.listmotels')->with('Thongbao', 'Xoa danh sach phong tro thanh cong');
    }

    // xu ly thay doi trang thai phong tro theo id
    public function changeStatusMotels($id){
        $getStatusMotels = Motels::select('approve')->where('id', $id)->first();
        if($getStatusMotels->approve == 1){
             $approve = 0;
        }else{
            $approve = 1;
        }
        Motels::where('id', $id)->update(['approve'=>$approve]);
        return redirect()->back();

    }

    // hien thi giao dien quan danh sach user 
    public function listUsers(){
        $users = User::orderBy('created_at', 'DESC')->paginate(2);
             // xu ly tim kiem theo email
             if($key=request()->key){
                $users = User::orderBy('created_at', 'DESC')->where('email','like', '%'.$key.'%')->paginate(2);
            }    
      
        return view('dashboards.admins.managerusers.index',compact('users'));  
    }
    
    

    // hien thi giao dien them danh sach user nhap tu form 
    public function createUserManager(){
        return view('dashboards.admins.managerusers.add');
    }

    // xu ly khi them danh sach user tu form da dc nhap 
    public function storeUserManager(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'picture' => 'required',
            'email' => 'required',
            
        ]);
        $users = User::create($request->all());

        if($request->hasFile('picture')){
            $request->file('picture')->move('users/images/', $request->file('picture')->getClientOriginalName());
            $users->picture = $request->file('picture')->getClientOriginalName();
            $users->save();
        }
        // dd($users);
        
        return redirect()->route('admin.listusers')->with('Thongbao', 'Them danh sach user thanh cong');
    }
   
    // hien thi giao dien sua danh sach phong tro 
    public function editUserManager($id){
        $users = User::find($id);
        return view('dashboards.admins.managerusers.edit',compact('users'));
    }

    // xu ly sua user tu form
    public function updateUserManager(Request $request, $id){
        $users = User::find($id);
        $users->update($request->all());
        return redirect()->route('admin.listusers')->with('Thongbao', 'Sua user thanh cong');

    }

    // xu ly xoa user theo id
    public function destroyUserManager($id){
        $users = User::find($id);
        $users->delete();
        return redirect()->route('admin.listusers')->with('Thongbao', 'Xoa user thanh cong');
    }

    // xu ly thay doi quyen user theo id
    public function changeStatusUser($id){
        $getStatusUser = User::select('role')->where('id', $id)->first();
        if($getStatusUser->role == 1){
            $role = 0;
        }else{
            $role = 1;
        }
        User::where('id', $id)->update(['role'=>$role]);
        return redirect()->back();

    }


    //---------------------------THONG KE CHI TIET TONG QUAN ADMIN----------------------------//  
    public function dasboard(){
        $countUsers = User::all()->count(); //thong ke tong so nguoi dung
        $countPost = Motels::all()->count(); // thong ke tong so bai dang 
        $countMotelsOk = Motels::where('approve','1')->count(); // thong ke tong so phong tro da thue
        $countMotelsNotOk = Motels::where('approve', '0')->count(); //thong ke tong so phong tro chua thue
        // dd($countPost);
        
        return view('admin.home.dasboard',compact('countUsers', 'countPost', 'countMotelsOk', 'countMotelsNotOk'));
    }

    public function updateInfo(Request $request){
           
            $validator = \Validator::make($request->all(),[
                   'username'=>'required',
                   'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
                   'phone'=>'required',
               ]);

               if(!$validator->passes()){
                   return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
               }else{
                    $query = User::find(Auth::user()->id)->update([
                         'username'=>$request->username,
                         'email'=>$request->email,
                         'phone'=>$request->phone,
                    ]);

                    if(!$query){
                        return response()->json(['status'=>0,'msg'=>'???? x???y ra s??? c???.']);
                    }else{
                        return response()->json(['status'=>1,'msg'=>'Th??ng tin h??? s?? c???a b???n ???? ???????c c???p nh???t th??nh c??ng.']);
                    }
                }
    }

    public function updatePicture(Request $request){
           $path = 'users/images/';
           $file = $request->file('admin_image');
           $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

           //Upload new image
           $upload = $file->move(public_path($path), $new_name);
           
           if( !$upload ){
               return response()->json(['status'=>0,'msg'=>'???? x???y ra l???i, t???i ???nh m???i l??n kh??ng th??nh c??ng.']);
           }else{
               //Get Old picture
               $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

               if( $oldPicture != '' ){
                   if( \File::exists(public_path($path.$oldPicture))){
                       \File::delete(public_path($path.$oldPicture));
                   }
               }

               //Update DB
               $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

               if( !$upload ){
                   return response()->json(['status'=>0,'msg'=>'???? x???y ra l???i, c???p nh???t ???nh trong db kh??ng th??nh c??ng.']);
               }else{
                   return response()->json(['status'=>1,'msg'=>'???nh h??? s?? c???a b???n ???? ???????c c???p nh???t th??nh c??ng.']);
               }
           }
        }


    public function changePassword(Request $request){
           //Validate form
           $validator = \Validator::make($request->all(),[
               'oldpassword'=>[
                   'required', function($attribute, $value, $fail){
                       if( !\Hash::check($value, Auth::user()->password) ){
                           return $fail(__('M???t kh???u hi???n t???i kh??ng ch??nh x??c'));
                       }
                   },
                   'min:4',
                   'max:30'
                ],
                'newpassword'=>'required|min:4|max:30',
                'cnewpassword'=>'required|same:newpassword'
            ],[
                'oldpassword.required'=>'Nh???p m???t kh???u hi???n t???i c???a b???n',
                'oldpassword.min'=>'M???t kh???u c?? ph???i c?? ??t nh???t 4 k?? t???',
                'oldpassword.max'=>'M???t kh???u c?? kh??ng ???????c l???n h??n 30 k?? t???',
                'newpassword.required'=>'Nh???p m???t kh???u m???i',
                'newpassword.min'=>'M???t kh???u m???i ph???i c?? ??t nh???t 4 k?? t???',
                'newpassword.max'=>'M???t kh???u m???i kh??ng ???????c l???n h??n 30 k?? t???',
                'cnewpassword.required'=>'Nh???p l???i m???t kh???u m???i c???a b???n',
                'cnewpassword.same'=>'M???t kh???u m???i v?? X??c nh???n m???t kh???u m???i ph???i kh???p nhau'
            ]);

           if( !$validator->passes() ){
               return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
           }else{
                
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'???? x???y ra l???i, Kh??ng th??? c???p nh???t m???t kh???u trong db']);
            }else{
                return response()->json(['status'=>1,'msg'=>'M???t kh???u c???a b???n ???? ???????c thay ?????i th??nh c??ng']);
            }
        }
    }

}
