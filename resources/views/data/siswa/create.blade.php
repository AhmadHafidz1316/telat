@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <form action="{{ route('siswa.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="nis" class="block text-gray-700 text-sm font-bold mb-2">NIS:</label>
                <input type="text" id="nis" name="nis"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan NIS" required>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" id="name" name="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan Nama" required>
            </div>

            <div class="mb-4">
                <label for="rombel_id" class="block text-gray-700 text-sm font-bold mb-2">Rombel:</label>
                <select name="rombel_id" id="rombel_id"
                    class="form-select appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    <option value="" disabled selected>Pilih Rombel</option>
                    @foreach ($rombel as $user)
                        <option value="{{ $user['id'] }}">{{ $user['rombel'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="rayon_id" class="block text-gray-700 text-sm font-bold mb-2">Rayon:</label>
                <select name="rayon_id" id="rayon_id"
                    class="form-select appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    <option value="" disabled selected>Pilih Rayon</option>
                    @foreach ($rayon as $user)
                        <option value="{{ $user['id'] }}">{{ $user['rayon'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan</button>
            </div>
        </form>
    </div>
@endsection
