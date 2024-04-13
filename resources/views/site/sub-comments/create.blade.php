<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="max-width: 95rem">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Create SubComment</h2>

                <div class="mb-6 border border-gray-200 p-4 rounded-lg bg-white max-w-4xl mx-auto">
                    <p class="mb-2 text-gray-700">{{ $generalComment->name }} : {{ $generalComment->email }} : {{ $generalComment->created_at }}</p>
                    <p class="text-gray-700">{{ $generalComment->comment }}</p>
                </div>

                <form action="{{ route('comment.store', $generalComment->id) }}" method="post" class="max-w-4xl mx-auto">
                    @csrf

                    <input type="hidden" name="general_comment_id" id="general_comment_id" value="{{ $generalComment->id }}">
                    <input type="hidden" name="name" id="name" value="{{ $user->name }}">
                    <input type="hidden" name="email" id="email" value="{{ $user->email }}">
                    <input type="hidden" name="page" id="page" value="{{ 'https://app.spa.test/profile/'.$user->id.'' }}">

                    <div class="mb-4">
                        @error('comment')
                            <span class="text-red-500">{{ __("This field is required") }}</span>
                        @enderror
                        <label for="comment" class="block mb-2 font-bold">Comment</label>
                        <textarea name="comment" id="comment" class="w-full border rounded px-3 py-2 h-32"></textarea>
                    </div>

                    <div class="mb-4">
                        <span>{!! captcha_img('characters') !!}</span>
                        <div>
                            @error('captcha')
                                <span class="text-red-500">{{ __("This field is required") }}</span>
                            @enderror
                            <label for="captcha" class="block mb-2 font-bold">Captcha</label>
                            <input type="text" name="captcha" id="captcha" class="w-full border rounded px-3 py-2">
                        </div>
                    </div>

                    <div class="text-center mb-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border">Create comment</button>
                    </div>
                </form>

                <div class="text-center">
                    <a href="{{ route('genCom.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full max-w-xs">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
