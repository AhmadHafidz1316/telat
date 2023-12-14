@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <div class="mb-4">
            <a href="{{ route('rombel.create') }}"><button class="bg-blue-500 text-white py-2 px-4 rounded">Tambah
                    User</button></a>
        </div>
        <div class="container mx-auto mt-8">
            <table class="min-w-full bg-white border ">
                <thead>
                    <tr style="color: black">
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($rombel as $item)
                      <tr style="color: black">
                     <td class="text-center">{{ ($rombel->currentPage() - 1) * $rombel->perPage() + $loop->index + 1 }}</td>
                     <td class="py-2 px-4 border-b text-center">{{ $item['rombel'] }}</td>
                     <td class="py-2 px-4 border-b text-center">
                        <a href="{{ route('rombel.edit' , $item['id']) }}" class="btn btn-primary me-2"><i class="fa-solid fa-pen-to-square"></i>
                            <form action="{{ route('rombel.delete', $item['id']) }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </a>
                     </td>
                    </tr>  
                     @endforeach
                </tbody>
            </table>
        </div>
    @endsection
