@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="mb-4">
            <a href="{{ route('siswa.create') }}"><button class="bg-blue-500 text-white py-2 px-4 rounded">Tambah
                    User</button></a>
        </div>
        <div class="container mx-auto mt-8">
            <table class="min-w-full bg-white border ">
                <thead>
                    <tr style="color: black">
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">NIS</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Rombel</th>
                        <th class="py-2 px-4 border-b">Rayon</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    @endsection
