<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasketCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $userid = $request->userid;
        $select_product = $request->select_product;
        $basket_key = $request->token_basket;


        DB::table('basket')->insert([
            'b_user_id' => $userid,
            'product_id' => $select_product,
            'basket_id' => $basket_key
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $goods_list = DB::table('product_order')
            ->join('basket', 'product_order.product_user_id', '=', 'basket.product_id')
            ->select('*')
            ->where('product_user_id', $id)->get();


        $total_price = DB::table('product_order')
            ->join('basket', 'product_order.product_user_id', '=', 'basket.product_id')
            ->select('*')
            ->where('product_user_id', $id)
            ->sum('product_price');

//        dd($total_price);
        return view('basket', compact('goods_list', 'total_price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('basket')
            ->where('product_id', $id)
            ->delete();
        return redirect('/basket');

    }


}
