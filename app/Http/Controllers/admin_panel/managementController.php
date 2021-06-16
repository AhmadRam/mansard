<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\sale;
use App\User;
use Illuminate\Support\Arr;

class managementController extends Controller
{
    public function manage()
    {

        $res1 = sale::all();
        if (!$res1) {
            return view('admin_panel.dashboard.orderManagement')->with('all', [])
                ->with('products', [])
                ->with('sale', []);
        }

        $cart = [];
        $product = [];
        $users = [];
        foreach ($res1 as $r) {
            $users = User::all();
            $totalCart = explode(',', $r->product_id);
            foreach ($totalCart as $c) {
                $cart[] = Arr::prepend(explode(':', $c), $r->id);
                $a = explode(':', $c);
                $res = Product::find($r->product_id);
                $product[] = $res;
            }
        }
        return view('admin_panel.orders.index')->with('all', $cart)
            ->with('products', $product)
            ->with('sale', $res1)
            ->with('users', $users)
            ->with('status', ['Placed', 'On Process', 'Delivered', 'Cancel']);
    }
    public function update(Request $r)
    {
        $n = sale::find($r->orderId);

        if ($n) {
            $n->order_status = $r->stat;
            $n->save();
        }

        $res1 = sale::all();
        if (!$res1) {
            return view('admin_panel.dashboard.orderManagement')->with('all', [])
                ->with('products', [])
                ->with('sale', []);
        }

        $cart = [];
        $product = [];
        foreach ($res1 as $r) {
            $totalCart = explode(',', $r->product_id);
            foreach ($totalCart as $c) {
                $cart[] = Arr::prepend(explode(':', $c), $r->id);
                $a = explode(':', $c);
                $res = Product::find($a[0]);
                $product[] = $res;
            }
        }
        return redirect()->route('admin.orderManagement');
    }
}
