@extends('myapp.layouts.main')
  @section('content')
    <div class="border" style="border-radius: 15px">
      <div class="m-3">        
        <div class="row">
            @foreach ($users as $user)
            <div class="col-md-4">
              <div class="row mb-3">
                <div class="col-1 pe-3">
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
                        <div class="mt-1">
                          <form action="{{ route('following.store', $user) }}" method="post">
                            @csrf
                              @if (Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                <button class="btn btn-outline-primary btn-sm">Unfollow</button>
                              @else
                                <button class="btn btn-primary btn-sm">Follow</button>
                              @endif
                          </form>
                        </div>
                      </small>
                    </em>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      {{-- {{ $users->links() }}  | PAGINATION--}}
  @endsection