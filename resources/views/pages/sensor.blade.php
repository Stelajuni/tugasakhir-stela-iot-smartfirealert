@extends('layouts.dashboard')

@section('content')
    <div class="row my-2">
        <div class="col-sm-12 col-md-6">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Tabel Sensor Gas MQ-5</h4>
                    <div id="monitoringGas"></div>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table id="gas-table" class="table table-striped table-bordered mt-4" role="grid"
                            aria-describedby="user-list-page-info">
                            <thead>
                                <tr>
                                    <th>Nilai</th>
                                    <th>Keterangan</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody id="gas-table-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6">
            <div class="card iq-mb-3">
                <div class="card-body">
                    <h4 class="card-title">Tabel Sensor Kebakaran</h4>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function formatDate(dateString) {
        if (!dateString) return '-';
        const date = new Date(dateString);
        if (isNaN(date.getTime())) return '-';

        return date.toLocaleString('id-ID', {
            day: '2-digit', month: 'short', year: 'numeric',
            hour: '2-digit', minute: '2-digit', second: '2-digit',
            hour12: false
        }).replace(/\./g, ':');
    }

    async function fetchSensorData() {
        try {
            const response = await fetch("{{ route('latest_sensors') }}");
            if (response.ok) {
                const data = await response.json();
                updateFlameTable(data.flame);
                updateGasTable(data.mq5);
            } else {
                console.error('Error fetching sensor data:', response.statusText);
            }
        } catch (error) {
            console.error('Fetch error:', error);
        }
    }

    function updateFlameTable(data) {
        const tableBody = document.getElementById('flame-table-body');
        tableBody.innerHTML = `
            <tr>
                <td>${data.nilai !== null ? data.nilai : 'N/A'}</td>
                <td>${data.keterangan ?? 'Tidak diketahui'}</td>
                <td>${formatDate(data.created_at)}</td>
            </tr>
        `;
    }

    function updateGasTable(data) {
        const tableBody = document.getElementById('gas-table-body');
        tableBody.innerHTML = `
            <tr>
                <td>${data.nilai !== null ? data.nilai : 'N/A'}</td>
                <td>${data.keterangan ?? 'Tidak diketahui'}</td>
                <td>${formatDate(data.created_at)}</td>
            </tr>
        `;
    }

    setInterval(fetchSensorData, 3000);
    fetchSensorData();
</script>
@endpush

{{-- @push('scripts')
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

        function formatDate(dateString) {
            const options = {
                day: '2-digit', month: 'short', year: 'numeric',
                hour: '2-digit', minute: '2-digit', second: '2-digit',
                hour12: false
            };
            return new Date(dateString).toLocaleString('id-ID', options).replace(/\./g, ':');
        }

        function updateFlameTable(data) {
            const tableBody = document.getElementById('flame-table-body');
            // Clear existing rows
            tableBody.innerHTML = '';

            // Format created_at
            const formattedDate = formatDate(data.created_at);

            // Insert new row
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${data.nilai_flame !== null ? data.nilai_flame : 'N/A'}</td>
                <td>${data.status}</td>
                <td>${formattedDate}</td>
            `;
            tableBody.appendChild(row);
        }

        // Fetch data every 3 seconds
        setInterval(fetchFlameData, 3000);

        // Initial fetch
        fetchFlameData();
    </script>
@endpush


@push('scripts')
    <script>
        async function fetchGasData() {
            try {
                const response = await fetch("{{ route('latest_mq5') }}");
                if (response.ok) {
                    const data = await response.json();
                    updateGasTable(data);
                } else {
                    console.error('Network response was not ok', response.statusText);
                }
            } catch (error) {
                console.error('Fetch error:', error);
            }
        }

        function formatDate(dateString) {
            const options = {
                day: '2-digit', month: 'short', year: 'numeric',
                hour: '2-digit', minute: '2-digit', second: '2-digit',
                hour12: false
            };
            return new Date(dateString).toLocaleString('id-ID', options).replace(/\./g, ':');
        }

        function updateGasTable(data) {
            const tableBody = document.getElementById('gas-table-body');
            // Clear existing rows
            tableBody.innerHTML = '';

            // Format created_at
            const formattedDate = formatDate(data.created_at);

            // Insert new row
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${data.nilai_gas !== null ? data.nilai_gas : 'N/A'}</td>
                <td>${data.status}</td>
                <td>${formattedDate}</td>
            `;
            tableBody.appendChild(row);
        }

        // Fetch data every 3 seconds
        setInterval(fetchGasData, 3000);

        // Initial fetch
        fetchGasData();
    </script>
@endpush --}}
