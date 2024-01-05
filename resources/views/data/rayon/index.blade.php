@extends('layouts.sideBar')

@section('content')
    <h2 class="text-2xl font-bold text-black mb-4">Daftar Rayon</h2>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="container mx-auto mt-8">
            <div class="mb-4">
                <a href="{{ route('rayon.create') }}">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded">Tambah Rayon</button>
                    @if (Session::get('success'))
                        <div class="mt-5 bg-green-500 text-white py-2 px-4 rounded">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::get('deleted'))
                        <div class="mt-5 bg-red-500 text-white py-2 px-4 rounded">{{ Session::get('deleted') }}</div>
                    @endif
                </a>
            </div>
            <div class="container mx-auto mt-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border rounded-lg overflow-hidden">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="py-2 px-4 border-b">#</th>
                                <th class="py-2 px-4 border-b">Rayon</th>
                                <th class="py-2 px-4 border-b">Pembimbing Siswa</th>
                                <th class="py-2 px-4 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-800">
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($rayons as $item)
                                <tr>
                                    <td class="text-center py-2 px-4 border-b">
                                        {{ ($rayons->currentPage() - 1) * $rayons->perPage() + $loop->index + 1 }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $item['rayon'] }}</td>
                                    <td class="py-2 px-4 border-b text-center">{{ $item->user->name }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        <a href="{{ route('rayon.edit', $item['id']) }}"
                                            class="text-blue-500 hover:underline mr-2">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('rayon.delete', $item['id']) }}" method="post"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
