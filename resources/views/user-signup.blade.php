<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User signup</title>
    @vite('resources/css/app.css')
</head>
<body>
<x-user-navbar />
<div class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <form action="/user-signup" method="POST" class="space-y-4">
            @csrf

            <div>
                <h2 class="text-2xl text-center text-gray800 mb-6">User signup</h2>
                <label for="" class="text-gray800 mb-1">User Name</label>
                  @error('user')
                <div class="text-red-500">{{$message}}</div>
                @enderror
                <input type="text" placeholder="enter name" name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                @error('name')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
             <div>
                <label for="" class="text-gray800 mb-1">User Email</label>
                <input type="email" placeholder="enter user email" name="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                @error('email')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            
            <div>
                <label for="" class="text-gray800 mb-1">Password</label>
                <input type="password" placeholder="enter admin password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                @error('password')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
             <div>
                <label for="" class="text-gray800 mb-1"> ConfirmPassword</label>
                <input type="password" placeholder="confirm password" name="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
               
            </div>
            <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white">Signup</button>
        </form>
    </div>

</div>
<div>

</html>