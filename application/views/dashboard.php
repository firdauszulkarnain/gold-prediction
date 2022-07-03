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
            type: 'doughnut',
            data: {
                labels: [
                    <?php
                    if (count($status) > 0) {
                        foreach ($status as $data) {
                            echo "'" . $data->status . "',";
                        }
                    }

                    ?>
                ],
                datasets: [{
                    label: 'Jumlah Pesan',
                    backgroundColor: ['#ffcd56', '#ff6a56', '#36a2eb'],
                    data: [
                        <?php
                        if (count($status) > 0) {
                            foreach ($status as $data) {
                                echo $data->jumlah . ", ";
                            }
                        }

                        ?>
                    ]
                }]
            },
        });
    });
</script>