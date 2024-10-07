@props(['post', 'full' => false])

<div class="card">
    <h2 class="font-bold text-xl">{{ $post->title }}</h2>
    <div>
        @if ($post->image)
        <img src="{{asset('storage/'. $post->image ) }}" alt="">
        
        @else
        <img src="{{asset('storage/posts_images/default.jpg' ) }}" alt="">
        
        @endif
    </div>

    <div class="text-xs font-light mb-4">
        <span>Posted {{ $post->created_at->diffForHumans() }} by</span>
        <a href="{{ route('posts.user', $post->user) }}" class="text-purple-500 font-medium">{{ $post->user->username }}</a>
    </div>

    @if ($full)
        <div class="text-sm">
            <span>{{ $post->body }}</span>
        </div>
    @else
        <div class="text-sm">
            <span>{{ Str::words($post->body, 20) }}</span>
            <a href="{{ route('posts.show', $post) }}" class="text-blue-500 ml-2">Read more &rarr;</a>
        </div>
    @endif

        <div class="flex items-center justify-end grap-6 mt-6">
            {{ $slot }}
        </div>
</div>
