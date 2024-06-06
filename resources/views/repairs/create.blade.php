@extends('app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex justify-around bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
        <div class="py-2">
            <h2>Add New Repair</h2>
        </div>
        <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
            <a class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded" href="{{ route('repairs.index') }}">
                Back</a>
            <a class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded"
                href="{{ route('clients.create') }}"> Create New Client</a>
        </div>
    </div>
    <form action="{{ route('repairs.store') }}" method="POST">
        @csrf
        <div class="container mx-auto flex flex-wrap flex-center justify-center items-center">
            <div class="w-full max-w-lg">
                <div class="leading-loose">
                    <div class="max-w-xl m-4 p-10 bg-white rounded shadow-xl">
                        <!-- Other input fields -->
                        <div class="">
                            <label class="block text-sm text-gray-600" for="description">Description</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="text"
                                name="description" value="{{ old('description') }}" placeholder="Description" autofocus>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="status">Status</label>
                            <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="status">
                                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In
                                    Progress</option>
                                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed
                                </option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="startDate">Start Date</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="date"
                                name="startDate" value="{{ old('startDate') }}" placeholder="Start Date">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="endDate">End Date</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="date" name="endDate"
                                value="{{ old('endDate') }}" placeholder="End Date">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="repaireCosts">Repair Costs</label>
                            <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" type="number"
                                name="repaireCosts" value="{{ old('repaireCosts') }}" placeholder="Repair Costs">
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="vehicleId">Vehicle</label>
                            <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="vehicleId"
                                id="vehicleId">
                                <option>--select item--</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}"
                                        {{ old('vehicleId') == $vehicle->id ? 'selected' : '' }}>
                                        {{ $vehicle->mark }} {{ $vehicle->model }} {{$vehicle->registration}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Client select box -->
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="ClientId">Client</label>
                            <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="ClientId"
                                id="ClientId" >
                                <option>--select item--</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"
                                        {{ old('ClientId') == $client->id ? 'selected' : '' }} >
                                        {{ $client->name }} <!-- Assuming 'name' is the client's name attribute -->
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="mechanicId">Mechanic</label>
                            <select class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="mechanicId">
                                <option>--select item--</option>
                                @foreach ($mechanics as $mechanic)
                                    <option value="{{ $mechanic->id }}"
                                        {{ old('mechanicId') == $mechanic->id ? 'selected' : '' }}>
                                        {{ $mechanic->userName }}
                                        <!-- Assuming 'userName' is the mechanic's name attribute -->
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm text-gray-600" for="sparePartId">Spare Parts</label>
                            <div id="spare_parts_select" class="relative w-full">
                                <input type="text" id="spare_parts_input"
                                    class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded"
                                    placeholder="Search for spare parts...">
                                <div id="spare_parts_list"
                                    class="absolute w-full bg-white border rounded mt-1 max-h-40 overflow-y-auto hidden">
                                    @foreach ($spareParts as $sparePart)
                                        <div class="spare_part_item px-4 py-2 cursor-pointer hover:bg-gray-200"
                                            data-id="{{ $sparePart->id }}">{{ $sparePart->partName }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="selected_spare_parts" class="mt-2 flex flex-wrap">
                                @foreach (old('sparePartId', []) as $sparePartId)
                                    <div
                                        class="selected_part bg-blue-200 text-blue-800 px-2 py-1 rounded mr-2 mb-2 flex items-center">
                                        <span>{{ $spareParts->firstWhere('id', $sparePartId)->partName }}</span>
                                        <input type="hidden" name="sparePartId[]" value="{{ $sparePartId }}">
                                        <button type="button" class="remove_part ml-2 text-red-500">x</button>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="mechanicNotes">Mechanic Notes</label>
                                <textarea class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="mechanicNotes" rows="4"
                                    placeholder="Mechanic Notes">{{ old('mechanicNotes') }}</textarea>
                            </div>

                            <div class="mt-2">
                                <label class="block text-sm text-gray-600" for="clientNotes">Client Notes</label>
                                <textarea class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" name="clientNotes" rows="4"
                                    placeholder="Client Notes">{{ old('clientNotes') }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button
                                class="px-6 py-2 text-white font-light tracking-wider bg-gray-900 rounded">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sparePartsInput = document.getElementById('spare_parts_input');
            const sparePartsList = document.getElementById('spare_parts_list');
            const selectedSpareParts = document.getElementById('selected_spare_parts');
            const sparePartItems = document.querySelectorAll('.spare_part_item');

            sparePartsInput.addEventListener('focus', () => {
                sparePartsList.classList.remove('hidden');
            });

            sparePartsInput.addEventListener('input', () => {
                const filter = sparePartsInput.value.toLowerCase();
                sparePartItems.forEach(item => {
                    if (item.textContent.toLowerCase().includes(filter)) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });

            sparePartItems.forEach(item => {
                item.addEventListener('click', () => {
                    const partName = item.textContent;
                    const partId = item.getAttribute('data-id');

                    // Check if the part is already selected
                    if (selectedSpareParts.querySelector(`input[value="${partId}"]`)) {
                        return;
                    }

                    const selectedPart = document.createElement('div');
                    selectedPart.classList.add('selected_part', 'bg-blue-200', 'text-blue-800',
                        'px-2', 'py-1', 'rounded', 'mr-2', 'mb-2', 'flex', 'items-center');
                    selectedPart.innerHTML = `<span>${partName}</span>
                                              <input type="hidden" name="sparePartId[]" value="${partId}">
                                              <button type="button" class="remove_part ml-2 text-red-500">x</button>`;
                    selectedSpareParts.appendChild(selectedPart);

                    selectedPart.querySelector('.remove_part').addEventListener('click', () => {
                        selectedPart.remove();
                    });

                    sparePartsInput.value = '';
                    sparePartsList.classList.add('hidden');
                });
            });

            document.addEventListener('click', (event) => {
                if (!sparePartsInput.contains(event.target) && !sparePartsList.contains(event.target)) {
                    sparePartsList.classList.add('hidden');
                }
            });
        });
    </script>
    <script>
        // Add onchange event listener to vehicle select box
        $('#vehicleId').on('change', function() {
            const selectedVehicleId = $(this).val();
            // Fetch client associated with the selected vehicle via AJAX
            $.ajax({
                url: `/vehicles/${selectedVehicleId}/owner`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Clear existing options
                    $('#ClientId').empty();
                    console.log(data.id)
                    // Create a new option for the client and append it to the select box
                    const option = $('<option>').text(data.userName).val(data.id);
                    $('#ClientId').append(option);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching client:', error);
                }
            });
        });
    </script>
@endsection
