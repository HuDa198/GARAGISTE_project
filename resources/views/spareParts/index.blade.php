@extends('app')

@section('content')
    @if (session('success'))
        <div class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Congratulations!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

    <div class="flex justify-center mt-6 min-h-screen p-0">
        <div class="w-full max-w-6xl border-solid border-gray-300 rounded border shadow-sm">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded"
                    href="{{ route('spareparts.create') }}"> Create New Spare Part</a>
            </div>
            
            <div class="p-3">
                <div class="mt-4">
                    {!! $spareParts->links() !!}
                </div>
                <table class="table-auto w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/5 px-6 py-2">Part Name</th>
                            <th class="border w-1/5 px-6 py-2">Part Reference</th>
                            <th class="border w-1/5 px-6 py-2">Supplier</th>
                            <th class="border w-1/5 px-6 py-2">Price</th>
                            <th class="border w-1/5 px-6 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($spareParts as $sparePart)
                            <tr>
                                <td class="border px-6 py-2">{{ $sparePart->partName }}</td>
                                <td class="border px-6 py-2">{{ $sparePart->partReference }}</td>
                                <td class="border px-6 py-2">{{ $sparePart->supplier }}</td>
                                <td class="border px-6 py-2">{{ $sparePart->price }}</td>
                                <td class="border px-6 py-2">

                                    <form action="{{ route('spareparts.destroy', $sparePart->id) }}" method="POST">
                                        <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white"
                                            href="{{ route('spareparts.show', $sparePart->id) }}">
                                            <i class="fas fa-eye"></i></a>
                                        <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white"
                                            href="{{ route('spareparts.edit', $sparePart->id) }}">
                                            <i class="fas fa-edit"></i></a>

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

               
            </div>
        </div>
    </div>
@endsection
