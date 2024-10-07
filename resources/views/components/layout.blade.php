<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME')}}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
     @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('posts.index')}}" class="nav-link ">Home</a>
       @auth
           <div class="relative grid place-items-center" x-data="{open:false}">
            <button @click="open = !open" type="button" class="round-btn"><img src="https://picsum.photos/200" alt=""></button>
        <div x-show="open" @click.outside="open = false" class="bg-white px-10 shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light" x-show="{
        open : false}">
            <p class="m-3">{{ auth()->user()->username}}</p>
            <hr>
            <a href="{{route('dashbord')}}" class="block hover:bg-slate-100 pl-4 py-2 ">Dashbord</a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button  type="submit" class="block hover:bg-slate-100 pl-4 py-2 ">Logout</button>
        </form>
        </div>   
        </div>
       @endauth
       
    @guest
            <div class="flex items-center grap-4">
            <a href=" {{ route('register')}}" class="nav-link ">Register</a>
            <a href=" {{ route('login')}}" class="nav-link ">Login</a>
        </div>
       @endguest
        </nav>
    </header>
    <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{ $slot}}
    </main>
</body>   
</html>