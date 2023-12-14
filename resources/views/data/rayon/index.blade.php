@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="mb-4">
            <a href="{{ route('rayon.create') }}"><button class="bg-blue-500 text-white py-2 px-4 rounded">Tambah
                    User</button></a>
        </div>
        <div class="container mx-auto mt-8">
            <table class="min-w-full bg-white border ">
                <thead>
                    <tr style="color: black">
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">Rayon</th>
                        <th class="py-2 px-4 border-b">Pembimbing Siswa</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($rayon as $item)
                    <tr style="color: black">
                        <td class="text-center">{{ ($rayon->currentPage() - 1) * $rayon->perPage() + $loop->index + 1 }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item['rayon'] }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item['user_id'] }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{ route('rayon.edit' , $item['id']) }}" class="btn btn-primary me-2"><i class="fa-solid fa-pen-to-square"></i>
                                <form action="{{ route('rayon.delete', $item['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    @endsection
