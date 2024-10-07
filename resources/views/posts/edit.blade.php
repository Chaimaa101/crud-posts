<x-layout>
    <a href="{{ route('dashbord') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your dashbord </a>

    <div class="card mb-4">
        <h2 class="font-bold mb-4"> Edit Your Post</h2>
        @if (session('success'))
            <x-alert msg="{{ session('success') }}" bg="bg-green-500" />
        @elseif (session('delete'))
            <x-alert msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="input @error('title') ring-red-500  @enderror">
                @error('title')
                    <p class="error"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="body">Body</label>
                <textarea name="body" rows="5">{{ $post->body }}</textarea>
                @error('body')
                    <p class="error"> {{ $message }}</p>
                @enderror
            </div>

            <div class="h-64 rounded-md mb-4 w-1/4 object-cover overflow-hidden">
                @if ($post->image)
                <label for="">Current cover photo</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                @endif
            </div>

            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <button class="primary-btn">Update</button>
        </form>
    </div>

</x-layout>
