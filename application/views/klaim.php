<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Klaim per LOB</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-5 mb-3">Data Klaim per LOB</h2>
        <hr>
        <form method="GET" action="<?= base_url('index.php/Klaim'); ?>" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lob">Filter by LOB</label>
                        <input type="text" name="lob" id="lob" class="form-control" placeholder="Enter LOB" value="<?= isset($selected_lob) ? $selected_lob : ''; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="periode">Filter by Periode</label>
                        <input type="date" name="periode" id="periode" class="form-control" placeholder="Enter Periode" value="<?= isset($selected_periode) ? $selected_periode : ''; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                    <button id="kirimKlaim" class="btn btn-success mt-4">Kirim Data ke penampungan</button>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>LOB</th>
                        <th>Penyebab Klaim</th>
                        <th>Jumlah Nasabah</th>
                        <th>Beban Klaim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($grouped_klaim)): ?>
                        <?php foreach ($grouped_klaim as $lob => $klaim_data): ?>
                            <?php foreach ($klaim_data['details'] as $row): ?>
                                <tr>
                                    <td><?= $row->lob; ?></td>
                                    <td><?= $row->penyebab_klaim; ?></td>
                                    <td><?= $row->total_peserta; ?></td>
                                    <td><?= number_format($row->total_beban, 2, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="font-weight-bold">
                                <td colspan="2">Subtotal <?= $lob; ?></td>
                                <td><?= $klaim_data['total_peserta']; ?></td>
                                <td><?= number_format($klaim_data['total_beban'], 2, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="font-weight-bold table-primary">
                            <td colspan="2">Total</td>
                            <td><?= $total_peserta_semua_lob; ?></td>
                            <td><?= number_format($total_beban_semua_lob, 2, ',', '.'); ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No data available for the selected filter</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div id="responseMessage" class="mt-3"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kirimKlaim').on('click', function(e) {
                e.preventDefault(); // Prevent the default form submission

                $.ajax({
                    url: "<?= base_url('index.php/Klaim/send_klaim') ?>",
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            swal("Success!", response.message, "success");
                        } else {
                            swal("Error!", response.message, "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        swal("Error!", "Terjadi kesalahan saat mengirim data!", "error");
                    }
                });
            });
        });
    </script>
</body>

</html>