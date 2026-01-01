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

    <div class="bg-white p-6 rounded-2xl shadow">
        @if(!session('quizDetails'))
        <h2 class="text-2xl font-semibold mb-4">Add Quiz</h2>

        <form action="/add-quiz" method="get" class="flex gap-4">
            <input
                type="text"
                name="quiz"
                placeholder="Enter Quiz name"
                class="flex-1 px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
                required>
            <div>
                <select name="category_id"
                    class="flex-1 px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
                    required>>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                </select>
            </div>


            <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700">
                Add
            </button>
            @error('category')
            <div class="text-red-500">{{$message}}</div>
            @enderror
    </div>
    </form>
    @else
    <span class="text-2xl font-semibold mb-4 text-green-500">Quiz : {{session('quizDetails')->name}}</span>
    <h2 class="text-2xl font-semibold mb-4">Add Mcqs</h2>
    <form action="" method="get" class="space-y-4">

        <!-- Textarea -->
        <textarea
            name="quiz_description"
            placeholder="Enter Quiz Description"
            class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
            rows="4"
            required></textarea>

        <!-- Input 1 -->
        <input
            type="text"
            name="question_1"
            placeholder="Enter Question 1"
            class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
            required>

        <!-- Input 2 -->
        <input
            type="text"
            name="question_2"
            placeholder="Enter Question 2"
            class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
            required>

        <!-- Input 3 -->
        <input
            type="text"
            name="question_3"
            placeholder="Enter Question 3"
            class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
            required>

        <!-- Input 4 -->
        <input
            type="text"
            name="question_4"
            placeholder="Enter Question 4"
            class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300"
            required>

        <div>
            <select name="right answer" id="" class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-300">
                <option value="">Select option</option>
                <option value="">A</option>
                <option value="">B</option>
                <option value="">C</option>
                <option value="">D</option>
            </select>
        </div>
           <button
                type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700">
                Add More
            </button>
               <button
                type="submit"
                class="bg-green-600 text-white px-6 py-2 rounded-xl">
                Add and submit
            </button>

    </form>

    @endif
    </div>