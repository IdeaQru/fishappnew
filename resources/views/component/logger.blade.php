<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">DATA LOGGER</div>
                <div class="card-body">

                    <form id="filterForm" action="{{ route('filter') }}" method="GET">
                        <div class="form-group">
                            <label for="month">Choose Month:</label>
                            <select name="month" id="month" class="form-control">
                                @foreach(range(1, 12) as $month)
                                <option value="{{ $month }}">{{ date("F", mktime(0, 0, 0, $month, 10)) }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="year">Choose Year:</label>
                            <select name="year" id="year" class="form-control">
                                @for($year = date('Y') - 10; $year <= date('Y'); $year++) <option value="{{ $year }}">{{
                                    $year }}</option>
                                    @endfor
                            </select>
                        </div>
                        <div id="summary" style="margin-top: 20px;">
                            <p>Total Lokasi Potensial: <span id="total-potensial">-</span></p>
                            <p>Total Lokasi Kurang Potensial: <span id="total-kurang-potensial">-</span></p>
                        </div>

                        <button type="submit" class="btn btn-primary">Show Data</button>
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
    event.preventDefault();

    const month = document.getElementById('month').value;
    const year = document.getElementById('year').value;
    const url = this.action; // Memastikan URL dari action form

    fetch(`${url}?month=${month}&year=${year}`)
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            document.getElementById('total-potensial').textContent = data.totalPotensial;
            document.getElementById('total-kurang-potensial').textContent = data.totalKurangPotensial;

            // Memperbarui link download dan menampilkan tombol
            const downloadLink = document.getElementById('downloadLink');
            downloadLink.href = `/download?month=${month}&year=${year}`; // Asumsikan Anda memiliki route untuk download
            document.getElementById('downloadContainer').style.display = 'block';
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});

// Event listener untuk tombol close
document.getElementById('closeButton').addEventListener('click', function() {
    document.getElementById('downloadContainer').style.display = 'none';
});

</script>
