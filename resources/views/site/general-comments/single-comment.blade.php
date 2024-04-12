<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4 text-center">{{ __("Single General Comment") }}</h2>

                <div>
                    <p>{{ $generalComment->name }}  :  {{ $generalComment->email }}  :  {{ $generalComment->created_at }}</p>
                    <p>{{ $generalComment->comment }}</p>
                </div>

                <div class="text-center mb-4">
                    <a href="{{ route('genCom.my.edit', $generalComment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border" style="max-width: 120px">Create Sub Commit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
