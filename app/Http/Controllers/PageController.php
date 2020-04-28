<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Contacts;
use Hash;
use Auth;
class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
    	// return view('page.trangchu',['slide'=>$slide]);
        $new_product = Product::where('new',1)->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sanpham = ProductType::where('id',$type)->first();
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sanpham'));
    }

    public function getChiTietSp(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuong_tu  = Product::where('id_type',$sanpham->id_type)->paginate(3);
    	return view ('page.chitiet_sanpham',compact('sanpham','sp_tuong_tu'));
    }

    public function getLienHe(){
    	return view('page.lienhe');
    }

    public function postLienHe(Request $request){
        $this->validate($request,
            [
                'Ten'=> 'required|min:3|max:100',
                'Email'=> 'required|email',
                'TieuDe'=>'required|min:3|max:100',
                'LienHe'=>'required|min:3|max:100'
            ]);
        $lienhe = new Contacts;
        $lienhe->name = $request->Ten;
        $lienhe->email = $request->Email;
        $lienhe->subject = $request->TieuDe;
        $lienhe->message = $request->LienHe;
        $lienhe->save();
        return redirect()->back()->with('thongbao','Cám ơn bạn, chúng tôi sẽ xem xét tin nhắn của bạn sớm nhất có thể!');
    }

    public function getGioiThieu(){
    	return view('page.gioithieu');
    }

    public function getAddtoCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDeleteItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->save();
        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill-> save();
        $bill_detail = new BillDetail;
        foreach($cart ->items as $key => $value){
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }

    public function getCart(){
        return view('page.dat_hang');
    }

    public function getLogin(){
        return view('page.login');
    }

    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price',$req->key)->get();
        return view('page.search',compact('product'));
    }
}
