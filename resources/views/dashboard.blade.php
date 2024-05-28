@extends('Shared.layout')
@include('newNav')
@section('content')
    <div class="row container-fluid justify-content-center ">
        @for ($i = 0; $i < 10; $i++)
            <div class="col-10 col-md-6 col-lg-4 p-0  card text-center m-1">
                <img class="img-fluid card-img-top w-100"
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuA7safnMxSkszvObGxvPrtB-6nxXbcgOkVg&usqp=CAU"
                    alt="image">
                <div class="card-body">
                    <h4 class="card-title h4">
                        Uzuri Grounds
                    </h4>
                    <p class="card-text">Location <br>
                        Capaity <br>
                        Charges <br>
                        Contact info <br>
                        Policy <br>
                    </p>
                    <div class="card-footer"><a class="btn btn-dark mt-1 rounded">Make booking</a>
                    </div>

                </div>
            </div>
        @endfor
    </div>
@endsection
