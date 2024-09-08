<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Rekap Data</div>
                <div class="card-body">

                    <form id="filterForm" action="{{ route('filter') }}" method="GET">
                        <div class="form-group">

                            <select name="month" id="month" class="form-control">
                                    <option value="">Pilih Bulan</option> <!-- Opsi default tidak valid -->
                                @foreach(range(1, 12) as $month)
                                <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 10)) }}</option>
                                @endforeach
                            </select>
                              <div id="monthError" class="error-message" style="color: red; display: none;">Mohon pilih bulan.</div>
                        </div>


                        <div class="form-group">
                            <label for="year">Pilih Tahun:</label>
                            <select name="year" id="year" class="form-control">
                                <option value="">Pilih Tahun</option> <!-- Opsi default tidak valid -->
                                @for($year = date('Y') - 1; $year <= date('Y'); $year++) <option value="{{ $year }}">{{$year }}</option>
                                    @endfor
                            </select>
                              <div id="yearError" class="error-message" style="color: red; display: none;">Mohon pilih tahun.</div>
                        </div>
                        <div id="summary" style="margin-top: 20px;">
                        <p>Total Lokasi Potensial: <span id="total-potensial">-</span></p>
                        <p>Total Lokasi Prediksi Berpotensi: <span id="total-prediksi-berpotensi">-</span></p>
                            <p>Total Lokasi Potensial Sedang: <span id="total-kurang-potensial">-</span></p>
                        </div>

                        <button type="submit" class="btn btn-primary">Tampilkan Data</button>
                    </form>

                    <!-- Container untuk tombol download dan close -->
                    <div id="downloadContainer" style="display: none; position: absolute; right: 10px; bottom: 10px;">
                        <a href="#" id="downloadLink" class="btn btn-success">Download Data</a>
                        <button type="button" id="closeButton" class="btn btn-danger"
                            style="margin-left: 10px;">×</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

document.getElementById('filterForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form dari melakukan submit standar yang menyebabkan refresh halaman

    let valid = true;
    const month = document.getElementById('month').value;
    const year = document.getElementById('year').value;
    const monthError = document.getElementById('monthError');
    const yearError = document.getElementById('yearError');

    // Validasi pilihan bulan dan tahun
    if (month === "") {
        monthError.style.display = 'block';
        valid = false;
    } else {
        monthError.style.display = 'none';
    }

    if (year === "") {
        yearError.style.display = 'block';
        valid = false;
    } else {
        yearError.style.display = 'none';
    }

    // Jika validasi berhasil, lanjutkan dengan fetch request
    if (valid) {
        const url = this.action; // Mengambil URL dari atribut action form

        fetch(`${url}?month=${month}&year=${year}`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                document.getElementById('total-potensial').textContent = data.totalPotensial;
                document.getElementById('total-kurang-potensial').textContent = data.totalKurangPotensial;
                document.getElementById('total-prediksi-berpotensi').textContent = data.totalPrediksiBerpotensi;

                console.log(data);
                // Memperbarui link download dan menampilkan tombol
                const downloadLink = document.getElementById('downloadLink');
                downloadLink.href = `/download?month=${month}&year=${year}`;
                document.getElementById('downloadContainer').style.display = 'block';
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
});


// Event listener untuk tombol close
document.getElementById('closeButton').addEventListener('click', function() {
    document.getElementById('downloadContainer').style.display = 'none';
});


// Event listener untuk tombol close
document.getElementById('closeButton').addEventListener('click', function() {
    document.getElementById('downloadContainer').style.display = 'none';
});

</script>
