<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale;
use App\User;
use App\Address;
use App\propertie;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Arr;

class userController extends Controller
{

    public function index($lang, $id)
    {
        $res = Product::where('category_id', $id)->get();
        $cat = Category::find($id);
        return view('categories')
            ->with('products', $res)
            ->with('cat', $cat)
            ->with('index', 1);
    }
    public function view($lang, $id)
    {
        $prop = propertie::all();
        $prod = Product::find($id);
        $cat = Category::find($prod->category_id);
        return view('product')
            ->with('product', $prod)
            ->with('prop', $prop)
            ->with('cat', $cat);
    }


    public function search($lang, Request $r)
    {
        if ($r->query("n")) {
            $name = $r->query("n");
        }
        if (isset($name)) {
            $name = strtolower($name);
            $sRes = DB::select(DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%'"));
        } else {
            $sRes = DB::table('products')
                ->get();
        }
        return view('search')
            ->with('products', $sRes);
    }
    public function showaddress($lang, $id)
    {
        $r = Address::find($id);
        return view('profile.address')->with('ad', $r);
    }
    public function addaddress()
    {
        return view('profile.add_address');
    }
    public function storaddress($lang, Request $r, $id)
    {


        $validatedData = $r->validate([
            'title' => 'required',
            'lineOne' => 'required',
            'lineTwo' => 'required',
            'city' => 'required',
            'township' => 'required',
            'postalcode' => 'required|numeric',

        ]);

        $add = new Address();
        $add->title = $r->title;
        $add->lineOne = $r->lineOne;
        $add->lineTwo = $r->lineTwo;
        $add->city = $r->city;
        $add->township = $r->township;
        $add->postalcode = $r->postalcode;
        $add->save();

        $add_id = $add->id;
        $user = User::find($id);
        $user->address_id = $add_id;
        $user->save();

        return view('profile.address')->with('ad', $add)->with('success', __('Address Added successfully!'));
    }
    public function editaddress($lang, $id)
    {
        $res = Address::find($id);
        return view('profile.edit_address')->with('address', $res);
    }

    public function destroyaddress($lang, Request $request)
    {

        $addtodelete = Address::find($request->id);
        $addtodelete->delete();

        return redirect()->back()->with('success', __('Address Deleted successfully!'));
    }

    public function updateaddress($lang, Request $r, $id)
    {
        $validatedData = $r->validate([
            'title' => 'required',
            'lineOne' => 'required',
            'lineTwo' => 'required',
            'city' => 'required',
            'township' => 'required',
            'postalcode' => 'required|numeric',

        ]);
        $res = Address::find($id);
        $res->title = $r->title;
        $res->lineOne = $r->lineOne;
        $res->lineTwo = $r->lineTwo;
        $res->city = $r->city;
        $res->township = $r->township;
        $res->postalcode = $r->postalcode;
        $res->save();
        return redirect()->back()->with('success', __('Address Updated successfully!'));
    }

    public function showprofile($lang, $id)
    {
        $r = Address::find($id);
        return view('profile.profile')->with('ad', $r);
    }

    public function editprofile($lang, $id)
    {
        $res = User::find($id);
        return view('profile.edit_profile')->with('user', $res);
    }
    public function storprofile($lang, Request $r, $id)
    {
        $validatedData = $r->validate([
            'identityNumber' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'birthday' => 'required',
            'gender' => 'required',

        ]);
        $res = User::find($id);
        $res->identityNumber = $r->identityNumber;
        $res->name = $r->name;
        $res->surname = $r->surname;
        $res->email = $r->email;
        $res->phone = $r->phone;
        $res->birthday = $r->birthday;
        $res->gender = $r->gender;
        $res->save();
        return redirect()->back()->with('success', __('Profile updated successfully!'));
    }


    public function confirm($lang, Request $r)
    {
        $sales = new sale();
        $sales->user_id = Auth::user()->id;
        $sales->product_id = session('cart');
        $sales->order_status = 'Placed';
        $sales->price = session('price');
        $sales->save();
        $res = Address::find(Auth::user()->address_id);
        $res->title = $r->title;
        $res->lineOne = $r->lineOne;
        $res->lineTwo = $r->lineTwo;
        $res->city = $r->city;
        $res->township = $r->township;
        $res->postalcode = $r->postalcode;
        $res->save();
        Session::forget('cart');
        Session::forget('price');
        Session::forget('orderCounter');
        return redirect()->back()->with('success', __('order successfully!'));
    }

    public function history($lang, Request $r)
    {
        $res1 = sale::where('user_id', Auth::user()->id)->get();

        $cart = [];
        $product = [];
        $id = [];
        foreach ($res1 as $r) {
            $totalCart = explode(',', $r->product_id);
            foreach ($totalCart as $c) {
                $cart[] = Arr::prepend(explode(':', $c), $r->id);
                $a = explode(':', $c);
                $res = Product::find($a[0]);
                $product[] = $res;
            }
        }
        $res = Product::all();
        $cat = Category::all();
        //dd($cart); 
        return view('profile.myorders')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('all', $cart)
            ->with('prods', $product)
            ->with('sale', $res1);
    }

    public function post($lang, $id, Request $r)
    {
        if (!(Session::has('cart'))) {
            Session::put('orderCounter', 1);
            $c = $id . ":" . $r->quantity  . ":" . $r->price . ":" . Session::get('orderCounter');   //the order counter is added after color so that order serial can be obtained
            Session::put('cart', $c);
        } else {
            Session::put('orderCounter', Session::get('orderCounter') + 1);
            $cd = $id . ":" . $r->quantity . ":" . $r->price . ":" .  Session::get('orderCounter');
            $total = Session::get('cart') . "," . $cd;
            Session::put('cart', $total);
        }
        return redirect()->back()->with('success', __('Product added to cart successfully!'));
    }

    public function cart($lang, Request $r)
    {
        $res = Product::all();
        $cat = Category::all();
        if (!Session::has('cart')) {
            return view('profile.mycart')->with('all', null)
                ->with('products', [])
                ->with('products', $res)
                ->with("cat", $cat);
        }
        $cart = [];
        $product = [];
        $cost = 0;
        $cost_after_quantity = 0;
        $totalCart = explode(',', Session::get('cart'));
        foreach ($totalCart as $c) {
            $cart[] = explode(':', $c);
            $a = explode(':', $c);
            $res = Product::find($a[0]);
            $product[] = $res;
                $cost_after_quantity = $a[1] * $a[2];
            $cost += $cost_after_quantity;
            Session::put('price', $cost);
        }
        return view('profile.mycart')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('all', $cart)
            ->with('prod', $product)
            ->with('total', Session::get('price'));
    }
    public function confirmcart($lang, Request $r)
    {
        $res = Product::all();
        $cat = Category::all();
        if (!Session::has('cart')) {
            return view('profile.mycart')->with('all', null)
                ->with('products', [])
                ->with('products', $res)
                ->with("cat", $cat);
        }
        $cart = [];
        $product = [];
        $cost = 0;
        $cost_after_quantity = 0;
        $totalCart = explode(',', Session::get('cart'));
        foreach ($totalCart as $c) {
            $cart[] = explode(':', $c);
            $a = explode(':', $c);
            $res = Product::find($a[0]);
            $product[] = $res;
            $cost_after_quantity = $a[1] * $a[2];
            $cost += $cost_after_quantity;
            Session::put('price', $cost);
        }
        $add = Address::find(Auth::user()->address_id);
        return view('profile.checkout')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('all', $cart)
            ->with('address', $add)
            ->with('prod', $product)
            ->with('total', Session::get('price'));
    }

    public function editCart($lang, Request $r)
    {
        $newres = Product::all();
        $newcat = Category::all();
        $newcart = [];
        $newproduct = [];
        $newcost = 0;
        $newtotalCart = explode(',', Session::get('cart'));
        foreach ($newtotalCart as $c) {
            $newcart[] = explode(':', $c);
        }
        foreach ($newcart as $t) {
            if ($t[0] == $r->pid && $t[3] == $r->oSerial) {

                $t[1] = $r->newQ;
            }
            if (!(Session::has('tempCart'))) {

                $str = $t[0] . ":" . $t[1] . ":" . $t[2]. ":" . $t[3];
                Session::put('tempCart', $str);
            } else {
                $str2 = $t[0] . ":" . $t[1] . ":" . $t[2]. ":" . $t[3];
                $mytotal = Session::get('tempCart') . "," . $str2;
                Session::put('tempCart', $mytotal);
            }
        }
        Session::forget('cart');
        Session::put('cart', Session::get('tempCart'));
        Session::forget('tempCart');

        //for price update
        $res = Product::all();
        $cat = Category::all();
        $cart = [];
        $product = [];
        $cost = 0;
        $cost_after_quantity = 0;
        Session::forget('price');
        $totalCart = explode(',', Session::get('cart'));
        foreach ($totalCart as $c) {
            $cart[] = explode(':', $c);
            $a = explode(':', $c);
            $res = Product::find($a[0]);
            $product[] = $res;
            $cost_after_quantity = $a[1] * $a[2];
            $cost += $cost_after_quantity;
            Session::put('price', $cost);
        }

        $szn[0] = Session::get('cart');
        $szn[1] = Session::get('price');
        $szn[2] = $cost;


        return json_encode($szn);
        exit;
    }


    public function deleteCartItem($lang, Request $r)
    {
        session()->flash('success', __('Product removed successfully!'));

        $counter = 0;
        $newtotalCart = explode(',', Session::get('cart'));
        foreach ($newtotalCart as $c) {
            $newcart[] = explode(':', $c);
        }
        foreach ($newcart as $t) {
            if ($t[3] == $r->serial) {
                $another_counter = $counter;
            }
            $counter++;
        }
        array_splice($newtotalCart, $another_counter, 1);

        foreach ($newtotalCart as $c2) {

            $newcart2[] = explode(':', $c2);
        }

        if ($newtotalCart == null) {
            Session::forget('cart');
            Session::forget('price');
            Session::forget('orderCounter');
            return json_encode("Empty");
            exit;
        } else {
            foreach ($newcart2 as $t2) {

                if (!(Session::has('tempCart'))) {

                    $str2 = $t2[0] . ":" . $t2[1] . ":" . $t2[2]. ":" . $t2[3];
                    Session::put('tempCart', $str2);
                } else {
                    $str2 = $t2[0] . ":" . $t2[1] . ":" . $t2[2]. ":" . $t2[3];
                    $mytotal2 = Session::get('tempCart') . "," . $str2;
                    Session::put('tempCart', $mytotal2);
                }
            }

            Session::forget('cart');
            Session::put('cart', Session::get('tempCart'));
            Session::forget('tempCart');

            //for price update
            $res = Product::all();
            $cat = Category::all();
            $cart = [];
            $product = [];
            $cost = 0;
            $cost_after_quantity = 0;
            Session::forget('price');
            $totalCart = explode(',', Session::get('cart'));
            //dd(Session::get('cart'));
            foreach ($totalCart as $c) {
                $cart[] = explode(':', $c);
                $a = explode(':', $c);
                $res = Product::find($a[0]);
                $product[] = $res;
                 $cost_after_quantity = $a[1] * $a[2];                
                $cost += $cost_after_quantity;
                Session::put('price', $cost);
            }
            Session::put('orderCounter', Session::get('orderCounter') - 1);
            $szn[0] = Session::get('cart');
            $szn[1] = Session::get('price');
            $szn[2] = $cost;
            $szn[3] = $r->serial;
            return json_encode($szn);
            exit;
        }
    }
}
