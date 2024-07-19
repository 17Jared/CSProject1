@extends('Shared.layout')
@include('newNav')
@section('content')
    <div class="row">
        <div class="col-lg-4 order-2 col-10 col-md-8">

            <form action="{{ route('storeArena', auth()->user()->id) }}" method="POST" class="my-2 form-dark mx-4 rounded "
                style="color:bisque">

                <span style="color:rgb(224, 123, 0)">*Please fill in the following fields to proceed with
                    arena registration</span><br><br>
                @csrf
                <label for="email" style="color:bisque">Contact email</label>
                <input type="email" name="email" class="form-control bg-dark my-1 border-0" style="color:bisque;">
                <div class="text-warning">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <label for="arenaName" style="color:bisque">Arena name</label>
                <input type="text" name="arenaName" class="form-control bg-dark my-1 border-0" style="color:bisque;">
                <div class="text-warning">
                    @error('arenaName')
                        {{ $message }}
                    @enderror
                </div>

                <label for="location" style="color:bisque">Arena location</label>
                <input type="text" name="location" class="form-control bg-dark my-1 border-0" style="color:bisque;">
                <div class="text-warning">
                    @error('location')
                        {{ $message }}
                    @enderror
                </div>


                <label for="capacity" style="color:bisque">Arena capacity</label>
                <input type="text" value="eg. 14 people" name="capacity" class="form-control bg-dark my-1 border-0"
                    style="color:bisque;">

                <div class="text-warning">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

                <label for="charges" style="color:bisque">Arena charging rates per hour (Kshs)</label>
                <input type="text" name="charges" class="form-control bg-dark my-1 border-0" style="color:bisque;"
                    value="eg. 2000">
                <div class="text-warning">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>



                <label for="phone" style="color:bisque">Contact phone number</label>
                <input type="tel" name="phone" class="form-control border-0 bg-dark my-1" style="color:bisque">
                <div class="text-warning">
                    @error('phone')
                        {{ $message }}
                    @enderror
                </div>



                <div class="text-center border-top mt-2"><button type="submit"
                        class="btn bg-transparent btn-outline-secondary my-2 bg-dark  text-center  ">Register</button>
                </div>

            </form>
        </div>
        <div class="col-lg-4 order-1 col-1 col-md-2"></div>
        <div class="col-lg-4 order-3 col-1 col-md-2"></div>
    </div>
@endsection
