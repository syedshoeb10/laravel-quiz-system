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
            <h2 class="text-2xl font-semibold mb-4 text-green-800">Category name : {{$category}}</h2>


        </div>

        {{-- Category List --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-2xl font-semibold mb-4">Quiz List</h2>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">

                        <th class="p-3">Quiz id </th>
                        <th class="p-3">Quiz name</th>
                        <th class="p-3">Mcq count</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($quizData as $item)
                    <tr class="border-t">
                        <td class="p-3">{{ $item->id }}</td>
                        <td class="p-3">{{ $item->name }}</td>
                        <td class="p-3">{{ $item->mcq_count }}</td>


                        <td class="p-3 text-center">
                            <a href="/start-quiz/{{$item->id}}/{{$item->name}}"
                                class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">
                                Attempt Quiz
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">
                            No Quiz found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>