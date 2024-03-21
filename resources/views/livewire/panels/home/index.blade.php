<div>
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-4">Chart</h4>
            <div dir="ltr">
                <div class="mt-3 chartjs-chart">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div> <!-- end card body-->
    </div>
</div>

@once
    @push('scripts')
        <script src="{{ asset('assets/panel/js/vendor/chart.min.js') }}"></script>
    @endpush
@endonce
@once
    @push('scripts')
        <script>
            new Chart(document.getElementById('myChart'), {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        borderWidth: 1
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
    @endpush
@endonce
