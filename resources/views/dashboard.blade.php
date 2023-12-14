@extends('layouts.sideBar')

@section('content')
<h2 class="text-xl" style="color: black">Dashboard</h2>
<h3 class="text-xl" style="color: black">Home / Dashboard</h3>
<br><br>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <!-- Card 1 -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-semibold mb-2">Card 1</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4 sm:mb-0">
            <h2 class="text-xl font-semibold mb-2">Card 2</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4 sm:mb-0">
            <h2 class="text-xl font-semibold mb-2">Card 3</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        
        <!-- Card 4 -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-semibold mb-2">Card 4</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <!-- Card 5 -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-semibold mb-2">Card 5</h2>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
@endsection
