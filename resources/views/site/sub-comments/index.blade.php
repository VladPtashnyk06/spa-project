<x-app-layout>
    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4 text-center">{{ __("SubComments") }}</h2>

                <div>
                    <p>{{ $generalComment->name }}  :  {{ $generalComment->email }}  :  {{ $generalComment->created_at }}</p>
                    <p>{{ $generalComment->comment }}</p>
                </div>

                @foreach($subComments as $subComment)
                    <div>
                        <p>{{ $subComment->name }}  :  {{ $subComment->email }}  :  {{ $subComment->created_at }}</p>
                        <p>{{ $subComment->comment }}</p>
                        <a href="{{ route('comment.edit', $subComment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border" style="max-width: 120px">Edit SubCommit</a>
                        <a href="{{ route('comment.destroy', $subComment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border" style="max-width: 120px">Delete SubCommit</a>
                    </div>
                @endforeach

                <div class="text-center mb-4">
                    <a href="{{ route('comment.create', $generalComment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border" style="max-width: 120px">Create SubCommit</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
