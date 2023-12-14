@extends('layouts.sideBar')

@section('content')
    <div class="container mx-auto mt-8">
        <form action="{{ route('rayon.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="rayon" class="block text-gray-700 text-sm font-bold mb-2">rayon:</label>
                <input type="text" id="rayon" name="rayon"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Masukkan rayon" required>
            </div>

            <div class="mb-4">
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option selected hidden disabled>Pilih PS</option>
                        <option value="{{ $user['name'] }}">{{ $user['name'] }}</option>
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
