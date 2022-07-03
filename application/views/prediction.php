<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
    </div>
</section>

<section class="content mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-warning font-weight-bolder text-center my-font" style="font-size: 20px !important;">
                    Masukan Data Emas Yang Ingin Diprediksi
                </div>
                <div class="card-body px-3 py-2">
                    <!-- <form action=""> -->
                    <div class="row mt-5 d-flex justify-content-center">
                        <div class="col-lg-10">
                            <div class="form-group row">
                                <label for="data_h2" class="col-sm-4 col-form-label">Masukan Data H-2</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control uang" id="data_h2" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="data_h1" class="col-sm-4 col-form-label">Masukan Data H-1</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control uang" id="data_h1" autocomplete="off">
                                </div>
                            </div>
                            <button class="btn btn-warning font-weight-bolder px-5 mt-1 rounded-pill mb-4 float-right" type="button" id="prediksi">Prediksi</button>
                        </div>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card pb-3">
                <div class="card-header bg-warning font-weight-bolder text-center my-font" style="font-size: 20px !important;">
                    Prediksi Harga Emas
                </div>
                <div class="card-body px-4">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="x1">X1</label>
                            <input type="email" class="form-control" id="x1" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="x2">X2</label>
                            <input type="email" class="form-control" id="x2" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="hasil">Prediksi Harga Emas</label>
                        <textarea class="form-control" id="hasil" rows="1" readonly style="font-size: 20px;"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    $(document).on("click", "#prediksi", function() {
        var h2 = $("#data_h2").val();
        var h1 = $("#data_h1").val();
        var x1 = parseInt(h2);
        var x2 = parseInt(h1);
        var prediksi = -67.79294168 + (0.11552646 * x1) + (0.991014375 * x2);

        $("#x1").val(x1);
        $("#x2").val(x2);
        $("#hasil").html(prediksi);
    });
</script>