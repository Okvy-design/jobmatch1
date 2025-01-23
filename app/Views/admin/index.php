<?= $this->extend('admin/template/index'); ?>

<?= $this->section('content'); ?>
<div class="pcoded-wrapper">
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Dashboard Admin</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <!-- Box Greeting -->
                        <div class="col-md-12">
                            <div class="card blue-box">
                                <div class="card-body text-center">
                                    <h3 id="greetingText"></h3>
                                    <p>Semangat beraktivitas dan bekerja. Sehat selalu yaa!</p>
                                </div>
                            </div>
                        </div>

                    <!-- Box date n time -->
                    <div class="col-md-4">
                    <div class="card blue-box">
                        <div class="card-header">
                            <h5>Tanggal & Waktu</h5>
                        </div>
                        <div class="card-body text-center">
                            <h4 id="currentDate"></h4>
                            <p id="currentTime"></p>
                        </div>
                    </div>
                </div>

                <script>
                    function updateDateTime() {
                        var now = new Date();
                        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                        document.getElementById('currentDate').innerText = now.toLocaleDateString('id-ID', options);
                        document.getElementById('currentTime').innerText = now.toLocaleTimeString('id-ID');
                    }
                    setInterval(updateDateTime, 1000);
                    updateDateTime();
                </script>
                        <!-- Box Freelance -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Total Freelancers</h5>
                                </div>
                                <div class="card-body">
                                    <h3><?= $totalFreelancers; ?></h3>
                                </div>
                            </div>
                        </div>

                        <!-- Box Company -->
                        <div class="col-md-4">
                        <div class="card blue-box">
                                <div class="card-header">
                                    <h5>Total Companies</h5>
                                </div>
                                <div class="card-body">
                                    <h3><?= $totalCompanies; ?></h3>
                                </div>
                            </div>
                        </div>

                          <!-- Box Weather -->
                          <div class="col-md-4">
                          <div class="card blue-box">
                                <div class="card-header">
                                    <h5>Cuaca Saat Ini</h5>
                                </div>
                                <div class="card-body text-center">
                                    <h4 id="weatherLocation"></h4>
                                    <p id="weatherDescription"></p>
                                    <p id="weatherTemperature"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                     

                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<!-- CSS untuk box biru -->
<style>
    .blue-box {
        background-color: #e7f3ff;
        border: 1px solid #b3daff;
        color: #0056b3;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .blue-box h5 {
        font-weight: bold;
    }
    .blue-box h3 {
        font-size: 1.5rem;
        font-weight: bold;
    }
</style>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart for Freelancers vs Companies
    var ctx = document.getElementById('userChart').getContext('2d');
    var userChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Freelancers', 'Companies'],
            datasets: [{
                label: 'Users Registered',
                data: [<?= $totalFreelancers; ?>, <?= $totalCompanies; ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                borderColor: ['#4e73df', '#1cc88a'],
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

    // Fetch Weather Data
    async function fetchWeather() {
        const apiKey = 'c90cee445ca20b789bf6498d0d935832'; // Ganti dengan API key Anda
        const city = 'Jakarta'; // Ganti dengan kota yang diinginkan
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&lang=id&appid=${apiKey}`;

        try {
            const response = await fetch(url);
            const data = await response.json();

            // Update elemen HTML dengan data cuaca
            document.getElementById('weatherLocation').innerText = `${data.name}, ${data.sys.country}`;
            document.getElementById('weatherDescription').innerText = data.weather[0].description;
            document.getElementById('weatherTemperature').innerText = `${data.main.temp}°C`;
        } catch (error) {
            console.error('Gagal mengambil data cuaca:', error);
        }
    }
    fetchWeather();

    function updateGreeting() {
        const now = new Date();
        const hour = now.getHours();
        let greeting = "Selamat Malam, Admin";

        if (hour >= 5 && hour < 12) {
            greeting = "Selamat Pagi, Admin";
        } else if (hour >= 12 && hour < 17) {
            greeting = "Selamat Siang, Admin";
        } else if (hour >= 17 && hour < 21) {
            greeting = "Selamat Sore, Admin";
        }

        document.getElementById('greetingText').innerText = greeting;
    }
    updateGreeting(); // Perbarui teks sapaan


    
</script>
