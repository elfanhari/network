@extends('myapp.layouts.main')
  @section('content')
    <div class="row">
      <div class="col-md-7">
        <div class="border mb-3" style="border-radius: 15px">
          <div class="m-3">
            <div class="row mb-3">
              <div class="col-1">
                <div class="mb-1">
                  <img class="h-10 mt-1 w-10 rounded-circle" style="width: 40px" src="profil.png" alt="">
                </div>
              </div>
              <div class="col-11">
                <form action="{{ route('status.store') }}" method="POST">
                  @csrf
                  <div class="fw-bold">
                    {{ Auth::user()->name }}
                  </div>
                  <div class="mt-1">
                    <textarea name="body" class="form-control" placeholder="What is on your mind?" id="exampleFormControlTextarea1" rows="3" style="border-radius: 7px;"></textarea>
                  </div>
                  <div class="mt-2 text-end">
                    <button type="submit" class="btn btn-primary">Post</button>
                  </div>
                </form>
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
                    <img class="h-10 mt-1 w-10 rounded-circle" style="width: 40px" src="profil.png" alt="">
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

      <div class="col-md-5">
        <div class="border" style="border-radius: 15px">
          <div class="m-3">

            @if (Auth::user()->follows()->count() < 1)
                You are not yet following people.
            @else
            <p >Recently follow</p>
              @foreach (Auth::user()->follows()->limit(5)->get() as $user)
                <div class="row mb-3">
                  <div class="col-1">
                    <div class="mb-1">
                      <img class="h-10 mt-1 w-10 rounded-circle" style="width: 40px" src="profil.png" alt="">
                    </div>
                  </div>
                  <div class="col-11 ps-4">
                    <div class="fw-bold">
                      {{ $user->name }}
                    </div>
                    <div class="text-sm tet">
                      <em>
                        <small>
                          {{ $user->pivot->created_at->diffForHumans() }}
                        </small>
                      </em>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  @endsection