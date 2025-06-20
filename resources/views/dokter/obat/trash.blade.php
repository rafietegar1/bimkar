<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Data Obat Terhapus
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 bg-white shadow sm:rounded-lg">
                <a href="{{ route('obat.index') }}" class="btn btn-secondary mb-4">← Kembali</a>

                @if ($obats->isEmpty())
                    <p class="text-center text-gray-600">Tidak ada data obat yang terhapus.</p>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kemasan</th>
                                <th>Harga</th>
                                <th>Dihapus Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obats as $obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->kemasan }}</td>
                                    <td>@rupiah($obat->harga)</td>
                                    <td>{{ $obat->deleted_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <form action="{{ route('obat.restore', $obat->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-success">Restore</button>
                                        </form>
                                        <form action="{{ route('obat.force-delete', $obat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus permanen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus Permanen</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
