<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Pasien') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') <!-- Menggunakan PUT untuk update -->
            <div>
                <label for="name" class="block font-medium">Nama Pasien</label>
                <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('name', $patient->name) }}" required>
            </div>
            <div>
                <label for="room" class="block font-medium">Ruangan</label>
                <input type="text" name="room" id="room" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('room', $patient->room) }}" required>
            </div>
            <div>
                <label for="gender" class="block font-medium">Jenis Kelamin</label>
                <select name="gender" id="gender" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    <option value="male" {{ old('gender', $patient->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ old('gender', $patient->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div>
                <label for="disease" class="block font-medium">Penyakit</label>
                <input type="text" name="disease" id="disease" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('disease', $patient->disease) }}" required>
            </div>
            <div>
                <label for="doctor" class="block font-medium">Dokter</label>
                <input type="text" name="doctor" id="doctor" class="w-full border-gray-300 rounded-md shadow-sm" value="{{ old('doctor', $patient->doctor) }}">
            </div>
            <div>
                <label for="status" class="block font-medium">Status</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded-md shadow-sm" required>
                  <option value="Masih Dirawat" {{ old('status', $patient->status == 'in-treatment' ? 'Masih Dirawat' : '') == 'Masih Dirawat' ? 'selected' : '' }}>Masih Dirawat</option>
                  <option value="Sudah Pulang" {{ old('status', $patient->status == 'discharged' ? 'Sudah Pulang' : '') == 'Sudah Pulang' ? 'selected' : '' }}>Sudah Pulang</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
