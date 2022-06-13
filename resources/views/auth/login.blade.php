<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Custom Registration</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-md-offset-4" style="margin-top:20px;">
                <h4>Login</h4>
                <hr>
                @if (Session::has('success'))
                <div class="alert alert-success"> <div> {{ Session::get('success') }}</div></div>
                @endif
                @if (Session::has('fail'))
                <div class="alert alert-danger"> <div> {{ Session::get('fail') }}</div></div>
                @endif
                <br>
                <form action="{{ route('auth.loginUser') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email"  value="{{ old('email') }}">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span><br>

                        </div>
                        <div class="col">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="{{ old('password') }}">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span><br>

                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="signup" id="signup">Login</button>
                      </div>
                      <a href="/registration">New User !! Register Here.</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>