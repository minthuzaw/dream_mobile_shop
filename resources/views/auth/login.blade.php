<x-main>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-md-4 col-md-4 card p-4">
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

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    </body>
</x-main>
