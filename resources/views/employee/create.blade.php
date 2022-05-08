<x-main>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-md-4 col-md-4 card p-4">
                <h4>Register</h4>

                <form action="{{route('users.store')}}" method="POST">
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

                    <div class="form-group">
                        <label for="phone_number">Email</label>
                        <input type="number" class="form-control" id="phone_number"
                               placeholder="09199292939" name="phone_number" value="{{old('phone_number')}}">
                        @error('phone_number')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control form-select" aria-label="Default select example" name="role">
                            <option disabled selected>Select Role</option>
                            <option value="admin">admin</option>
                            <option value="cashier">cashier</option>
                            <option value="stocker">stocker</option>
                        </select>
                        @error('role')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <small>Already have an account? <a href="{{route('login')}}">login</a> here</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>

</x-main>

