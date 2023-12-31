<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            フォーム
        </h2>
    </x-slot>
    <div class="max-wx7 mx-auto px-6">
        <x-message :message="session('message')" />
        <form method="post" action="{{ route('post.store') }}">
            @csrf
            <div class="mt-8">
                <div class="w-full flex flex-col">
                    <label for="title" class="font-semibold mt-4">件名</label>
                    <x-input-error class="mt-2" :messages="$errors->get('title')"></x-input-error>
                    <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-s-md"
                        id="title" value="{{ old('title') }}">
                </div>
            </div>

            <div class="w-full flex flex-col">
                <label for="body" class="font-semibold mt-4">本文</label>
                <x-input-error class="mt-4" :messages="$errors->get('body')"></x-input-error>
                <textarea class="w-auto py-2 border border-gray-300 rounded-md" name="body" id="body" cols="30"
                    rows="10">{{ old('body') }}</textarea>
            </div>
            <x-primary-button class="mt-4">
                送信する
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
