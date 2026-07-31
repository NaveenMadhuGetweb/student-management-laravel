@extends('layouts.app')

@section('content')

<a href="{{ route('students.index') }}" class="btn btn-secondary mb-3">Back</a>

<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
         <small id="emailMessage"></small>
    </div>

    <div class="mb-3">
        <label>Department</label>
        {{-- <input type="text" name="department" class="form-control" required> --}}
        <select name="department_id" class="form-control">
            <option value="">Select Department</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}">
                    {{ $department->department_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div> 
    <div class="mb-3">
        <label>Gender</label>
        <select name="gender" class="form-control">
                <option value="">Select Gender</option> 
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Date of Birth</label>
        <input type="date" name="date_of_birth" class="form-control">
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" rows="4" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Student Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>


    <button type="submit"  id="saveBtn" class="btn btn-primary">Save Student</button>
</form>


<script>
    // console.log("helo");
    $(document).ready(function () {

        $('#email').blur(function () {
            // console.log("hii");
            let email = $(this).val();
            if(email == ''){
                $('#emailMessage').html('');
                return;
            }
            $.ajax({
                url: "{{ route('students.checkEmail') }}",
                type: "POST",
                data: {
                    email: email,
                    _token: "{{ csrf_token() }}"
                },
                success:function(response){
                    // console.log(response,"|||" ,  response.exists);
                    if(response.exists){
                        $('#emailMessage').html('<span class="text-danger">Email already exists</span>');
                    }
                    else{
                        $('#emailMessage').html('<span class="text-success">Email available</span>');
                    }
                    // else{
                    //     $('#emailMessage').html('<span class="text-success">Email available</span>');
                    //     $('#saveBtn').prop('disabled', false);
                    // }
                }
            });

        });
    });    
</script>

@endsection
