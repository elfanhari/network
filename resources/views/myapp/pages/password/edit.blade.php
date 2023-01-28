@extends('myapp.layouts.main')
  @section('content')
    <div class="row">
      <div class="col-md-6">
        @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('info') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card">
          <div class="card-header">Change the password</div>
          <div class="card-body">

            <form action="{{ route('password.edit') }}" method="post">
              @csrf
              @method('PUT')

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Current Passsword</span>
                <input type="password" name="current_password" class="form-control" placeholder="current_password" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              @error('current_password')
                <div id="validationServer03Feedback">
                  {{ $message }}
                </div>
              @enderror

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">New Password</span>
                <input type="password" name="password" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              @error('password')
                <div id="validationServer03Feedback">
                  {{ $message }}
                </div>
              @enderror

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Password Confirm</span>
                <input type="password" name="password_confirmation" class="form-control" placeholder="password_confirmation" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              @error('password_confirmation')
                <div id="validationServer03Feedback">
                  {{ $message }}
                </div>
              @enderror

              <div class="text-end">
                <button type="submit" class="btn btn-primary">
                  Update
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  @endsection