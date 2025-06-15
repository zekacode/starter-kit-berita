<x-app-layout>
    <x-slot name="header">
        Persetujuan Berita
    </x-slot>

    <div class="card">
        <div class="card-header">
            Daftar Berita Menunggu Persetujuan
        </div>
        <div class="card-body p-0"> {{-- p-0 untuk membuat tabel menempel rapi --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 40%">Judul</th>
                        <th>Author (Wartawan)</th>
                        <th>Kategori</th>
                        <th>Tanggal Kirim</th>
                        <th style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($postsToReview as $post)
                        <tr>
                            <td>
                                <strong>{{ $post->title }}</strong>
                                {{-- Nanti bisa ditambahkan link untuk lihat detail/preview --}}
                            </td>
                            <td>{{ $post->author->name }}</td>
                            <td>{{ $post->category->name ?? 'N/A' }}</td>
                            <td>{{ $post->created_at->format('d M Y, H:i') }}</td>
                            <td>
                                {{-- Tombol Approve --}}
                                <form action="{{ route('approval.approve', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i> Setujui
                                    </button>
                                </form>

                                {{-- Tombol Reject --}}
                                <form action="{{ route('approval.reject', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menolak berita ini?')">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada berita yang perlu direview saat ini.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($postsToReview->hasPages())
            <div class="card-footer">
                {{ $postsToReview->links() }}
            </div>
        @endif
    </div>
</x-app-layout>