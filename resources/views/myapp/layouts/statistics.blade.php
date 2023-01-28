<div class="row text-center">
  <a href="{{ route('profile', $user->username) }}" class="col-4 text-decoration-none text-dark">
    <span class="d-block">{{ $user->statuses()->count() }}</span>
    <span class="d-block fw-bold h6">Status</span>
  </a>
  <a href="{{ route('following.index', [$user->username, 'following']) }}" class="col-4 text-decoration-none text-dark">
    <span class="d-block">{{ $user->follows()->count() }}</span>
    <span class="d-block fw-bold h6">Following</span>
  </a>
  <a href="{{ route('following.index', [$user->username, 'follower']) }}" class="col-4 text-decoration-none text-dark">
    <span class="d-block">{{ $user->followers()->count() }}</span>
    <span class="d-block fw-bold h6">Follower</span>
  </a>
</div>