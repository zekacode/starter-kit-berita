<x-app-layout>
    <x-slot name="header">
        Edit Kategori: {{ $category->name }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @method('PUT')
                @include('categories._form', ['submitButtonText' => 'Update'])
            </form>
        </div>
    </div>
</x-app-layout>