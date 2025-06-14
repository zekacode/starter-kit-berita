<x-app-layout>
    <x-slot name="header">
        Edit Berita: {{ $post->title }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('posts._form', ['submitButtonText' => 'Update Berita'])
            </form>
        </div>
    </div>
</x-app-layout>