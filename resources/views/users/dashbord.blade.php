<x-layout>
    <h1 class="title">Hello {{ auth()->user()->username }}</h1>
    <div class="card mb-4">
        <h2 class="font-bold mb-4"> Create a new Post</h2>
        @if (session('success'))
            <x-alert msg="{{ session('success') }}" bg="bg-green-500" />
        @elseif (session('delete'))
            <x-alert msg="{{ session('delete') }}" bg="bg-red-500" />
             @elseif (session('update'))
            <x-alert msg="{{ session('update') }}" bg="bg-teal-500" />
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="input @error('title') ring-red-500  @enderror">
                @error('title')
                    <p class="error"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body">Body</label>
                <textarea name="body" rows="5">{{ old('body') }}</textarea>
                @error('body')
                    <p class="error"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <button class="primary-btn">Create post</button>
        </form>
    </div>

    <h1 class="title">My Posts</h1>
    <div class="grid grid-cols-2 grap-6 ">
        @foreach ($posts as $post)
            <x-card :post="$post">
                  <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-500 text-white px-2 mx-2 py-1 text-xs rounded-lg">Update</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-2 py-1 text-xs rounded-lg">Delete</button>                
                </form>
            </x-card>
        @endforeach
    </div>

    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
