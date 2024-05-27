<div class="row">
    <div class="col-lg-4 order-2 col-10 col-md-8">
        <form action="{{ route('signIn.store') }}" method="post" class="my-2 form-dark mx-4 rounded " style="color:bisque">

            <span style="color:rgb(224, 123, 0)">*Please fill in the following fields to sign in to your
                account</span><br><br>
            @csrf
            <label for="emailSign" style="color:bisque">Email address</label>
            <input type="email" name="email" class="form-control bg-dark my-1 border-0" style="color:bisque;">

            <label for="passwordSign" style="color:bisque">Password</label>
            <input type="password" name="password" class="form-control bg-dark my-1 border-0" style="color:bisque">
            <div class="text-center border-top mt-2"><button type="submit"
                    class="btn bg-transparent btn-outline-secondary my-2 bg-dark  text-center  ">Sign in</button>
            </div>

        </form>
    </div>
    <div class="col-lg-4 order-1 col-1 col-md-2"></div>
    <div class="col-lg-4 order-3 col-1 col-md-2"></div>
</div>
