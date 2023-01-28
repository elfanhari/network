@extends('myapp.layouts.main')
  @section('content')
    <div class="row">
      <div class="col-7">
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
              </div>
              <div class="col-7">
                <div class="justify-content-between">
                  @include('myapp.layouts.statistics')
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="border" style="border-radius: 15px">
          <div class="m-3">

            <p >Recently</p>
              @foreach ($follows as $user)
                <div class="row mb-3">
                  <div class="col-1">
                    <div class="mb-1">
                      <img class="h-10 mt-1 w-10 rounded-circle" style="width: 40px" src="/../profil.png" alt="">
                    </div>
                  </div>
                  <div class="col-11 ps-4">
                    <div class="fw-bold">
                      {{ $user->name }}
                    </div>
                    <div class="text-sm tet">
                      <em>
                        <small>
                          @if ($user->pivot)
                            {{ $user->pivot->created_at->diffForHumans() }}
                          @endif
                        </small>
                      </em>
                    </div>
                  </div>
                </div>
              @endforeach
          </div>
        </div>
      </div>
    
    </div>
  @endsection