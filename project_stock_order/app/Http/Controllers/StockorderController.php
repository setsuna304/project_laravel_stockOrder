<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // manager order control
    public function index()
    {
        $userid = Auth::user()->id;
        $list_item = DB::table('product_order')
            ->where('product_user_id', $userid)
            ->orderBy('id', 'asc')
            ->get();
        return view('storehouse', compact('list_item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_vet = ['ราก', 'ลำต้น', 'ใบ', 'ดอก', 'ผล'];
        return view('product-create', compact('type_vet'));
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
        $name = $request->product_name;
        $weight = $request->product_weight;
        $price = $request->product_price;
        $type = $request->select;
        $userid = $request->userid;

        $filenamewithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extenstion = $request->file('photo')->getClientOriginalExtension();
        // create new file name
        $filenametoStore = $filename . '_' . time() . '.' . $extenstion;

        //uploadtostore
        $request->file('photo')->storeAs('public/photo_vet/', $filenametoStore);
        DB::table('product_order')->insert([
            'product_name' => $name,
            'product_type' => $type,
            'product_total' => $weight,
            'product_price' => $price,
            'product_user_id' => $userid,
            'product_img' => $filenametoStore
        ]);

//
//        return response([
//            'type'=>'redirect',
//            'url'=>'/home',
//            'message'=>'เรียบร้อยแล้ว'
//        ],200);

        return redirect('/backoffice')->with('success');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $content = DB::table('product_order')
            ->where('id', $id)
            ->first();
        $type_vet = ['ราก', 'ลำต้น', 'ใบ', 'ดอก', 'ผล'];

        return view('product-edit', compact('content', 'id', 'type_vet'));

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

        $name = $request->product_name;
        $weight = $request->product_weight;
        $price = $request->product_price;
        $type = $request->select;
        $userid = $request->userid;

        $filenamewithExt = $request->file('photo')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extenstion = $request->file('photo')->getClientOriginalExtension();
        // create new file name
        $filenametoStore = $filename . '_' . time() . '.' . $extenstion;

        //uploadtostore
        $request->file('photo')->storeAs('public/photo_vet/', $filenametoStore);
        DB::table('product_order')
            ->where('id', $id)
            ->update([
                'product_name' => $name,
                'product_type' => $type,
                'product_total' => $weight,
                'product_price' => $price,
                'product_user_id' => $userid,
                'product_img' => $filenametoStore
            ]);

//
//        return response([
//            'type'=>'redirect',
//            'url'=>'/home',
//            'message'=>'เรียบร้อยแล้ว'
//        ],200);

        return redirect('/backoffice')->with('success');


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
        DB::table('product_order')
            ->where('id', $id)
            ->delete();
        return redirect('/backoffice')->with('success');
//        dd("dasdad" . $id);

    }
}
