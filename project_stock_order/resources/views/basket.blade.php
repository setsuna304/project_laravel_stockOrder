@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col"></th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">จำนวนสินค้า</th>
                            <th scope="col">ราคา</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($goods_list as $items)

                            <tr>
                                <th scope="row">{{$items->id}}</th>
                                <td style="width: 200px;height: 200px">
                                    <img src="/storage/photo_vet/{{$items->product_img}}" alt="" class="img-thumbnail">
                                </td>
                                <td>{{$items->product_name}}</td>
                                <td>{{$items->product_total}}</td>
                                <td>{{$items->product_price}}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger">delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="border text-center">
                    <p>ราคาทั้งหมด:<strong>{{$total_price}}</strong></p>
                    <form action="/payorder" method="post">
                        @csrf
                        <button type="button" class="btn btn-outline-success">ยืนยัน</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
