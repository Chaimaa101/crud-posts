<x-layout>

        <h1 class="title">Latest Posts</h1>
        
        <img src="{{ asset('storage.posts_images') }}" alt="">
        <div class="grid grid-cols-2 grap-6 ">
        @foreach($posts as $post)
    <x-card :post="$post" />
@endforeach
        </div>

        <div>
                {{ $posts->links();  }}
        </div>
</x-layout>
