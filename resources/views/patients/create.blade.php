<!-- resources/views/patients/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pasien') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <form action="{{ route('patients.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-medium">Nama Pasien</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('name')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="room" class="block font-medium">Ruangan</label>
                <input type="text" name="room" id="room" value="{{ old('room') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('room')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="gender" class="block font-medium">Jenis Kelamin</label>
                <select name="gender" id="gender" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('gender')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="disease" class="block font-medium">Penyakit</label>
                <input type="text" name="disease" id="disease" value="{{ old('disease') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('disease')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="doctor" class="block font-medium">Dokter</label>
                <input type="text" name="doctor" id="doctor" value="{{ old('doctor') }}" class="w-full border-gray-300 rounded-md shadow-sm">
                @error('doctor')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="in-treatment" {{ old('status') == 'in-treatment' ? 'selected' : '' }}>Masih Dirawat</option>
                    <option value="discharged" {{ old('status') == 'discharged' ? 'selected' : '' }}>Sudah Pulang</option>
                </select>
                @error('status')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="age" class="block font-medium">Umur</label>
                <input type="number" name="age" id="age" value="{{ old('age') }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                @error('age')
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
