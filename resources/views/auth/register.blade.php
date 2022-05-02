<x-main>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-md-4 col-md-4 card p-4">
                <h4>Register</h4>

                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name"
                               placeholder="Someone" name="name" value="{{old('name')}}">
                        @error('name')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

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

                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password"
                               name="password_confirmation">
                        @error('password_confirmation')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <small>Already have an account? <a href="{{route('login')}}">login</a> here</small>
                </form>
            </div>
        </div>
    </div>
    </body>


</x-main>
