<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categories</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <x-navbar :name="$name" />

    {{-- Success Message --}}
    @if(session('category'))
    <div class="max-w-5xl mx-auto mt-4 bg-green-600 text-white px-4 py-2 rounded">
        {{ session('category') }}
    </div>
    @endif

    <div class="max-w-5xl mx-auto mt-10 space-y-8">

        {{-- Add Category Form --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-2xl font-semibold mb-4">Category name : {{$category}}</h2>

       
    </div>

    {{-- Category List --}}
    <div class="bg-white p-6 rounded-2xl shadow">
        <h2 class="text-2xl font-semibold mb-4">Quiz List</h2>

        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3">#</th>
                    <th class="p-3">Quiz id </th>
                    <th class="p-3">Quiz name</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($quizData as $item)
                <tr class="border-t">
                    <td class="p-3">{{ $item->id }}</td>
                    <td class="p-3">{{ $item->name }}</td>
                    <td class="p-3 text-center">
                           

                            <button
                                type="submit"
                                onclick="return confirm('Are you sure?')"
                                class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700">
                                Delete
                            </button>
                            <a
                                href=""
                                class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700">
                                View
                            </a>


                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">
                        No Quiz  found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    </div>

</body>

</html>