<x-layout>
<h1 class="title">{{ Str::ucfirst($user->username) }}'s Posts &#9830; {{ $posts->total() }}</h1>
 
    <div class="grid grid-cols-2 grap-6 ">
        @foreach ($posts as $post)
            <x-card :post="$post" />
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div> 
</x-layout>