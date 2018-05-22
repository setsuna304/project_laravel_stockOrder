@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @guest()

                @else
                <div hidden>
                    {{ Auth::user()->name }}
                </div>
                    <div class="text-right">
                        <a href="/home">
                            <button type="button" class="btn btn-outline-info"> Total product
                                <h5 id="txt-product"></h5>
                            </button>
                        </a>
                    </div>
                @endguest
            </div>
            {{--query box item--}}
            <div class="col-xl-4">
                <div class="card-body">
                    <div class="card">
                        <div class="img-thumbnail">
                            <img src="https://s3-ap-southeast-1.amazonaws.com/wpimage.shopspotapp.com/wp-content/uploads/2017/08/08120504/20480018_1123379674464780_8404745370706867972_n.jpg"
                                 class="img-thumbnail">
                        </div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                            excepturi sint occaecati cupiditate non provident</p>
                        <button type="button" class="btn btn-outline-success btn-submit">Select product</button>
                    </div>
                </div>
            </div>

        </div>
        {{--query box item--}}

    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            var x = 0;

            $('.btn-submit').click(function () {
                console.log(x += 1)
                $('#txt-product').text(x)
            })
        })
    </script>
@endpush