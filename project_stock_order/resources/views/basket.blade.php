@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">จำนวนสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>

                        <tbody>
                        @if(empty($goods_list))
                            <h1>ไม่มีรายการข้อมูล</h1>
                        @else
                            @foreach($goods_list as $items)

                                <tr>
                                    <td style="width: 200px;height: 200px">
                                        <img src="/storage/photo_vet/{{$items->product_img}}" class="img-thumbnail">
                                    </td>
                                    <td>{{$items->product_name}}</td>
                                    <td>{{$items->product_total}}</td>
                                    <td>{{$items->product_price}}</td>
                                    <td>

                                        <form action="/basket/{{$items->product_id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger delete ">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
                <div class="border text-center">
                    <p>ราคาทั้งหมด:<strong>{{$total_price}}</strong></p>
                    <form action="/payorder" method="post" class="sumbit-pay">
                        @csrf
                        <button type="button" class="btn btn-outline-success ">ยืนยัน</button>
                    </form>


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

        $('.sumbit-pay').click(function () {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        swal("Complete", "Your pay orders.", "success");
                    } else {
                        swal("Cancelled", "Your don't pay orders.", "error");
                    }
                });
        });



    </script>
@endpush