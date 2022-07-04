<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
    </div>
</section>

<section class="content mt-5">
    <div class="row d-fle justify-content-center">
        <div class="col-lg-10">
            <h1 class="text-center my-font">Selamat Datang di Sistem Prediksi <br> Harga Emas</h1>
            <div class="card">
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',

            data: {
                labels: [
                    <?php
                    if (count($status) > 0) {
                        foreach ($status as $data) {
                            echo "'" . $data->tahun . "',";
                        }
                    }

                    ?>
                ],
                datasets: [{
                    label: ['Harga Aktual'],
                    fill: false,
                    borderColor: '#ffcd56',
                    data: [
                        <?php
                        if (count($status) > 0) {
                            foreach ($status as $data) {
                                echo $data->harga_aktual . ", ";
                            }
                        }

                        ?>
                    ]
                }, {
                    label: ['Harga Prediksi'],
                    fill: false,
                    borderColor: 'blue',
                    data: [
                        <?php
                        if (count($prediksi) > 0) {
                            for ($i = 0; $i < count($prediksi); $i++) {
                                echo $prediksi[$i] . ", ";
                            }
                        }

                        ?>
                    ]
                }, ]
            },
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            min: 5000, // minimum value
                            max: 50000, // maximum value,
                            stepSize: 5000
                        }
                    }]
                }
            }

        });
    });
</script>