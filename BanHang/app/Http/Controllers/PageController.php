<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Bill;
use App\BillDetail;
use App\Customer;
use App\Users;
use Session;
use Hash;
use Auth;

use Illuminate\Http\Request;
use  App\Http\Requests\registerRequest;
use  App\Http\Requests\loginRequest;

class PageController extends Controller
{
    public function getIndex(){
        $slide=Slide::all();
        //Lay san pham hien thi cho san pham moi nhat
        $new_product=Product::where('new',1)->paginate(8);
        //Lay san pham hien thi khuyen mai
        $sanpham_khuyenmai=Product::where('promotion_price','<>',0)->orderBy('promotion_price')->paginate(4);

        return view('page.trangchu', compact('slide','new_product','sanpham_khuyenmai'));
    }

    public function getLoaiSp($type){
        //Lay san pham hien thi theo loai
        $sp_theoloai=Product::where('id_type',$type)->limit(3)->get();
        //lay san pham hien thi khac <> loai
        $sp_khac=Product::where('id_type','<>',$type)->limit(3)->get();
        //Lay san pham hien thi theo loai typeproduct cho menu ben trai
        $loai=ProductType::all();
        //Lay ten loai sna pham moi khi chung ta chon danh muc loai sna pham(phan menu ben trai)
        $loai_sp=ProductType::where('id',$type)->first();
        return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }

    public function getChitiet(Request $req){
        $sanpham=Product::where('id',$req->id)->first();
        //Lay san pham lien quan = la san pham tuong tu
        $sp_tuongtu=Product::where('id_type',$sanpham->id_type)->paginate(6);
        //Lay san pham ban chay = la san pham co truong new=1
        $sp_banchay=Product::where('promotion_price','=',0)->paginate(3);
        //Lay san pham MOI NHAT LA SAN PHAM MOI CAP NHAT
        $sp_new=Product::select('id','name','id_type','description','unit_price','promotion_price','image','unit','new','created_at','updated_at')->where('new','>',0)->orderBy('updated_at','ASC')->paginate(3);
        return view('page.chitiet_sanpham', compact('sanpham','sp_tuongtu','sp_banchay','sp_new'));
    }

    public function getLienhe(){
        return view('page.lienhe');
    }

    public function getAbout(){
        return view('page.about');
    }

    public function getAddtoCart(Request $req, $id){
        $product=Product::find($id);
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product, $id);
        $req=session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getDelItemCart($id){
        $oldCart =Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            Session::put('cart', $cart);
        }
        else{
            session::forget('cart');
        }
        return redirect()->back();
    }

    //Dat hang
    public function order(Request $re){
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
       return view('page.dat_hang')->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,
       'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);;
    }

    public function postCheckout(Request $req){
         $cart=Session::get('cart');
         $customer=new Customer;
         $customer->name=$req->full_name;
         $customer->gender=$req->gender;
         $customer->email=$req->email;
         $customer->address=$req->address;
         $customer->phone_number=$req->phone;
         $customer->note=$req->note;
         $customer->save();

        $bill=new Bill;
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment_method;
        $bill->note=$req->note;
        $bill->save();

        foreach($cart->items as $key=>$value){
            $bill_detail=new BillDetail;
            $bill_detail->id_bill=$bill->id;
            $bill_detail->id_product=$key;
            $bill_detail->quantity=$value['qty'];
            $bill_detail->unit_price=$value['price']/$value['qty'];
            $bill_detail->save();
        }

        Session::forget('cart');
        return redirect('index')->with('success','Dat hang thanh cong');
    }
    public function getLogin(){
        return view('page.login');

    }
    public function getSignup(){
        return view('page.signup');
    }

    public function postSignup(registerRequest $req){
        $user = new Users();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect('index')->with('success','Tao tai khoan thanh cong');
    }


    public function postLogin(loginRequest $req){
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        $user = Users::where([
                ['email','=',$req->email],
            ])->first();

        if($user){
            if(Auth::attempt($credentials)){
                $req->session()->put('users', $user);
            return redirect('index')->with('success','Đăng nhập thành công');
            }
            else{
                return redirect('dangnhap')->with('danger','Đăng nhập không thành công');
            }
        }
        else{
            return redirect('dangnhap')->with('danger','Tài khoản chưa kích hoạt');

        }

    }

    public function getLogout(Request $req){
        $req->session()->forget('users');
        return redirect('index')->with('success','Logout thành công');

    }

}
