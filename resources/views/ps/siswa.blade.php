@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-bold text-black mb-4">Data Siswa </h2>

        @if($students->count() > 0)
            <table class="min-w-full bg-white divide-y divide-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">NIS</th>
                        <th class="py-2 px-4 border-b">Rayon</th>
                        <th class="py-2 px-4 border-b">Rombel</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800">
                    @foreach ($students as $student)
                        <tr>
                            <td class="py-2 px-4 border-b whitespace-nowrap text-center">{{ $student->name }}</td>
                            <td class="py-2 px-4 border-b whitespace-nowrap text-center">{{ $student->nis }}</td>
                            <td class="py-2 px-4 border-b whitespace-nowrap text-center">{{ $student->rayon->rayon }}</td>
                            <td class="py-2 px-4 border-b whitespace-nowrap text-center">{{ $student->rombel->rombel }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $students->links() }}
        @else
            <p class="mt-4">No students found.</p>
        @endif
    </div>
@endsection
