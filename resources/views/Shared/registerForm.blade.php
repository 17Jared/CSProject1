<div class="row">
    <div class="col-lg-4 order-2 col-10 col-md-8">
        <form action="{{ route('register.store') }}" method="POST" class="my-2 form-dark mx-4 rounded "
            style="color:bisque">

            <span style="color:rgb(224, 123, 0)">*Please fill in the following fields to proceed with
                registration</span><br><br>
            @csrf
            <label for="email" style="color:bisque">Email address</label>
            <input type="email" name="email" class="form-control bg-dark my-1 border-0" style="color:bisque;">
            <div class="text-warning">
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <label for="phone" style="color:bisque">Phone number</label>
            <input type="tel" name="phone" class="form-control border-0 bg-dark my-1" style="color:bisque">
            <div class="text-warning">
                @error('phone')
                    {{ $message }}
                @enderror
            </div>
            <label for="password" style="color:bisque">Password</label>
            <input type="password" name="password" class="form-control bg-dark my-1 border-0" style="color:bisque">
            <div class="text-warning">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <label for="password_confirmation" style="color:bisque">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control bg-dark my-1 border-0"
                style="color:bisque">
            <div class="text-warning">
                @error('password_confirmation')
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
