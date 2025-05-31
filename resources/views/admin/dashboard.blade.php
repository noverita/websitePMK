<!DOCTYPE html>
@extends('layouts.app')

@section('title', 'Dashboard')
@section('css')

@endsection
@section('content')
    {{-- <h2 class="text-center font-weight-bold">Dashboard Kesiapan Kerja</h2><br> --}}

    <div class="row">
        <!-- Welcome Card -->
        <div class="col-md-6">
            <div class="text-center card shadow text-white mb-4 p-3 navy">
                <h6 class="greetings">Selamat Datang, {{ Auth::user()->name }} <i class="fas fa-smile-wink"></i></h6>
                <p class="text-center">
                    <span class="badge badge-success">{{ \Carbon\Carbon::today()->format('l, d M Y') }}</span><br>
                </p>
                <a href="{{ route('laporan.personel') }}" class="btn bg-white btn-sm"><strong>Lihat Laporan</strong></a>
            </div>
        </div>

        <!-- Statistics -->
        <div class="col-md-6">
            <div class="text-center card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0">Statistik</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <strong>{{ $laporanCount }}</strong><br>
                            <i class="fas fa-folder-plus text-gray-400"></i> Laporan Terkumpul
                        </div>

                        @foreach ($statistik as $data)
                            <div class="col-md-3">
                                <strong>{{ $data['count'] }}</strong><br>
                                <i class="fas {{ $data['icon'] }} text-gray-400"></i> {{ $data['label'] }}
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Health & Reports -->
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card shadow mb-4 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-red text-uppercase mb-1 text-center">
                                <h6><strong> Kesehatan</strong></h6>
                            </div>
                            <label for="yearSelector">Pilih Tahun:</label>
                            <select class="form-control" id="yearSelector" style="width: 30%">
                                @foreach (array_keys($kesehatanStats) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>

                            <canvas id="healthChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow mb-4 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-red text-uppercase mb-1">
                                Laporan Tahunan</div>
                            <div class="chart-area">
                                <canvas id="chartReportYear"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Employee Shift & Availability -->
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 text-center">Shift Pegawai</h6>
                </div>
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <select id="shiftSelect" class="form-control mb-4 w-auto">
                                <option value="all" selected>Semua</option>
                                <option value="pagi">Pagi</option>
                                <option value="siang">Siang</option>
                                <option value="malam">Malam</option>
                            </select>


                            <div id="userList">
                                @forelse ($shiftAll as $user)
                                    <ul>
                                        <i class="fas fa-chevron-circle-right text-gray-300"></i>
                                        <a>{{ $user->name }}</a>
                                        <span class="badge
                                            @if($user->tingkat_kebugaran == 'Excellent') badge-success
                                            @elseif($user->tingkat_kebugaran == 'Kurang fit') badge-danger
                                            @else badge-warning
                                            @endif">
                                            {{ $user->tingkat_kebugaran }}
                                        </span>
                                    </ul>
                                    <hr>
                                @empty
                                    <p>Tidak ada data kuisioner hari ini.</p>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow mb-4 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-red text-uppercase mb-1">Laporan Fitness Pegawai</div>
                            <label for="yearSelect">Pilih Tahun:</label>
                            <select id="yearFilter" class="form-control w-auto">
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>

                            <canvas id="fitnessStatusChart" height="100"></canvas>

                        </div>
                        {{-- <div class="col-auto">
                            <i class="fas fa-dumbbell fa-2x text-gray-300"></i>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('js')
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        //chart kesehatan
        const kesehatanData = {!! json_encode($kesehatanStats) !!};
        const backgroundColors = {
            'Sehat': '#28a745',
            'Tidak Sehat': '#dc3545'
        };

        let chart;
        function renderChart(year) {
            const stats = kesehatanData[year];
            const labels = stats.map(item => item.hasil_kesehatan);
            const data = stats.map(item => item.total);
            const colors = labels.map(label => backgroundColors[label] || '#999');

            const ctx = document.getElementById('healthChart').getContext('2d');

            if (chart) chart.destroy();

            chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: colors
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        title: {
                            display: true,
                            text: 'Hasil Kesehatan Tahun ' + year
                        }
                    }
                }
            });
        }

        // Initial render
        const defaultYear = Object.keys(kesehatanData)[0];
        renderChart(defaultYear);

        // Dropdown listener
        document.getElementById('yearSelector').addEventListener('change', function() {
            renderChart(this.value);
        });
        //chart laporan tahunan
        document.addEventListener('DOMContentLoaded', function () {
            fetch("{{ route('getReportYear') }}")
            .then(response => response.json())
            .then(result => {
                const ctx = document.getElementById('chartReportYear').getContext('2d');

                const data = {
                labels: result.labels,
                datasets: [{
                    label: 'Total Laporan per Tahun',
                    data: result.data,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    tension: 0.1,
                    pointBorderWidth: 2,
                    pointHoverRadius: 6,
                    pointHoverBackgroundColor: 'rgb(75, 192, 192)',
                    pointHoverBorderColor: 'rgb(255, 255, 255)',
                }]
                };

                const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                    legend: {
                        display: true,
                        labels: {
                        color: '#333',
                        font: {
                            size: 14
                        }
                        }
                    },
                    tooltip: {
                        callbacks: {
                        label: function(context) {
                            return 'Total: ' + context.formattedValue;
                        }
                        }
                    }
                    },
                    scales: {
                    x: {
                        title: {
                        display: true,
                        text: 'Tahun'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Laporan'
                        },
                        ticks: {
                            stepSize: 2, // ← misal kelipatan 5
                            callback: function(value) {
                            return Number.isInteger(value) ? value : null;
                            }
                        }
                        }
                    }
                },
                };

                new Chart(ctx, config);
            });
        });
        //shift filetr
        document.getElementById("shiftSelect").addEventListener("change", function () {
        const selectedShift = this.value;

        fetch(`/filter-shift/data?shift=${selectedShift}`)
            .then(response => response.json())
            .then(users => {
                const userList = document.getElementById("userList");
                userList.innerHTML = "";

                if (users.length === 0) {
                    userList.innerHTML = "<p>Tidak ada user untuk shift ini.</p>";
                    return;
                }

                users.forEach(user => {
                    const badgeClass =
                        user.tingkat_kebugaran === "Excellent" ? "badge-success" :
                        user.tingkat_kebugaran === "Kurang fit" ? "badge-danger" :
                        "badge-warning";

                    const userItem = `
                        <ul>
                            <i class="fas fa-chevron-circle-right text-gray-300"></i>
                            <a>${user.name}</a>
                            <span class="badge ${badgeClass}">
                                ${user.tingkat_kebugaran}
                            </span>
                        </ul>
                        <hr>
                    `;
                    userList.innerHTML += userItem;
                });
            });
        });
        //chart fitness
        document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('fitnessStatusChart').getContext('2d');
        let chart;

        function fetchData(year) {
            fetch(`/api/report-fitness-status?tahun=${year}`)
            .then(response => response.json())
            .then(result => {
                const config = {
                    type: 'line',
                    data: {
                        labels: result.labels, // bulan
                        datasets: [
                            {
                                label: 'Excellent',
                                data: result.excellent,
                                borderColor: 'rgba(54, 162, 235, 1)',
                                backgroundColor: 'rgba(54, 162, 235, 0.1)',
                                tension: 0.3
                            },
                            {
                                label: 'Good',
                                data: result.good,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                backgroundColor: 'rgba(75, 192, 192, 0.1)',
                                tension: 0.3
                            },
                            {
                                label: 'Kurang Fit',
                                data: result.kurang_fit,
                                borderColor: 'rgba(255, 99, 132, 1)',
                                backgroundColor: 'rgba(255, 99, 132, 0.1)',
                                tension: 0.3
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Status Kebugaran per Bulan'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 5,
                                    precision: 0
                                },
                                title: {
                                    display: true,
                                    text: 'Jumlah'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Bulan'
                                }
                            }
                        }
                    }
                };

                if (chart) {
                    chart.destroy();
                }
                chart = new Chart(ctx, config);
            });
        }

        const yearSelect = document.getElementById('yearFilter');
        fetchData(yearSelect.value); // initial load

        yearSelect.addEventListener('change', function () {
            fetchData(this.value);
        });
    });
    </script>
@endsection
