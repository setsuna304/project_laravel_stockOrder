@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-right " style="margin-bottom: 10px">
                    <a href="/backoffice/create">
                        <button type="submit" class="btn btn-outline-primary">+ Add order</button>

                    </a>
                    {{--</div>--}}
                    <div class="card">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col"></th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">จำนวนกิโลกรัม</th>
                                <th scope="col">ราคา</th>
                                <th scope="col-2"></th>
                            </tr>
                            </thead>
                            @if(!empty($list_item))
                                <tbody>
                                @foreach($list_item as $items)
                                    <tr>
                                        <th scope="row">{{$items->id}}</th>
                                        <td class="img-thumbnail" style="width: 200px ; height: 200px">
                                            <img src="/storage/photo_vet/{{$items->product_img}}"
                                                 class="img-thumbnail rounded">
                                        </td>
                                        <td>{{$items->product_name}}</td>
                                        <td>{{$items->product_total}}</td>
                                        <td>{{$items->product_price}}</td>
                                        <td>
                                            <div class="text-center">
                                                <form action="/backoffice/{{$items->id}}/edit" class="col-auto"
                                                >
                                                    <button type="submit" class="btn btn-outline-info float-left">Edit
                                                    </button>
                                                </form>

                                                <form action="/backoffice/{{$items->id}}" method="post"
                                                      class="col-auto ">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                            class="btn btn-outline-danger delete float-left ">Delete
                                                    </button>
                                                </form>

                                            </div>

                                            {{--//delete--}}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            @else
                                <div class="text-center">
                                    <p>ไม่มีรายการ</p>
                                </div>
                            @endif

                        </table>
                    </div>

                </div>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-warning alert-dismissible fade show">
                <strong>Success</strong>{{'success'}}
                <button type="button" class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
            </div>
        @endif
        @endsection
        @push('scripts')
            <script>
                @if(count($errors)>0)
                $('.alert').alert();
                @endif
                $('.delete').click(function () {
                    var id = $(this).attr('data-id');
                    $('#' + id).submit();
                });
            </script>
    @endpush