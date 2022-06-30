<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <button type="button" class="btn-sm btn-warning px-4 py-2 border-0" data-toggle="modal" data-target="#tambahModal">
                <i class="fas fa-fw fa-plus"></i> Tambah Data Harga Emas
            </button>
        </div>
    </div>
</section>

<section class="content">
    <div class="row d-fle justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap display" id="table" width="100%">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th>Tanggal</th>
                                <th>Harga Emas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ongkir Modal -->
<div class="modal fade mt-5" id="updateModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Data Harga Emas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>ongkir/update_ongkir" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_gold" id="id_gold" value="">
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="text" class="form-control" id="date" name="date" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Emas</label>
                        <input type="text" class="form-control" id="price" name="price" autocomplete="off" value="" required oninvalid="this.setCustomValidity('Harga Emas Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning font-weight-bolder btn-sm btn px-4 py-2">Simpan Data Ongkir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah Kategori Modal-->
<div class="modal fade" id="tambahModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Harga Emas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>admin/tambah_emas" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" name="date" autocomplete="off" required oninvalid="this.setCustomValidity('Tangal Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga Emas</label>
                        <input type="text" class="form-control" id="price" name="price" autocomplete="off" required oninvalid="this.setCustomValidity('Harga Emas Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning font-weight-bolder">Simpan Data Harga</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('admin/get_data_gold') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "targets": [0, 1, 2],
                "orderable": false,
            }, ],

        });

        $(document).on("click", ".modal_update", function() {
            var id = $(this).data('id');
            var date = $(this).data('date')
            var price = $(this).data('price')
            $("#updateModal .modal-body #id_gold").val(id);
            $("#updateModal .modal-body #date").val(date);
            $("#updateModal .modal-body #price").val(price);
        });

    });
</script>