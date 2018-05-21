@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-right">
                    <a href="">+ add</a>
                </div>
                <div class="card">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">จำนวนสินค้า</th>
                            <th scope="col">ประเภทสินค้า</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">จัดการ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-outline-warning">edit</button>
                                    <button type="button" class="btn btn-outline-danger">delete</button>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endsection
        @push('scripts')
            <script>
                $(document).ready(function () {
                    swal("Login success", "welcome to stockorder", "success");
                });

            </script>

    @endpush