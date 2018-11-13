<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Bill;
use App\BillDetail;
use App\Cart;
use App\Customer;
use App\Like;
use App\Product;
use App\ProductType;
use App\Slide;
use App\User;
use Session;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = DB::table('slide')->get();
        $new_products = DB::table('products')->where('new', 1)->paginate(8);
        $sale_products = DB::table('products')->where('promotion_price', '<>', 0)->paginate(8);
        return view('page.trangtru', compact('slide', 'new_products', 'sale_products'));
    }
    public function loaisanpham($type){
        $type_sanpham = DB::table('products')->where('id_type', $type)->get();
        $type_sanpham_km = DB::table('products')->where([
            ['id_type', $type], ['promotion_price', '<>', 0]
        ])->get();
        return view('page.product_type', compact('type_sanpham', 'type_sanpham_km'));
    }
    public function detail(Request $request){
        $sp = DB::table('products')->where('id', $request->id)->first();
        $sp_tuongtu = DB::table('products')->where('id_type', $sp->id_type)->paginate(3);
        $sale = DB::table('products')->where([
            ['promotion_price', '<>', 0], ['id_type', $sp->id_type]
        ])->paginate(4);
        return view('page.product_detail', compact('sp', 'sp_tuongtu', 'sale'));
    }
    public function about(){
        return view('page.about');
    }
    public function contacts(){
        return view('page.contacts');
    }
    public function addtocart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function remove($id){
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckout(){
        if(Session::has('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('page.checkout', [
                'product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty
            ]);
        }else{
            return view('page.checkout');
        }
    }
    public function postCheckout(Request $request){
        $cart = Session::get('cart');

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone_number = $request->phone_number;
        $customer->note = $request->note;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $billDetail = new BillDetail();
            $billDetail->id_bill = $bill->id;
            $billDetail->id_product = $key;
            $billDetail->quantity = $value['qty'];
            if($value['promotion_price'] == 0){
                $billDetail->unit_price = $value['unit_price']/$value['qty'];
            }else{
                $billDetail->unit_price = $value['promotion_price']/$value['qty'];
            }
            $billDetail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thanhcong', 'Bạn đã đặt hàng thành công');
    }

    public function getLogin(){
        return view('page.login');
    }
    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Password không được để trống'
        ]);
        //$credentials = $request->only('email', 'password');
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password], ['remember_token'])){
            return redirect('index');
        }else{
            return redirect()->back()->with('danger', 'Đăng nhập không hợp lệ');
        }
    }

    public function getSingup(){
        return view('page.singup');
    }
    public function postSingup(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:20',
            'full_name' => 'required',
            're_password' => 'required|same:password'
        ], [
            'email.required' => 'Bạn phải nhâp email',
            'email.email' => 'Bạn phải nhập đúng định dạng email ',
            'email.unique' => 'Email này đã có người sử dụng',
            'password.required' => 'Password không được để trống',
            'full_name.required' => 'Tên người dùng không được để trống',
            're_password.required' => 'Re Password không được để trống',
            're_password.same' => 'Mật khẩu không giống nhau'
        ]);

        $singup = new User();
        $singup->full_name = $request->full_name;
        $singup->email = $request->email;
        $singup->password = Hash::make($request->password);
        $singup->phone = $request->phone;
        $singup->address = $request->address;
        $singup->save();

        return redirect()->back()->with('success', 'Bạn đã đăng kí thành công');
    }

    public function logout(){
        Auth::logout();
        return redirect('index');
    }

    public function search(Request $request){
        $slide = DB::table('slide')->get();
        $product = DB::table('products')
        ->where('name', 'like', '%'.$request->key.'%')
        ->orwhere('unit_price', $request->key)
        ->get();
        $product_s = DB::table('products')
        ->where([
            ['name', 'like', '%'.$request->key.'%'],
            ['promotion_price', '<>', 0]
        ])
        ->orwhere([
            ['unit_price', $request->key],
            ['promotion_price', '<>', 0]
        ])
        ->get();
        return view('page.search', compact('product', 'slide', 'product_s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
