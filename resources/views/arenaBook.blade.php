@extends('Shared.layout')
@include('newNav')
@section('content')
    <div class="row">

        <div class="order-2 col-lg-4 col-10 col-md-8">
            @if (session()->has('fail'))
                <div class="border-0 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Unsuccessful.</strong> {{ session('fail') }}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @foreach ($arenaRes as $arena)
                <form action="{{ route('makeReservation', $arena->id) }}" method="POST" class="mx-4 my-2 rounded form-dark "
                    style="color:bisque">

                    <span style="color:rgb(224, 123, 0)">*Please fill in the following fields to proceed with your
                        booking of: <br><span style="font-size: 150% ;color: bisque">

                            {{ $arena->name }}

                            arena
                        </span>
                    </span><br><br>
                    @csrf
                    <?php
                    $date = strtotime(date('Y-M-D'));
                    ?>
                    <label for="date" style="color:bisque">Select date to reserve</label>
                    <input type="date" name="date" id="date" class="my-1 border-0 form-control bg-dark"
                        style="color:bisque;" required>
                    <script>
                        var today = new Date().toISOString().split('T')[0];
                        document.getElementById('date').setAttribute('min', today);
                        document.getElementById('date').setAttribute('value', today);
                        document.getElementById('timeOut').setAttribute('min', document.getElementById('timeIn').getAttribute());
                    </script>
                    <div class="text-warning">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </div>

                    <label for="timeIn" style="color:bisque">Select your desired arrival time</label>
                    <input type="time" id="timeIn" required name="timeIn" class="my-1 border-0 form-control bg-dark"
                        style="color:bisque;">
                    <div class="text-warning">
                        @error('timeIn')
                            {{ $message }}
                        @enderror
                    </div>

                    <label for="timeOut" style="color:bisque">Select your desired leaving time</label>
                    <input type="time" required name="timeOut" id="timeOut" class="my-1 border-0 form-control bg-dark"
                        style="color:bisque;">
                    <div class="timeOut">
                        @error('location')
                            {{ $message }}
                        @enderror
                    </div>







                    <div class="mt-2 text-center border-top"><button type="submit"
                            class="my-2 text-center bg-transparent btn btn-outline-secondary bg-dark ">Book</button>
                    </div>

                </form>
        </div>
        <div class="order-1 col-lg-4 col-1 col-md-2"></div>
        <div class="order-3 col-lg-4 col-1 col-md-2"></div>
        @endforeach
    </div>
@endsection
