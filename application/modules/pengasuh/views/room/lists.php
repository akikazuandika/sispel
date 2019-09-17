<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Kamar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Kamar</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" scope="col">Kode</th>
                                    <th class="text-center" scope="col">Kapasitas</th>
                                    <th class="text-center" scope="col">Ketua Kamar</th>
                                </tr>
                            </thead>
                            <tbody id="listKamar">
                                <?php foreach ($rooms as $key => $item) { ?>
                                    <tr id="<?= $item['id'] ?>">
                                        <td class="text-center"><?= $item['id'] ?></td>
                                        <td id="capacity_<?= $item['id'] ?>" class="text-center"><?= $item['capacity'] ?></td>
                                        <td class="text-center"><?= $item['name'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->