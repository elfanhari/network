<x-app-layout>
    <x-container>

      <div class="grid grid-cols-12 gap-6">
        <div class="col-span-7">
          <div class="space-y-6">
            @foreach ($statuses as $status)
                <div class="flex">
                  <div class="flex-shrink-0 mr-3">
                    <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150" alt="">
                  </div>
                  <div>
                    <div class="font-semibold">
                      {{ $status->user->name }}
                    </div>
                    <div class="reading-relax">
                      {{ $status->body }}
                    </div>
                    <div class="text-sm tet">
                      {{ $status->created_at->diffForHumans() }}
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
        <div class="col-span-5">
          Friend
        </div>
      </div>

    </x-container>
</x-app-layout>