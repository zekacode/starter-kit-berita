<x-app-layout>
    <x-slot name="header">
        Tulis Berita Baru
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @include('posts._form', ['submitButtonText' => 'Simpan sebagai Draft'])
            </form>
        </div>
    </div>
</x-app-layout>