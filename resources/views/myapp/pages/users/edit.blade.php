@extends('myapp.layouts.main')
  @section('content')
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Update profile</div>
          <div class="card-body">

            <form action="{{ route('profile.update') }}" method="post">
              @csrf
              @method('PUT')
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">name</span>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name ) }}" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              @error('name')
                <div id="validationServer03Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">username</span>
                <input type="text" name="username" value="{{ old('username', Auth::user()->username ) }}" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              @error('username')
                <div id="validationServer03Feedback" class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror

              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">email</span>
                <input type="text" name="email" value="{{ old('email', Auth::user()->email ) }}" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              @error('email')
                <div id="validationServer03Feedback" class="invalid-feedback">
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