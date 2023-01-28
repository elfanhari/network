@extends('myapp.layouts.main')
  @section('content')
    <div class="row">
      <div class="col-7">
        @if (session()->has('info'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('info') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="border my-3" style="border-radius: 15px">
          <div class="m-3">
            <div class="row mb-3">
              <div class="col-1">
                <div class="mb-1">
                  <img class="h-10 mt-1 w-10 rounded-circle" style="width: 40px" src="/../profil.png" alt="cek">
                </div>
              </div>
              <div class="col-4">
                <div class="fw-bold">
                  {{ $user->name }}
                </div>
                <div class="text-sm tet">
                  <em><small>Joined at {{ $user->created_at->diffForHumans() }}</small></em>
                </div>
                <div class="my-2">
                  {{-- @if (Auth::id() != $user->id) | CARA 1 --}}
                  @if (Auth::user()->isNot($user))
                    <form action="{{ route('following.store', $user) }}" method="post">
                      @csrf

                        @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                          <button class="btn btn-outline-primary btn-sm">Unfollow</button>
                        @else                            
                          <button class="btn btn-primary btn-sm">Follow</button>
                        @endif
                    </form>
                  @else
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">Edit profile</a>
                  @endif
                </div>
              </div>
              <div class="col-7">
                <div class="justify-content-between">
                  @include('myapp.layouts.statistics')
                </div>
              </div>
            </div>
          </div>
        </div>
        @foreach ($statuses as $status)
        <div class="border my-3" style="border-radius: 15px">
          <div class="m-3">
            <div class="row mb-3">
              <div class="col-1">
                <div class="mb-1">
                  <img class="h-10 mt-1 w-10 rounded-circle" style="width: 40px" src="../profil.png" alt="">
                </div>
              </div>
              <div class="col-11">
                <div class="fw-bold">
                  {{ $status->user->name }}
                </div>
                <div class="reading-relax">
                  {{ $status->body }}
                </div>
                <div class="text-sm tet">
                  <em><small>{{ $status->created_at->diffForHumans() }}</small></em>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
    
    </div>
  @endsection