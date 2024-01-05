@extends('layouts.sideBar')

@section('content')
            <div class="flex flex-col p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Dashboard</h2>
                <h3 class="text-lg text-gray-700 mb-8">Home / Dashboard</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Card 1 -->
                    <div class="bg-white p-6 rounded-md shadow-md mb-4">
                        <h2 class="text-xl font-semibold mb-2">Peserta Didik</h2>
                        <p class="text-gray-600">@php echo DB::table('students')->count(); @endphp</p>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-white p-6 rounded-md shadow-md mb-4">
                        <h2 class="text-xl font-semibold mb-2">Rombel</h2>
                        <p class="text-gray-600">@php echo DB::table('rombels')->count(); @endphp</p>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-white p-6 rounded-md shadow-md mb-4">
                        <h2 class="text-xl font-semibold mb-2">Pembimbing Siswa</h2>
                        <p class="text-gray-600">@php
                            echo DB::table('users')
                                ->where('role', 'ps')
                                ->count();
                        @endphp</p>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-white p-6 rounded-md shadow-md mb-4">
                        <h2 class="text-xl font-semibold mb-2">Rayon</h2>
                        <p class="text-gray-600">@php echo DB::table('rayons')->count(); @endphp</p>
                    </div>

                    <!-- Card 5 -->
                    <div class="bg-white p-6 rounded-md shadow-md mb-4">
                        <h2 class="text-xl font-semibold mb-2">Administrator</h2>
                        <p class="text-gray-600">@php
                            echo DB::table('users')
                                ->where('role', 'admin')
                                ->count();
                        @endphp</p>
                    </div>
                </div>
            </div>
@endsection
