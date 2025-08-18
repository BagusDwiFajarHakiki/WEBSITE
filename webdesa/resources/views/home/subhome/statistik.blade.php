@php
    use App\Models\Setting;
    use App\Models\StatistikDesa;
    
    $setting = Setting::first();
    $logo = $setting ? $setting->logo_path : null;
    $statistik = StatistikDesa::first();
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @if($logo)
        <link rel="icon" type="image/png" href="{{ asset('storage/logos/' . $logo) }}">
        <meta property="og:image" content="{{ asset('storage/logos/' . $logo) }}">
    @endif
    <title>Desa Pasiraman - Statistik Desa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f9ff;
        }
        
        .stat-card {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 600;
            color: #1e40af;
        }
        
        .stat-label {
            color: #4b5563;
            font-size: 0.9rem;
        }
        
        .progress-bar {
            height: 10px;
            border-radius: 5px;
            background: #e5e7eb;
            overflow: hidden;
        }
        
        .progress-fill {
            height: 100%;
            border-radius: 5px;
            background: linear-gradient(90deg, #3b82f6, #1e40af);
        }
        
        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #1e40af);
            border-radius: 2px;
        }
        
        .map-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            height: 300px;
            background: #e0f2fe;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .chart-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        /* Custom scrollbar untuk carousel */
        .carousel-scrollbar::-webkit-scrollbar {
            height: 6px;
        }
        .carousel-scrollbar::-webkit-scrollbar-thumb {
            background-color: #22c55e;
            border-radius: 10px;
        }
        .carousel-scrollbar {
            scroll-behavior: smooth;
        }

        /* Styles untuk mobile menu */
        @media (max-width: 767px) {
            #mobile-menu {
                position: fixed;
                top: 0;
                right: -100%;
                bottom: 0;
                width: 60%;
                max-width: 320px;
                height: 100%;
                overflow-y: auto;
                z-index: 40;
                transition: right 0.3s ease-in-out;
                background-color: white;
                display: flex;
                flex-direction: column;
            }

            #mobile-menu.open {
                right: 0;
            }

            #mobile-menu-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 39;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;
            }

            #mobile-menu-overlay.open {
                opacity: 1;
                visibility: visible;
            }
            
            .stat-value {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    @include('home.header', ['logo' => $logo])

    <main class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-3xl md:text-4xl font-bold text-indigo-900 mb-4">DATA STATISTIK DESA</h1>
                <div class="w-24 h-1 bg-indigo-600 mx-auto rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    Informasi lengkap tentang statistik kependudukan dan wilayah Desa Pasiraman
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="stat-card bg-white p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-blue-100 text-blue-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-value">{{ $statistik->luas_wilayah ?? '0' }} Ha</div>
                            <div class="stat-label">Luas Wilayah</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card bg-white p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-green-100 text-green-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-value">{{ number_format($statistik->jumlah_penduduk ?? 0, 0, ',', '.') }}</div>
                            <div class="stat-label">Jumlah Penduduk</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card bg-white p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-purple-100 text-purple-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-value">{{ $statistik->jumlah_dusun ?? '0' }}</div>
                            <div class="stat-label">Jumlah Dusun</div>
                        </div>
                    </div>
                </div>
                
                <div class="stat-card bg-white p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-lg bg-amber-100 text-amber-600 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-value">{{ $statistik->jumlah_rt ?? '0' }} RT / {{ $statistik->jumlah_rw ?? '0' }} RW</div>
                            <div class="stat-label">Pembagian Wilayah</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-12">
                <!-- Left Column - Detailed Stats -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <h2 class="section-title text-xl font-bold text-gray-800">Detail Statistik Desa</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <h3 class="font-medium text-gray-700 mb-2">Luas Wilayah</h3>
                                <div class="flex items-center">
                                    <div class="w-3/4">
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 100%"></div>
                                        </div>
                                    </div>
                                    <div class="w-1/4 text-right font-semibold text-blue-600">
                                        {{ $statistik->luas_wilayah ?? '0' }} Ha
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="font-medium text-gray-700 mb-2">Jumlah Penduduk</h3>
                                <div class="flex items-center">
                                    <div class="w-3/4">
                                        <div class="progress-bar">
                                            <div class="progress-fill" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div class="w-1/4 text-right font-semibold text-green-600">
                                        {{ number_format($statistik->jumlah_penduduk ?? 0, 0, ',', '.') }} Jiwa
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="font-medium text-gray-700 mb-2">Pembagian Wilayah</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="bg-blue-50 p-4 rounded-lg">
                                        <div class="text-3xl font-bold text-blue-700">{{ $statistik->jumlah_dusun ?? '0' }}</div>
                                        <div class="text-gray-600">Dusun</div>
                                    </div>
                                    <div class="bg-indigo-50 p-4 rounded-lg">
                                        <div class="text-3xl font-bold text-indigo-700">{{ $statistik->jumlah_rt ?? '0' }}</div>
                                        <div class="text-gray-600">RT</div>
                                    </div>
                                    <div class="bg-purple-50 p-4 rounded-lg">
                                        <div class="text-3xl font-bold text-purple-700">{{ $statistik->jumlah_rw ?? '0' }}</div>
                                        <div class="text-gray-600">RW</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="font-medium text-gray-700 mb-2">Mata Pencaharian Utama</h3>
                                <div class="bg-amber-50 p-4 rounded-lg border-l-4 border-amber-500">
                                    <p class="text-gray-800">{{ $statistik->mata_pencaharian_utama ?? 'Belum ada data' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Population Chart -->
                    <div class="chart-container">
                        <h2 class="section-title text-xl font-bold text-gray-800">Grafik Penduduk</h2>
                        <canvas id="populationChart" height="250"></canvas>
                    </div>
                </div>
                
                <!-- Right Column - Map and Additional Info -->
                <div>
                    <div class="map-container mb-8">
                        <div class="text-center">
                            <svg class="w-16 h-16 text-blue-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            <h3 class="text-xl font-semibold text-blue-800 mb-2">Peta Wilayah Desa</h3>
                            <p class="text-blue-600 max-w-xs mx-auto">Desa Pasiraman memiliki luas wilayah {{ $statistik->luas_wilayah ?? '0' }} Ha</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                        <h2 class="section-title text-xl font-bold text-gray-800">Informasi Tambahan</h2>
                        
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-medium text-gray-800">Wilayah Strategis</h3>
                                    <p class="text-gray-600 mt-1">Desa terletak di daerah yang strategis dengan akses transportasi yang mudah</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-medium text-gray-800">Potensi Alam</h3>
                                    <p class="text-gray-600 mt-1">Memiliki potensi alam yang melimpah untuk pengembangan agrowisata</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-medium text-gray-800">SDM Berkualitas</h3>
                                    <p class="text-gray-600 mt-1">Mayoritas penduduk memiliki semangat wirausaha yang tinggi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl shadow-md p-6 text-white">
                        <h3 class="text-xl font-bold mb-3">Pertumbuhan Penduduk</h3>
                        <p class="mb-4">Dalam 5 tahun terakhir, penduduk Desa Pasiraman tumbuh sebesar 12% per tahun</p>
                        <div class="flex items-center">
                            <div class="text-3xl font-bold mr-3">+12%</div>
                            <div class="text-sm bg-white bg-opacity-20 px-3 py-1 rounded-full">Pertumbuhan Tahunan</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer Note -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <p class="text-gray-600">
                    <span class="font-semibold">Update Terakhir:</span> 
                    {{ $statistik ? $statistik->updated_at->format('d F Y') : 'Belum ada data' }}
                </p>
                <p class="text-gray-500 text-sm mt-2">
                    Data statistik ini diperbarui secara berkala untuk memastikan akurasi informasi
                </p>
            </div>
        </div>
    </main>

    @include('home.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Population Chart
            const ctx = document.getElementById('populationChart').getContext('2d');
            const populationChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['2018', '2019', '2020', '2021', '2022', '2023'],
                    datasets: [{
                        label: 'Jumlah Penduduk',
                        data: [3200, 3450, 3620, 3780, 3920, 4150],
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(59, 130, 246, 0.7)',
                            'rgba(30, 64, 175, 0.9)'
                        ],
                        borderColor: [
                            'rgba(59, 130, 246, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(59, 130, 246, 1)',
                            'rgba(30, 64, 175, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Perkembangan Jumlah Penduduk (2018-2023)',
                            font: {
                                size: 16
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>