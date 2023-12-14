@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <form action="{{ route('siswa.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="nis" class="block text-gray-700 text-sm font-bold mb-2">nis:</label>
                <input type="text" id="nis" name="nis"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan nis" required>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">nama:</label>
                <input type="text" id="name" name="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan nama" required>
            </div>


            <div class="mb-4">
                <select name="rombel_id" id="rombel_id" class="form-control">
                    @foreach ($rombel as $user)
                        <option selected hidden disabled>Rombel:</option>
                        <option value="{{ $user['rombel'] }}">{{ $user['rombel'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <select name="rayon_id" id="rayon_id" class="form-control">
                    @foreach ($rayon as $user)
                        <option selected hidden disabled>Rayon:</option>
                        <option value="{{ $user['rayon'] }}">{{ $user['rayon'] }}</option>
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
