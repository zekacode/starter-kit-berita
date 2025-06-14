<x-app-layout>
    <x-slot name="header">
        Tambah Kategori Baru
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @include('categories._form', ['submitButtonText' => 'Tambah'])
            </form>
        </div>
    </div>
</x-app-layout>