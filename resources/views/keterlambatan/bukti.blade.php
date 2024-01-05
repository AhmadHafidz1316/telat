@extends('layouts.sideBar')

@section('content')
    <h2 class="text-2xl font-bold">Detail Data Keterlambatan</h2>
    <br>
    <h5 class="text-lg">
        {{ $student->nis }} | {{ $student->name }} | {{ $student->rombel->rombel }} | {{ $student->rayon->rayon }}
    </h5>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5">
        @foreach ($lates as $late)
            <div class="max-w-sm mx-auto bg-white rounded overflow-hidden shadow-lg">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $late['bukti']) }}"
                     alt="Bukti Keterlambatan">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Keterlambatan Ke-{{ $loop->iteration }}</div>
                    <p class="text-gray-700 text-base">{{ $late->date_time_late }}</p>
                    <p class="text-gray-700 text-base">{{ $late->information }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
