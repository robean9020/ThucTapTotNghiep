<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function getDanhSach(){
    	$user = User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getSua($id){
    	$user = User::find($id);
    	return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua($id, Request $request){
        $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100',
                'Email'=>'required',
            ],
            [
                'Ten.required' => 'Bạn chưa nhập loại tên tài khoản',
                'Ten.min' =>"Tiêu đề phải lớn hơn 3 ký tự",
                'Ten.max' => 'Tiêu đề không được lớn hơn 100 ký tự',
            ]);
        $user = User::find($id);
        $user->full_name = $request->Ten;
        $user->email = $request->Email;
        if (!empty($_POST['password'])){
        	 $this->validate($request,
            [
                'password'=>'min:6|max:100|confirmed',
            ],
            [
                'password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
                'password.max' => 'Mật khẩu quá dài',
                'password.confirmed' => 'Mật khẩu không được trùng nhau'
            ]);
        	$user->password = bcrypt($request->password);
        }
        $user->phone = $request->SoDienThoai;
        $user->address = $request->DiaChi;
        $user->save();
        return redirect("admin/user/sua/".$id)->with('thongbao','Bạn đã sửa thành công!');
    }

    public function getThem(){
    	return view('admin.user.them');
    }

    public function postThem(Request $request){
    	 $this->validate($request,
            [
                'Ten'=>'required|min:3|max:100',
                'Email'=>'required|email|unique:users,email',
                'password'=>'min:6|max:100|confirmed',
                'DiaChi'=>'required|min:3|max:100',
                'SoDienThoai'=>'required|numeric'
            ],
            [
                'Ten.required' => 'Bạn chưa nhập loại tên tài khoản',
                'Ten.min' =>"Tiêu đề phải lớn hơn 3 ký tự",
                'Ten.max' => 'Tiêu đề không được lớn hơn 100 ký tự',
                'DiaChi.required' => 'Bạn chưa nhập loại địa chỉ',
                'DiaChi.min' =>"Địa chỉ phải lớn hơn 3 ký tự",
                'DiaChi.max' => 'Địa chỉ không được lớn hơn 100 ký tự',
                'SoDienThoai.required' => 'Bạn chưa nhập số điện thoại',
                'SoDienThoai.numeric' => 'Số điện thoại phải là số',
                'Email.email' => 'Vui lòng nhập đúng email',
                'Email.unique' => 'Email đã tồn tại',
                'password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
                'password.max' => 'Mật khẩu quá dài',
                'password.confirmed' => 'Mật khẩu nhập lại chưa đúng'
            ]);
        $user = new User;
        $user->full_name = $request->Ten;
        $user->email = $request->Email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->SoDienThoai;
        $user->address = $request->DiaChi;
        $user->save();
        return redirect("admin/user/them")->with('thongbao','Bạn đã thêm thành công!');
    }

    public function getXoa($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('admin/user/danhsach')->with('thongbao','Bạn đã xóa thành công!');
    }

    public function getDangNhap(){
    	return view('admin.login');
    }

    public function postDangNhap(Request $request){
        $this->validate($request,
    		[
    			'email' => 'required',
    			'password' => 'required|min:3|max:32'
    		],
    		[
    			'email.required' => 'Vui lòng nhập email',
    			'password.min' => 'Mật khẩu phải hơn 3 ký tự',
    			'password.max' => 'Mật khẩu không được quá 32 ký tự',
    			'password.required' => 'Vui lòng nhập mật khẩu'
    		]);
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
    		return redirect('admin/theloai/danhsach');
    	}
    	else{
    		return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
    	}
    }

    public function getDangXuat(){
    	Auth::logout();
    	return redirect('login');
    }
}
