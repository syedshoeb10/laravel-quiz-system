<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories</title>
    @vite('resources/css/app.css')
</head>

<body>
    <x-user-navbar />
    <div class="flex flex-col min-h-screen items-center bg-gray-100">
        <h1 class="text-3xl text-green-900 p-5">Check Your Skill</h1>
        <div class="w-full max-w-md">
            <div class="relative">
                <input class="w-full px-4 py-3 text-gray-700 border border-gray-300 
            rounded-2xl shadow" type="text" placeholder="Search Quiz...">
                <button class="absolute right-2 top-3">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                        <path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" />
                    </svg>
                </button>
            </div>
        </div>
        {{-- Category List --}}
        <div class="bg-white p-10 rounded-2xl shadow m-y-10">
            <h2 class="text-2xl font-semibold mb-4">Category List</h2>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3">ID</th>
                        <th class="p-3">Category Name</th>
                        <th class="p-3">Quiz count</th>

                        <th class="p-3">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $category)
                    <tr class="border-t">
                        <td class="p-3">{{ $category->id }}</td>
                        <td class="p-3">{{ $category->name }}</td>
                        <td>{{ $category->quizzes_count }}</td>

                        <td class="p-3">
                            <a href="{{ url('user-quiz-list/'.$category->id.'/'.$category->name) }}"
                                class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700">
                                View
                            </a>
                        </td>
                    </tr>


                    @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            No categories found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <x-footer-user />

</body>

</html>