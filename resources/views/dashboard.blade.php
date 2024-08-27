<?php use App\Http\Controllers\ReservationController; ?>
@extends('Shared.layout')
@include('newNav')
@section('content')
    @if (session()->has('success'))
        <div class="border-0 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @auth

        @if ($result != 0)
            <nav class="mb-3 bg-black navbar navbar-expand sticky-top navbar-dark" id="navbar" style="z-index:1;">
                <div class="container-fluid">


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-1 navbar-nav me-auto mb-lg-0">


                            <li class="nav-link">
                                <a href="{{ route('showUnrespondedReservations') }}" class="btn btn-sm btn-dark" type="button">

                                    Unhandled booking requests <span class="badge"
                                        style="color: red; border:solid 0.5px ;">{{ ReservationController::showUnrespondedReservations() }}</span>


                                </a>

                            </li>
                            <li class="nav-link">
                                <a href="{{ route('showRespondedReservations') }}" class="btn btn-sm btn-dark" type="button">

                                    Handled booking requests

                                </a>

                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        </nav>
        <div class="row container-fluid justify-content-center ">



            @if (!count($arenas) > 0)
                <span class="m-5 link-danger">No results found</span>
            @endif


            @foreach ($arenas as $arena)
                <div class="p-0 m-1 text-center text-white col-10 col-md-6 col-lg-4 card"
                    style="background-color: rgb(5, 5, 5)">
                    <img class="img-fluid card-img-top w-100"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuA7safnMxSkszvObGxvPrtB-6nxXbcgOkVg&usqp=CAU"
                        alt="image">
                    <div class="card-body">
                        <h4 class="card-title h4" style="color: rgb(255, 145, 0)">
                            {{ $arena->name }}
                        </h4>
                        <p class="card-text">Location: {{ $arena->location }} <br>
                            Capacity: {{ $arena->capacity }}<br>
                            Charges per hour: Kshs. {{ $arena->charges }}<br>
                            Email: {{ $arena->email }}<br>
                            Phone: {{ $arena->phone }}<br>
                        </p>
                        <div class="card-footer">

                            <form action="{{ route('goToBook', $arena->id) }}" method="POST">
                                @csrf
                                <button class="mt-1 rounded btn btn-outline-dark" style="color: rgb(255, 145, 0)"
                                    type="submit">Make
                                    booking</button>
                            </form>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @endauth
@endsection
