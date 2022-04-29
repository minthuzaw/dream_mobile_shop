<x-app-layout>
    @section('title')
    <h4>Create Employee</h4>
    @endsection

    <div class="card">
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6 pt-4">
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="employee_id" id="form4Example1" class="form-control" />
                            <label class="form-label" for="form4Example1">Employee ID</label>
                        </div>
        
                        <div class="form-outline mb-4">
                            <input type="text" id="form4Example1" name="name" class="form-control" />
                            <label class="form-label" for="form4Example1">Name</label>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <input type="number" id="form4Example1" name="phone" class="form-control" />
                            <label class="form-label" for="form4Example1">Phone No</label>
                        </div>
                        
                        <div class="form-outline mb-4">
                            <input type="email" id="form4Example2" name="email" class="form-control" />
                            <label class="form-label" for="form4Example2">Email address</label>
                        </div>
        
                        <div class="form-outline mb-4">
                            <input type="text" id="form4Example2" name="nrc_number" class="form-control" />
                            <label class="form-label" for="form4Example2">NRC number</label>
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label" for="form4Example2">Birthday</label>
                            <input type="text" name="birthday" class="form-control birthday" />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label" for="form4Example2">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
        
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form4Example3" name="address" rows="1"></textarea>
                            <label class="form-label" for="form4Example3">Address</label>
                        </div>
        
                        <div class="form-group mb-4">
                            <label class="form-label" for="form4Example2">Department</label>
                            <select name="department" class="form-control">
                                <option value="" selected disabled>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->title}}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="form-group mb-4">
                            <label class="form-label" for="form4Example2">Date of join</label>
                            <input type="text" name="date_of_join" class="form-control date_of_join" />
                        </div>
        
                        <div class="form-group mb-4">
                            <label class="form-label" for="form4Example2">Is Present</label>
                            <select name="gender" class="form-control">
                                <option value="1">YES</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn-theme btn-block mb-4 p-2">Create</button>
              </form>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function(){
                $('.birthday').daterangepicker({
                    "alwaysShowCalendars": true,
                    "singleDatePicker": true,
                    "locale": {
                        "format": "MM/DD/YYYY",
                    },
                    "autoApply": true,
                    "maxDate" : moment(),
                    "showDropdowns": true,
                });

                $('.date_of_join').daterangepicker({
                    "singleDatePicker": true,
                    "locale": {
                        "format": "MM/DD/YYYY",
                    },
                    "autoApply": true,
                    "maxDate" : moment(),
                    "showDropdowns": true,
                });
            })
        </script>
    @endsection

</x-app-layout>