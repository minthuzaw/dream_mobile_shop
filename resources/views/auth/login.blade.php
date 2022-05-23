<x-main>
    <body class="bg-gradient-primary">
        <div class="container-fluid d-flex justify-content-center">
            <div class="row w-100 h-100">
                <div class="col-xl-12 col-lg-12">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <h4>Login</h4>
                                        @if (session('message'))
                                            <div class="alert alert-danger">{{ session('message') }}</div>
                                        @endif
                                        <form action="{{route('login')}}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email"
                                                       placeholder="someone@somewhere.com" name="email" value="{{old('email')}}">
                                                @error('email')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                                @error('password')
                                                <small class="text-danger">{{$message}}</small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-main>


