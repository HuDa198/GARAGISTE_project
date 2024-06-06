<div class="w-4/5 mx-auto">
    <canvas id="areaChart{{ $id }}"></canvas>
</div>



<script>
    var ctx = document.getElementById('areaChart{{ $id }}').getContext('2d');
    var myChart = new Chart(ctx, {
        type: '{{ $type }}',
        data: {
            labels: @json($data_repair['labels']),
            datasets: [{
                label: 'Data',
                data: @json($data_repair['data']),
                backgroundColor: @json($data_repair['color']),
                borderColor: @json($data_repair['color']),
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
