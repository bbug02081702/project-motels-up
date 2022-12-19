<?php

namespace App\Http\Controllers;

use App\Models\Motels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index(){
    
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

        return view('dashboards.users.home.index',compact('motels', 'motels_countview'));
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



   

                function profile(){
                    return view('dashboards.users.profile');
                }
                function settings(){
                    return view('dashboards.users.settings');
                }


               


}
