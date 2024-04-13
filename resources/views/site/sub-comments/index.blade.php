<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="max-width: 95rem">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-6 text-center text-gray-800">SubComments</h2>

                <div class="mb-6 border border-gray-200 p-4 rounded-lg bg-white">
                    <p class="mb-2 text-gray-700"><span class="font-semibold">General Comment</span></p>
                    <p class="mb-2 text-gray-700"><span class="font-semibold">Name:</span> {{ $generalComment->name }} <span class="font-semibold">Email:</span> {{ $generalComment->email }} <span class="font-semibold">Created at:</span> {{ $generalComment->created_at }}</p>
                    <p class="mb-4 text-gray-700"><span class="font-semibold">Comment:</span> {{ $generalComment->comment }}</p>
                </div>

                @foreach($subComments as $index => $subComment)
                    <div class="sub-comment-block mb-6 border border-gray-200 p-4 rounded-lg bg-white" style="margin-left: {{ $index * 10 + 10}}px">
                        <p class="mb-2 text-gray-700"><span class="font-semibold">Name:</span> {{ $subComment->name }} <span class="font-semibold">Email:</span> {{ $subComment->email }} <span class="font-semibold">Created at:</span> {{ $subComment->created_at }}</p>
                        <p class="mb-4 text-gray-700"><span class="font-semibold">Comment:</span> {{ $subComment->comment }}</p>
                        @if($user->email == $subComment->email)
                            <div class="flex justify-between">
                                <a href="{{ route('comment.edit', $subComment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out max-w-xs">Edit</a>
                                <form action="{{ route('comment.destroy', $subComment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border" style="max-width: 120px">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="text-center">
                    <a href="{{ route('comment.create', $generalComment->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out max-w-xs">Create SubComment</a>
                    <a href="{{ route('genCom.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full max-w-xs">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
