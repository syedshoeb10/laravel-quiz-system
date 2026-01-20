<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Quiz</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <x-navbar :name="$name" />

    <div class="bg-white p-8 rounded-2xl shadow max-w-3xl mx-auto">

        @if(!session('quizDetails'))
        <!-- ADD QUIZ -->
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Add Quiz</h2>

        <form action="/add-quiz" method="get" class="space-y-5">

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Quiz Name
                </label>
                <input
                    type="text"
                    name="quiz"
                    placeholder="Enter Quiz name"
                    class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Category
                </label>
                <select
                    name="category_id"
                    class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
                    required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="pt-2">
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">
                    Add Quiz
                </button>
            </div>

        </form>

        @else
        <!-- ADD MCQS -->
        <div class="mb-6">
            <span class="inline-block text-lg font-semibold text-green-600">
                Quiz: {{ session('quizDetails')->name }}
            </span>
        </div>

        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Add MCQs</h2>

        <form action="add-mcq" method="post" class="space-y-5">

            @csrf
            <!-- Description -->

            <!-- Question -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Question
                </label>
                <input
                    type="text"
                    name="question"
                    value="{{ old('question') }}"
                    placeholder="Enter your question"
                    class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300
               @error('question') border-red-500 @enderror">

                @error('question')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Options -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">

                <div>
                    <input type="text" name="a" value="{{ old('a') }}" placeholder="Option A"
                        class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300
                   @error('a') border-red-500 @enderror">

                    @error('a')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="text" name="b" value="{{ old('b') }}" placeholder="Option B"
                        class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300
                   @error('b') border-red-500 @enderror">

                    @error('b')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="text" name="c" value="{{ old('c') }}" placeholder="Option C"
                        class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300
                   @error('c') border-red-500 @enderror">

                    @error('c')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="text" name="d" value="{{ old('d') }}" placeholder="Option D"
                        class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300
                   @error('d') border-red-500 @enderror">

                    @error('d')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- Correct Answer -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Correct Answer
                </label>
                <select
                    name="correct_answer"
                    class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300
               @error('correct_answer') border-red-500 @enderror">

                    <option value="">Select option</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>

                @error('correct_answer')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Buttons -->
            <div class="flex gap-4 pt-4">
                <button
                    type="submit" value="add-more" name="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 transition">
                    Add More
                </button>

                <button
                    type="submit" value="done" name="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-xl hover:bg-green-700 transition">
                    Add & Submit
                </button>
                <a href="/end-quiz" class="bg-red-600 text-white px-6 py-2 rounded-xl hover:bg-red-700 transition">finish Quiz</a>
                
            </div>

        </form>
        @endif

    </div>