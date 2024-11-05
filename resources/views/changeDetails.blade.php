@extends('Shared.layout')
@include('newNav')
@section('content')
    @foreach ($arenaDetails as $detail)
        <div class="row">
            <div class="col-lg-4 order-2 col-10 col-md-8">

                <form action="{{ route('changeDetails') }}" method="POST" class="my-2 form-dark mx-4 rounded "
                    style="color:bisque">

                    <span style="color:rgb(224, 123, 0)">Edit <span style="font-size: 120%"><b>{{ $detail->name }}</b>
                        </span>
                        arena</span><br><br>
                    @csrf

                    <label for="email" style="color:bisque">Contact email</label>
                    <input type="email" name="email" class="form-control bg-dark my-1 border-0" style="color:bisque;"
                        value="{{ $detail->email }}">
                    <div class="text-warning">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>

                    <label for="arenaName" style="color:bisque">Arena name</label>
                    <input type="text" name="arenaName" class="form-control bg-dark my-1 border-0" style="color:bisque;"
                        value="{{ $detail->name }}">
                    <div class="text-warning">
                        @error('arenaName')
                            {{ $message }}
                        @enderror
                    </div>

                    <label for="location" style="color:bisque">Arena location</label>
                    <input type="text" name="location" class="form-control bg-dark my-1 border-0" style="color:bisque;"
                        value="{{ $detail->location }}">
                    <div class="text-warning">
                        @error('location')
                            {{ $message }}
                        @enderror
                    </div>


                    <label for="capacity" style="color:bisque">Arena capacity</label>
                    <input type="text" value="{{ $detail->capacity }}" name="capacity"
                        class="form-control bg-dark my-1 border-0" style="color:bisque;" value="{{ $detail->capacity }}">

                    <div class="text-warning">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>

                    <label for="charges" style="color:bisque">Arena charging rates per hour (Kshs)</label>
                    <input type="text" name="charges" class="form-control bg-dark my-1 border-0" style="color:bisque;"
                        value="{{ $detail->charges }}">
                    <div class="text-warning">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>



                    <label for="phone" style="color:bisque">Contact phone number</label>
                    <input type="tel" name="phone" class="form-control border-0 bg-dark my-1" style="color:bisque"
                        value="{{ $detail->phone }}">
                    <div class="text-warning">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </div>



                    <div class="text-center border-top mt-2"><button type="submit"
                            class="btn bg-transparent btn-outline-secondary my-2 bg-dark  text-center  ">Update</button>
                    </div>
                    <div style="visibility: hidden">
                        <label for="arenaId" style="color:bisque">Arena id</label>
                        <input type="text" name="arenaId" class="form-control bg-dark my-1 border-0"
                            style="color:bisque;" value="{{ $detail->id }}">
                        <div class="text-warning">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 order-1 col-1 col-md-2"></div>
            <div class="col-lg-4 order-3 col-1 col-md-2"></div>
        </div>
        <div style="visibility: hidden">
            <label for="arenaId" style="color:bisque">Arena id</label>
            <input type="text" name="arenaId" class="form-control bg-dark my-1 border-0" style="color:bisque;"
                value="{{ $detail->id }}">
            <div class="text-warning">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>
    @endforeach
@endsection
