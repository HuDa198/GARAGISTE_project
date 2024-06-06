<div id="myModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-gray-900 bg-opacity-50 absolute inset-0"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl max-w-lg w-full sm:w-auto z-50">
        <div class="px-4 py-3 bg-red-500 border-b border-gray-300 flex justify-between items-center">
            <h2 class="text-lg font-medium text-white">Delete</h2>
            <span id="close" class="cursor-pointer text-white hover:text-gray-900">&times;</span>
        </div>
        <div class="px-4 py-5 bg-white">
            <form id="deleteForm" method="post">
                @csrf
                <input type="hidden" id="deleteId" name="deleteId" />
            </form>
            <p class="text-gray-700">Are you sure you want to delete this client?</p>
        </div>
        <div class="px-4 py-3 bg-red-100 border-t border-gray-300 flex justify-end space-x-2">
            <button id="btnCancel" class="btn bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Cancel
            </button>
            <button id="btnDelete" class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Delete
            </button>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        $("#deleteId").val(id);
        $("#myModal").show();
    }

    $("#close, #btnCancel").on('click', function() {
        $("#myModal").hide();
    });

    $("#btnDelete").on('click', function() {
        var formData = $('#deleteForm').serialize();
        axios.post('{{ route("clients.delete", ["client" => ":id"]) }}'.replace(':id', $("#deleteId").val()), formData)
            .then(function(response) {
                if(response.data == "ok") {
                    $("#row" + $("#deleteId").val()).remove();
                }
            })
            .catch(function(error) {
                console.error(error);
            });

        $("#myModal").hide();
    });
</script>
