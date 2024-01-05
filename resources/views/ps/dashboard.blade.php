@extends('layouts.sideBar')

@section('content')
<div class="flex flex-col p-8">
    <h2 class="text-2xl font-bold text-black mb-4">Dashboard</h2>
    @if (Session::get('failed'))
        <div class="bg-red-500 text-white p-4 mb-4">{{ Session::get('failed') }}</div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md mb-4">
            <h4 class="text-xl font-semibold mb-4 text-black">
                Peserta Didik Rayon {{ App\Models\rayon::find($rayonIdLogin)->rayon }}
            </h4>
            <div class="text-4xl font-bold text-black">
                <i class="fas fa-users"></i> {{ $totalStudents }}
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md mb-4">
            <h4 class="text-xl font-semibold mb-4 text-black">
                Jumlah Keterlambatan {{ App\Models\rayon::find($rayonIdLogin)->rayon }}
            </h4>
            <div class="text-4xl font-bold text-black">
                <i class="fas fa-users"></i> {{ $totalLates }}
            </div>
        </div>
        <div class="col-span-2 md:col-span-2 lg:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow-md mb-4">
                <h4 class="text-xl font-semibold mb-4 text-black">
                    Keterlambatan {{ App\Models\rayon::find($rayonIdLogin)->rayon }} Hari ini
                </h4>
                <h4 class="text-lg font-semibold mb-2 text-black">
                    {{ \Carbon\Carbon::now()->format('Y-m-d') }}
                </h4>
                <div class="text-4xl font-bold text-black">
                    <i class="fas fa-users"></i> {{ $todayLates }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
