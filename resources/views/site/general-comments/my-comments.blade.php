<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8" style="max-width: 95rem">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold mb-6 text-center">{{ __("My General Comments") }}</h1>
                    <div class="text-center mb-6">
                        <a href="{{ route('genCom.my.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border">{{ __("Create General Comment") }}</a>
                    </div>
                    <table class="w-full mb-5">
                        <thead>
                            <tr class="text-center border-b-2 border-gray-700">
                                <th class="p-3 text-lg">User Name</th>
                                <th class="p-3 text-lg">Email</th>
                                <th class="p-3 text-lg">Comment</th>
                                <th class="p-3 text-lg">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($generalComments as $generalComment)
                            <tr class="text-center odd:bg-gray-200">
                                <td class="px-6 py-4" style="word-wrap: break-word; max-width: 15rem; vertical-align: top;">{{ $generalComment->name }}</td>
                                <td class="px-6 py-4" style="word-wrap: break-word; max-width: 20rem; vertical-align: top;">{{ $generalComment->email }}</td>
                                <td class="px-6 py-4" style="word-wrap: break-word; max-width: 20rem; vertical-align: top;">{{ $generalComment->comment }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('genCom.my.edit', $generalComment->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out w-full border" style="max-width: 120px">{{ __("Edit") }}</a>
                                    <form action="{{ route('genCom.my.destroy', $generalComment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out mb-2 mt-3 w-full border" style="max-width: 120px">{{ __("Delete") }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
