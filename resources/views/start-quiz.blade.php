<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <x-user-navbar />

    {{-- Success Message --}}
    @if(session('category'))
    <div class="max-w-5xl mx-auto mt-4 bg-green-900 text-white px-4 py-2 rounded">
        {{ session('category') }}
    </div>
    @endif

    <div class="max-w-5xl mx-auto mt-10 space-y-8">

        {{-- Add Category Form --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h1 class="text-4xl font-semibold mb-4 text-green-800">Quizname : {{$quizName}}</h1>
            <h2 class="text-2xl font-semibold mb-4 text-green-400"> this quiz contain {{$quizCount}} questions and no limit to attemp this quiz </h2>
            <h3 class="text-xl font-semibold mb-4 text-green-900 text-center"> Good Luck </h3>
            <a type="submit" href="/user-signup" class=" bg-blue-500 rounded-md px-4 py-2 text-white">Login signup for start Quiz</a>




        </div>



    </div>

</body>

</html>