@extends('layouts.dashboard')

@section('content')
    <div class="row my-2">
        <div class="col-sm-12 col-md-6">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Monitoring Sensor Gas MQ-5</h4>
                    <div id="monitoringGas"></div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Monitoring Sensor Kebakaran</h4>
                    <div id="monitoringKebakaran"></div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="flame-table" class="table table-striped table-bordered mt-4" role="grid"
                            aria-describedby="user-list-page-info">
                            <thead>
                                <tr>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody id="flame-table-body">
                                {{-- Data akan dimasukkan secara dinamis --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        let chartGas;
        async function requestData() {
            try {
                const result = await fetch("{{ route('latest_mq5') }}");
                if (result.ok) {
                    const data = await result.json();
                    console.log(data);

                    // Pastikan data yang diterima sesuai dengan yang diharapkan
                    if ((data.created_at != null) && (data.nilai_gas != null)) {
                        const date = new Date(data.created_at).getTime();
                        const value = data.nilai_gas;

                        const point = [date, value * 1]; // Misalnya, Anda mengalikan suhu dengan 10
                        const series = chartGas.series[0];
                        const shift = series.data.length > 20; // Shift if the series is longer than 20

                        // Add the point
                        chartGas.series[0].addPoint(point, true, shift);
                    } else {
                        console.error('Data format is incorrect', data);
                    }

                    // Call it again after one second
                    setTimeout(requestData, 5000);
                } else {
                    console.error('Network response was not ok', result.statusText);
                }
            } catch (error) {
                console.error('Fetch error:', error);
            }
        }

        // Mulai permintaan data saat halaman dimuat
        requestData();

        window.addEventListener('load', function() {
            chartGas = new Highcharts.Chart({
                chart: {
                    renderTo: 'monitoringGas',
                    defaultSeriesType: 'spline',
                    events: {
                        load: requestData
                    }
                },
                title: {
                    text: 'Gas & Waktu'
                },
                xAxis: {
                    type: 'datetime',
                    tickPixelInterval: 150,
                    maxZoom: 20 * 1000
                },
                yAxis: {
                    minPadding: 0.2,
                    maxPadding: 0.2,
                    title: {
                        text: 'Gas (ppm)',
                        margin: 80
                    }
                },
                series: [{
                    name: 'MQ5',
                    data: []
                }]
            });
        });
    </script>
@endpush

@push('scripts')
    <script>
        async function fetchFlameData() {
            try {
                const response = await fetch("{{ route('latest_flame') }}");
                if (response.ok) {
                    const data = await response.json();
                    updateFlameTable(data);
                } else {
                    console.error('Network response was not ok', response.statusText);
                }
            } catch (error) {
                console.error('Fetch error:', error);
            }
        }

        function updateFlameTable(data) {
            const tableBody = document.getElementById('flame-table-body');
            // Clear existing rows
            tableBody.innerHTML = '';

            // Insert new row
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${data.nilai_flame !== null ? data.nilai_flame : 'N/A'}</td>
                <td>${data.status}</td>
                <td>${data.created_at}</td>
            `;
            tableBody.appendChild(row);
        }

        // Fetch data every 3 seconds
        setInterval(fetchFlameData, 3000);

        // Initial fetch
        fetchFlameData();
    </script>
@endpush

