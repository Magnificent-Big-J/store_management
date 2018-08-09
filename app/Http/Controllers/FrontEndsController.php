<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidFormRequest;
use Illuminate\Http\Request;
use App\Products;
use App\CustomerBids;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductsResource;

class FrontEndsController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('id','desc')->paginate(9);

        return view('index',compact('products'));
    }
    public function loginUser()
    {
        return view('auth.login');
    }
    public function bid(BidFormRequest $request)
    {
        $bids = new CustomerBids();
        $bids->email = $request->email;
        $bids->amount = $request->amount;
        $bids->product_id = $request->product_id;
        $bids->save();

        return ['custBid'=>$bids->amount];
    }
    public function bids($id)
    {
        $product = Products::find($id);
        $product_name = $product->name;
        $highBid = DB::table('customers_bid')->where('product_id',$id)->max('amount');
        $avgBid = DB::table('customers_bid')->where('product_id',$id)->avg('amount');

        $highBid = number_format($highBid,2,",",".");
        $avgBid = number_format($avgBid,2,",",".");


        return ['high'=>$highBid,'avg'=>$avgBid,'product_name'=>$product_name];
    }
    public function custsBids()
    {
        $products = Products::orderBy('id','desc')->paginate(9);

        return ProductsResource::collection($products);
    }
}
