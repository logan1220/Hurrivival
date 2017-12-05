<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderline;
use App\Product;
use Carbon\Carbon;
use \Cart;
use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        return view('cart.index', compact('cart'));
    }

    public function add(Product $product)
    {
        Cart::add($product->product_id, $product->product_name, 1, $product->price);

        return redirect()->back()->with('message', 'Item Added to Cart');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back()->with('message', 'Item Removed from Cart');
    }

    public function edit($rowId)
    {
        $item = Cart::get($rowId);
        $product = DB::table('products')->where('product_name', '=', $item->name)->first();
        return view('cart.edit', compact('item'), compact('product'));
    }

    public function update($rowId, Request $request)
    {
        Cart::update($rowId, $request->quantity);

        $cart = Cart::content();

        return view('cart.index', compact('cart'))->with('message', 'Quantity Updated');
    }

    public function checkout()
    {
        $total = Cart::subtotal();
        $redcross = $total * .15;
        return view('cart.checkout', compact('redcross'));
    }

    public function purchase(Request $request)
    {
        $this->validate($request, [
            'ccn' => 'required',
            'cvv' => 'required',
        ]);

        $order = Order::create([
            'customer_id' => Auth::user()->id,
            'date_ordered' => Carbon::now()->toDateString(),
            'order_total' => Cart::total(),
        ]);

        foreach (Cart::content() as $item) {
            Orderline::create([
                'order_id' => $order->order_id,
                'product_id' => $item->id,
                'product_order_quantity' => $item->qty,
            ]);

            $product = Product::find($item->id);

            $product->update([
                'product_total_quantity' => $product->product_total_quantity - $item->qty,
            ]);
        }

        Cart::destroy();

        return redirect('/home');
    }
}
