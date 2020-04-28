<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function getDanhSach(){
    	$khachhang = Customer::all();
    	return view('admin.khachhang.danhsach',compact('khachhang'));
    }

    public function getThem(){
		$khachhang = Customer::all();
    	return view('admin.khachhang.them',['khachhang'=>$khachhang]);
    }

     public function getSua($id){
        $khachhang = Customer::find($id);
    	return view('admin.khachhang.sua',['khachhang'=>$khachhang]);
    }

    public function postSua($id,Request $request){
    	$this->validate($request,
    		[
    			'Name'=>'required|min:3|max:100',
    			'Email' => 'required|email',
    			'DiaChi'=>'required|min:3|max:100',
    			'SoDienThoai'=> 'numeric|required'
    		],
    		[
    			'Name.required' => 'Bạn chưa nhập tên',
    			'Name.min' =>"Tên phải lớn hơn 3 ký tự",
    			'Name.max' => 'Tên không được lớn hơn 100 ký tự',
    			'DiaChi.required' =>'Bạn chưa nhập địa chỉ',
    			'DiaChi.min' => 'Địa chỉ quá ngắn',
    			'DiaChi.max' => 'Địa chỉ quá dài',
    			'SoDienThoai.required' => 'Bạn chưa nhập số điện thoại',
    			'SoDienThoai.numeric' => 'Số điện thoại nhập phải là số',
    			'email.required' => 'Bạn chưa nhập email',
    			'email.email' => 'Định dạng trường email không hợp lệ'
    		]);
    	$khachhang = Customer::find($id);
    	$khachhang->name = $request->Name;
    	$radioChecked = $_POST['rdoStatus'];
        if($radioChecked == "0"){
            $khachhang->gender = 0;
        }
        elseif ($radioChecked == "1") {
            $khachhang->gender = 1;
        }
        $khachhang->email = $request->Email;
    	$khachhang->address = $request->DiaChi;
    	$khachhang->phone_number = $request->SoDienThoai;
    	$khachhang->save();
    	return redirect('admin/khachhang/sua/'.$id)->with(['notification'=>'Sửa thành công!']);
    }

    public function getXoa($id){
    	$khachhang = Slide::find($id);
    	$khachhang->delete();
    	return redirect('admin/khachhang/danhsach')->with('notification','Xóa thành công!');
    }
}
