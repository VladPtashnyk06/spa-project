<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="max-width: 95rem">
            <div class="bg-transparent overflow-hidden shadow-sm sm:rounded-lg bg-white">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-2 text-center">General Comments</h1>

                    <form action="{{ route('genCom.index') }}" method="GET">
                        <div class="mb-5 flex justify-center">
                            <select name="name" class="w-1/4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All Names</option>
                                @foreach ($names as $name)
                                    <option value="{{ $name }}" @if(request()->input('name') == $name) selected @endif>{{ $name }}</option>
                                @endforeach
                            </select>

                            <select name="email" class="w-1/4 ml-4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All Emails</option>
                                @foreach ($emails as $email)
                                    <option value="{{ $email }}" @if(request()->input('email') == $email) selected @endif>{{ $email }}</option>
                                @endforeach
                            </select>

                            <select name="created_at" class="w-1/4 ml-4 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">All Created Dates</option>
                                @foreach ($created_ats as $created_at)
                                    <option value="{{ $created_at }}" @if(request()->input('created_at') == $created_at) selected @endif>{{ $created_at }}</option>
                                @endforeach
                            </select>

                            <button type="submit" class="w-1/4 ml-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50">Filter</button>
                        </div>
                    </form>

                    <div class="flex justify-end mb-5">
                        <form action="{{ route('genCom.index') }}" method="GET">
                            <input type="hidden" name="sort" value="{{ request()->input('sort') === 'asc' ? 'desc' : 'asc' }}">
                            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-600 font-bold py-2 px-4 rounded-l transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50">
                                @if(request()->input('sort') === 'asc')
                                    &#8595;
                                @else
                                    &#8593;
                                @endif
                            </button>
                        </form>
                    </div>

                    <table class="w-full mb-5">
                        <thead>
                        <tr class="text-center border-b-2 border-gray-700">
                            <th class="p-2 text-lg">User Name</th>
                            <th class="p-2 text-lg">Email</th>
                            <th class="p-2 text-lg">Comment</th>
                            <th class="p-2 text-lg">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($generalComments as $generalComment)
                            <tr class="text-center odd:bg-gray-200">
                                <td class="px-6 py-4" style="word-wrap:break-word; max-width: 15rem; vertical-align: top;">{{ $generalComment->name }}</td>
                                <td class="px-6 py-4" style="word-wrap:break-word; max-width: 20rem; vertical-align: top;">{{ $generalComment->email }}</td>
                                <td class="px-6 py-4" style="word-wrap:break-word; max-width: 20rem; vertical-align: top;">{{ Str::limit($generalComment->comment, 200) }}</td>
                                <td class="px-6 py-4 text-right" style="vertical-align: top;">
                                    <a href="{{ route('comment.index', $generalComment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border" style="max-width: 120px">Open General Comment</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $generalComments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
