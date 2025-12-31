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
            <h2 class="text-2xl font-semibold mb-4">Add Category</h2>

            <form action="/add-category" method="POST" class="flex gap-4">
                @csrf

                <input
                    type="text"
                    name="category"
                    placeholder="Enter category name"
                    class="flex-1 px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
                    required
                >

                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700"
                >
                    Add
                </button>
                 @error('category')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            </form>
        </div>

        {{-- Category List --}}
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-2xl font-semibold mb-4">Category List</h2>

            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3">#</th>
                        <th class="p-3">Category Name</th>
                        <th class="p-3">Created By</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($categories as $category)
                        <tr class="border-t">
                            <td class="p-3">{{ $category->id }}</td>
                            <td class="p-3">{{ $category->name }}</td>
                            <td class="p-3">{{ $category->creator }}</td>
                            <td class="p-3 text-center">
                                <form action="{{ url('/delete-category/'.$category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure?')"
                                        class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700"
                                    >
                                        Delete
                                    </button>
                                </form>
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

</body>
</html>
