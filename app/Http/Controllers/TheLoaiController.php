<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
    	$theloai = ProductType::all();
    	return view('admin.theloai.danhsach',['telo'=>$theloai]);
    }

    public function getThem(){
    	return view('admin.theloai.them');
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'Ten' => 'required|min:3|max:50|unique:type_products,name',
                'MoTa'=> 'min:1|max:300',
                'Anh'=> 'image|mimes:jpg,png,jpeg'
            ],
            [
                'Ten.required' => 'Không được để trống tên',
                'Ten.min' => 'Tên phải lớn hơn 3 ký tự',
                'Ten.max' => 'Tên không được quá 50 ký tự',
                'Ten.unique' => 'Tên thể loại đã tồn tại',
                'MoTa.min' => 'Mô tả quá ngắn',
                'MoTa.max' => 'Mô tả quá dài',
                'Anh.mimes' => 'Bạn phải upload file ảnh'

            ]);
        $theloai = new ProductType;
        $theloai->name = $request->Ten;
        $theloai->description = $request->MoTa;
        if($request->hasFile('Anh')){
            $file = $request->file('Anh');
            $name = $file->getClientOriginalName();
            $file->move("source/image/product_type",$name);
            $theloai->image = $name;
        }
        else{
            $theloai->image = "";
        }
        $theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Thêm thành công!');
    }

    public function getSua($id){
        $theloai = ProductType::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    
    public function postSua($id, Request $request){
        $this->validate($request,
            [
                'Ten' => 'required|min:1|max:50',
                'MoTa'=> 'min:3|max:300',
                'Anh'=> 'image|mimes:jpg,png,jpeg'
            ],
            [
                'Ten.required' => 'Không được để trống tên',
                'Ten.min' => 'Tên phải lớn hơn 3 ký tự',
                'Ten.max' => 'Tên không được quá 50 ký tự',
                'MoTa.min' => 'Mô tả quá ngắn',
                'MoTa.max' => 'Mô tả quá dài',
                'Anh.mimes' => 'Bạn phải upload file ảnh'

            ]);
        $theloai = ProductType::find($id);
        $theloai->name = $request->Ten;
        $theloai->description = $request->MoTa;
        if($request->hasFile('Anh')){
            $file = $request->file('Anh');
            $name = $file->getClientOriginalName();
            $file->move("source/image/product_type",$name);
            $theloai->image = $name;
        }
        $theloai->save();
        return redirect('admin/theloai/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
        $theloai = ProductType::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach')->with('thongbao','Xóa thành công!');
    }
}
