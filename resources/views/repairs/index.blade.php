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
                    href="{{ route('repairs.create') }}"> Create New Repair</a>
            </div>

            <div class="p-3">
                <div class="mt-4">
                    {!! $repairs->links() !!}
                </div>
                <table class="table-auto w-full rounded">
                    <thead>
                        <tr>
                            <th class="border w-1/6 px-6 py-2">Description</th>
                            <th class="border w-1/8 px-6 py-2">Status</th>
                            <th class="border w-1/8 px-6 py-2">Start Date</th>
                            <th class="border w-1/6 px-6 py-2">End Date</th>
                            <th class="border w-1/6 px-6 py-2">Repair Costs</th>
                            <th class="border w-1/4 px-6 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repairs as $repair)
                            <tr>
                                <td class="border px-6 py-2">{{ $repair->description }}</td>
                                <td class="border px-6 py-2">{{ $repair->status }}</td>
                                <td class="border px-6 py-2">{{ $repair->startDate }}</td>
                                <td class="border px-6 py-2">{{ $repair->endDate }}</td>
                                <td class="border px-6 py-2">{{ $repair->repaireCosts }}</td>
                                <td class="border px-6 py-2">
                                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white"
                                        href="{{ route('repairs.show', $repair->id) }}">
                                        <i class="fas fa-eye"></i></a>
                                    <a  href="{{ route('invoices.print', $repair->id) }}"
                                        class="bg-gray-200 hover:bg-gray-500 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                        </svg>
                                        <span>Facture</span>
                                    </a>
                                    <form action="{{ route('repairs.destroy', $repair->id) }}" method="POST"
                                        class="inline-block">
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
