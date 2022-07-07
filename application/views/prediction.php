<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        </div>
    </div>
</section>

<section class="content mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header bg-warning font-weight-bolder text-center my-font" style="font-size: 20px !important;">
                    Masukan Data Emas Yang Ingin Diprediksi
                </div>
                <div class="card-body px-3 py-2">
                    <form action="" method="POST">
                        <div class="row mt-5 d-flex justify-content-center">
                            <div class="col-lg-10">
                                <div class="form-group row">
                                    <label for="data_h2" class="col-sm-4 col-form-label">Masukan Data H-2</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control uang" id="data_h2" name="x1" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="data_h1" class="col-sm-4 col-form-label">Masukan Data H-1</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control uang" id="data_h1" name="x2" autocomplete="off">
                                    </div>
                                </div>
                                <button class="btn btn-warning font-weight-bolder px-5 mt-1 rounded-pill mb-4 float-right" type="sumbit" id="prediksi">Prediksi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php if ($prediction != NULL) : ?>
                <div class="card">
                    <div class="card-body p-5">
                        <a class="btn btn-sm btn-warning font-weight-bolder px-5 py-2 mb-3" href="<?= base_url() ?>prediction/cetak"><i class="fas fa-fw fa-file-alt"></i> Cetak </a>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <?php for ($i = 0; $i < count($prediction); $i++) : ?>
                                    <tr>
                                        <th width="40%">Prediksi Hari <?= $i + 1 ?></th>
                                        <td><?= $prediction[$i] ?></td>
                                    </tr>
                                <?php endfor ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
</section>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>