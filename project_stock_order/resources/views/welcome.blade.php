@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">

                @guest()
                    {{--<div class="emtry"></div>--}}
                @else

                    <div class="text-right">
                        <a href="/basket/{{Auth::user()->id}}">
                            <button type="button" class="btn btn-outline-info"> Total product
                                <h5 id="txt-product"></h5>
                            </button>
                        </a>
                    </div>
                @endguest
            </div>
        </div>
        {{--query box item--}}
        <div class="row">
            @foreach($list_order as $order)
                <div class="col-4">
                    <div class="card-body">

                        <div class="card">
                            <div class="img-thumbnail">
                                <img src="/storage/photo_vet/{{$order->product_img}}"
                                     class="img-thumbnail">
                            </div>

                            <div class="text-center">
                                <h4 class="title"><a href="">{{$order->product_name}}</a></h4>
                                <p class="description">คงเหลือ:{{$order->product_total}}กิโลกรัม</p>
                                <p class="description">ราคา/กิโลกรัม: {{$order->product_price}}</p>
                            </div>

                            <form action="/basket" method="post" class="form-control text-center border-0">
                                @csrf
                                <input type="text" name="token_basket" value="{{$basket_key}}" hidden>


                                @guest()

                                @else()
                                    <input type="text" name="userid" value="{{Auth::user()->id}}" hidden>
                                    <button type="submit" class="btn btn-outline-success btn-submit "
                                            name="select_product"
                                            value="{{$order->id}}">
                                        Select product
                                    </button>
                                @endguest
                            </form>

                        </div>

                    </div>
                </div>
            @endforeach


        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            var x = 0;

            $('.btn-submit').click(function () {
                console.log(x += 1)
                $('#txt-product').text(x)
                $('.btn').addClass('active');
            });


            $('.active').click(function () {
                console.log(x -= 1)
                $('#txt-product').text(x)
                $('.btn').removeClass('active');

            });

            //Todo:: //ปัญหา alert  ที่เกิดทุกครั้ง ที่ refesh page

            // $('.emtry').show(3000,
            //     swal("กรุณา login เข้าสู่ระบบ")
            // );


        })
    </script>
@endpush