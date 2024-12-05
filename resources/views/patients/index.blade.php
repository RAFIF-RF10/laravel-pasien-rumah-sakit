<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Tombol Tambah Pasien -->
                    <a href="{{ route('patients.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Tambah Pasien</a>

                    <!-- Tabel Pasien -->
                    <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Umur</th>
                                <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                                <th class="px-4 py-2 text-left">Penyakit</th>
                                <th class="px-4 py-2 text-left">Ruangan</th>
                                <th class="px-4 py-2 text-left">Status</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $patient)
                                <tr class="border-t hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $patient->name }}</td>
                                    <td class="px-4 py-2">{{ $patient->age }}</td>
                                    <td class="px-4 py-2">{{ $patient->gender }}</td>
                                    <td class="px-4 py-2">{{ $patient->disease }}</td>
                                    <td class="px-4 py-2">{{ $patient->room }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Mengubah warna status -->
                                        <span class="{{ $patient->status == 'in-treatment' ? 'text-red-600' : 'text-green-600' }}">
                                            {{ $patient->status == 'in-treatment' ? 'Masih Dirawat' : 'Sudah Pulang' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('patients.edit', $patient->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 inline-block mb-2">Edit</a>
                                        <!-- Form Hapus -->
                                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
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
</x-app-layout>
