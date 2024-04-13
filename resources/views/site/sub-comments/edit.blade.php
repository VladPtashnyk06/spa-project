<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="max-width: 95rem">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Edit SubComment</h2>

                <form action="{{ route('comment.update', $subComment->id) }}" method="post" class="max-w-4xl mx-auto">
                    @csrf

                    <input type="hidden" name="name" id="name" value="{{ $subComment->name }}">
                    <input type="hidden" name="email" id="email" value="{{ $subComment->email }}">

                    <div class="mb-4">
                        @error('comment')
                            <span class="text-red-500">{{ __("This field is required") }}</span>
                        @enderror
                        <label for="comment" class="block mb-2 font-bold">Comment</label>
                        <textarea name="comment" id="comment" class="w-full border rounded px-3 py-2 h-32">{{ $subComment->comment }}</textarea>
                    </div>

                    <div class="text-center mb-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border">Update subComment</button>
                    </div>
                    <div class="text-center mb-4">
                        <a href="{{ route('genCom.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full max-w-xs">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
