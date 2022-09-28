<!DOCTYPE html>
<html lang="en">
<head>

    {{-- Metadata --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- CSS --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-4 m-5">
                    @error('errors')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <h1 class="text-center mb-3">Login</h1>
                    <form action="/login" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Phone Number :</label>
                            <input type="text" class="form-control" name="phone_number">
                            @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password :</label>
                            <input type="password" class="form-control" name="password">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
