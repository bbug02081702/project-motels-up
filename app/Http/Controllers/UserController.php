<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Motels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
    
        return view('dashboards.users.index');
    }



            // xu ly luot xem chi tiet bai viet
            public function showview($id){
                $post = Motels::find($id);
                $update = ['count_view' =>$post->count_view + 1,];
                Motels::where('id',$post->id)->update($update);

                $motels = DB::table('motels')->where('id',$id)->get();
                // dd($motels);
                return view('dashboards.users.home.motel.content',compact('motels'));
            }



    public function userHome(){
        // hien thi trang chu mac dinh cho user
         
        $motels = DB::table('motels')->orderBy('created_at', 'DESC')->paginate(2);//sap xep danh sach bai viet theo thu tu bai dang moi nhat
        $motels_countview = DB::table('motels')->orderBy('count_view', 'DESC')->paginate(2); // sap sep danh sach bai viet thoe thu tu bai dang co luet xem cao nhat
        
        // xu ly tim kiem theo tieu de cho trang chu user
        if($title = request()->title){
        $motels = DB::table('motels')->orderBy('created_at', 'DESC')->where('title', 'LIKE', '%'.$title.'%')->paginate(2);
        }

        //xu ly tim kiem theo gia cho trang chu
        if($price = request()->price){
            $motels = DB::table('motels')->orderBy('created_at', 'DESC')->where('price', 'LIKE', '%'.$price.'%')->paginate(2);
        }

        // xu ly tim kiem theo vi tri cho trang chu user
        if($address = request()->address){
            $motels = DB::table('motels')->orderBy('created_at', 'DESC')->where('address', 'LIKE', '%'.$address.'%')->paginate(2);
        }

        return view('dashboards.users.home.index',compact('motels','motels_countview'));
    }

            public function profile(){
                return view('dashboards.users.profile');
            }
            
            // giao dien quan ly bai dang cua user
            public function userPost(){
                $users = DB::table('users')->where('role' ,2)
                ->join('motels', 'users.id', '=', 'motels.id')
                ->select('users.*', 'motels.*')
                ->paginate(2);
                $motels = DB::table('motels')
                ->join('users', 'users.id', '=', 'motels.id')
                ->select('users.*', 'motels.*')
                ->paginate(2);
                // dd($motels);
                return view('dashboards.users.managerpost.index',compact('users','motels'));
            }

            //them cho user
            public function userPostAdd(){
                return view('dashboards.users.managerpost.add');
            }

            public function userPostStore(Request $request){
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
                return redirect()->route('user.post')->with('Thongbao', 'Them danh sach phong tro thanh cong');
            }
                
            // hien thi giao dien sua danh sach phong tro 
            public function userPostEdit($id){
                $motels = Motels::find($id);
                // dd($motels);
                return view('dashboards.admins.managermotels.edit',compact('motels'));
            }
            
            // xu ly sua danh sach phong tro tu form
            public function userPostUpdate(Request $request, $id){
                $motels = Motels::find($id);
                $motels->update($request->all());
                return redirect()->route('user.post')->with('Thongbao', 'Sua danh sach phong tro thanh cong');
        
            }
        
            // xu ly xoa danh sach phong tro theo id
            public function userPostDestroy($id){
                $motels = Motels::find($id);
                $motels->delete();
                return redirect()->route('user.post')->with('Thongbao', 'Xoa danh sach phong tro thanh cong');
            }




    // xu lu thay doi thong tin cua nguoi dung

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
                    return response()->json(['status'=>0,'msg'=>'Đã xảy ra sự cố.']);
                }else{
                    return response()->json(['status'=>1,'msg'=>'Thông tin hồ sơ của bạn đã được cập nhật thành công.']);
                }
            }
    }

    public function updatePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('admin_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //upload anh moi
        $upload = $file->move(public_path($path), $new_name);
        
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Đã xảy ra lỗi, tải ảnh mới lên không thành công.']);
        }else{
            //lay anh cu
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Đã xảy ra lỗi, cập nhật ảnh trong db không thành công.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Ảnh hồ sơ của bạn đã được cập nhật thành công.']);
            }
        }
        }


    public function changePassword(Request $request){
        //Validate form
        $validator = \Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, Auth::user()->password) ){
                        return $fail(__('Mật khẩu hiện tại không chính xác'));
                    }
                },
                'min:4',
                'max:30'
                ],
                'newpassword'=>'required|min:4|max:30',
                'cnewpassword'=>'required|same:newpassword'
            ],[
                'oldpassword.required'=>'Nhập mật khẩu hiện tại của bạn',
                'oldpassword.min'=>'Mật khẩu cũ phải có ít nhất 4 ký tự',
                'oldpassword.max'=>'Mật khẩu cũ không được lớn hơn 30 ký tự',
                'newpassword.required'=>'Nhập mật khẩu mới',
                'newpassword.min'=>'Mật khẩu mới phải có ít nhất 4 ký tự',
                'newpassword.max'=>'Mật khẩu mới không được lớn hơn 30 ký tự',
                'cnewpassword.required'=>'Nhập lại mật khẩu mới của bạn',
                'cnewpassword.same'=>'Mật khẩu mới và Xác nhận mật khẩu mới phải khớp nhau'
            ]);

        if( !$validator->passes() ){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
                
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Đã xảy ra lỗi, Không thể cập nhật mật khẩu trong db']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Mật khẩu của bạn đã được thay đổi thành công']);
            }
        }
    }


            
}
