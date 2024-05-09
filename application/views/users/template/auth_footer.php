<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!-- Import Leaflet JavaScript -->
<!-- <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> -->
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="js/jquery-3.1.0.js"></script>
<script src="js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {
        console.log("Script is running!");
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>

<script>
    // Data UMKM dalam format JSON
    var umkmData = <?= $umkm_json ?>;
    console.log("umkmData", umkmData);

    var geojsonFeature = umkmData.map(x => ({
        type: "Feature",
        properties: {
            id: x.id,
            nama: x.nama_usaha,
            alamat: x.alamat_usaha,
            jenis: x.jenis_usaha,
            berdiri: x.tahun_berdiri,
        },
        geometry: {
            type: "Point",
            coordinates: [
                x.longtitude,
                x.latitude,
                // parseFloat(x.latitude),
                // parseFloat(x.longtitude)

            ]
        }
    }))

    // Inisialisasi peta Leaflet
    var map = L.map('map').setView([1.0797, 104.0137], 12);

    // Tambahkan tile layer untuk peta dasars
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Iterasi melalui setiap objek GeoJSON dan menambahkan marker untuk setiap titik
    geojsonFeature.forEach(function(feature) {
        var marker = L.marker(feature.geometry.coordinates.reverse()).addTo(map);
        var tooltipText = `<b>${feature.properties.nama}</b></br>Jenis Usaha : ${feature.properties.jenis}</br>Alamat : ${feature.properties.alamat}</br>Tahun Berdiri : ${feature.properties.berdiri}`;
        marker.bindPopup(tooltipText);
    });

    // var marker = L.marker([1.0797, 104.0137]).addTo(map);
</script>

<!-- data tables -->
<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        $('#datatable').DataTable();
    });
</script>

<!-- data donut chart kecamatan -->
<script>
    // Data UMKM dalam format JSON
    var datakecamatan = <?= $jumlahkecamatan ?>;
    var datatotal = datakecamatan.map(item => parseInt(item.totalkecamatan));

    var namakecamatan = datakecamatan.map(item => item.kecamatan);

    var options = {
        chart: {
            type: 'donut'
        },
        series: datatotal,
        labels: namakecamatan,
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '24px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 600,
                            color: 'red',
                            offsetY: -10,
                            formatter: function(val) {
                                return val
                            }
                        },
                        value: {
                            show: true,
                            fontSize: '24px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                            color: 'red',
                            offsetY: 16,
                            formatter: function(val) {
                                return val
                            }
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            color: 'red',
                            fontSize: '30px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 600,
                            formatter: function(w) {
                                // Mendapatkan total dari semua data
                                var total = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                return total;
                            }
                        }
                    }
                }
            }
        }

    }

    var chart = new ApexCharts(document.querySelector("#kecamatan"), options);

    chart.render();
</script>

<script>
    // Data UMKM dalam format JSON
    // Ambil data jenis usaha dari variabel yang sesuai
    var datajenis = <?= $datajenisusaha ?>;
    // Gunakan nama variabel yang sesuai untuk mengambil data kecamatan
    var datakecamatan = <?= $jumlahkecamatan ?>;
    // Proses data sesuai dengan kebutuhan
    var datatotal = datajenis.map(item => parseInt(item.totaljenis));
    var namajenis = datajenis.map(item => item.jenis_usaha);
    console.log("Data Array:", namajenis);

    var optionsjenis = {
        chart: {
            type: 'donut'
        },
        series: datatotal,
        labels: namajenis,
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        name: {
                            show: true,
                            fontSize: '24px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 600,
                            color: 'red',
                            offsetY: -10,
                            formatter: function(val) {
                                return val
                            }
                        },
                        value: {
                            show: true,
                            fontSize: '24px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                            color: 'red',
                            offsetY: 16,
                            formatter: function(val) {
                                return val
                            }
                        },
                        total: {
                            show: true,
                            label: 'Total',
                            color: 'red',
                            fontSize: '30px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 600,
                            formatter: function(w) {
                                // Mendapatkan total dari semua data
                                var total = w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                                return total;
                            }
                        }
                    }
                }
            }
        }

    }

    var chartjenis = new ApexCharts(document.querySelector("#jenisusaha"), optionsjenis);

    chartjenis.render();
</script>
</body>

</html>