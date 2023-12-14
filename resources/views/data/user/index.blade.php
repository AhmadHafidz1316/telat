@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="mb-4">
            <a href="{{ route('user.create') }}"><button class="bg-blue-500 text-white py-2 px-4 rounded">Tambah
                    User</button></a>
            @if (Session::get('success'))
                <div class="alert alert-danger mt5">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('deleted'))
                <div class="alert alert-danger mt5">{{ Session::get('deleted') }}</div>
            @endif
        </div>
        <div class="container mx-auto mt-8">
            <table class="min-w-full bg-white border ">
                <thead>
                    <tr style="color: black">
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Role</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($user as $item)
                    
                    <!-- Isi tabel sesuai data user -->
                    <tr style="color: black;">
                        <td class="text-center">{{ ($user->currentPage() - 1) * $user->perPage() + $loop->index + 1 }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item['name'] }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item['email'] }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $item['role'] }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{ route('user.edit' , $item['id']) }}" class="btn btn-primary me-2"><i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('user.delete', $item['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                    
                    @endforeach
                    <!-- Tambahkan baris sesuai jumlah user dan datanya -->
                </tbody>
            </table>
        </div>
    @endsection
