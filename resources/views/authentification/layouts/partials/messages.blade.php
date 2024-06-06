@if(isset($errors) && count($errors) > 0)
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4" role="alert">
        <ul class="list-disc list-inside mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 flex items-center" role="alert">
                <i class="fas fa-check mr-2"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 flex items-center" role="alert">
            <i class="fas fa-check mr-2"></i>
            {{ $data }}
        </div>
    @endif
@endif
