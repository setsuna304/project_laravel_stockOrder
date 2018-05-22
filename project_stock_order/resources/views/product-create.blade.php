@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <form class="needs-validation" novalidate>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">ชื่อสินค้า</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="First name"
                                       required>
                                <div class="invalid-feedback">
                                    กรุณาใส่ชื่อผัก
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">นํ้าหนัก(กิโลกรัม)</label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name"
                                       required>
                                <div class="invalid-feedback">
                                    กรุณาใส่จำนวนกิโลกริม
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">ราคา(ต่อกิโลกรัม)</label>
                                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name"
                                       required>
                                <div class="invalid-feedback">
                                    กรุณาใส่จำนวนกิโลกริม
                                </div>


                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="validationCustom02">ประเภทผักที่ใช้บริโภค</label>
                                <select class="custom-select" >
                                    @foreach($type_vet as $iteM_vet)
                                        <option value={{$iteM_vet}}>{{$iteM_vet}}</option>
                                        @endforeach
                                    </select>
                            </div>


                        </div>

                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                    <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function () {
                            'use strict';
                            window.addEventListener('load', function () {
                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                var forms = document.getElementsByClassName('needs-validation');
                                // Loop over them and prevent submission
                                var validation = Array.prototype.filter.call(forms, function (form) {
                                    form.addEventListener('submit', function (event) {
                                        if (form.checkValidity() === false) {
                                            event.preventDefault();
                                            event.stopPropagation();
                                        }
                                        form.classList.add('was-validated');
                                    }, false);
                                });
                            }, false);
                        })();
                    </script>


                </div>

            </div>
        </div>
@endsection
