<section class="content-header">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
            <a class="btn btn-sm btn-warning font-weight-bolder px-5 py-2" href="<?= base_url() ?>emas/cetak"><i class="fas fa-fw fa-file-alt"></i> Cetak </a>
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

<script type="text/javascript">
    var table;
    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('emas/get_data_gold') ?>",
                "type": "POST"
            },


            "columnDefs": [{
                "targets": [0, 1, 2],
                "orderable": false,
            }, ],

        });

    });
</script>