        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- /Widgets -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Info</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Nama</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?= $info['name'] ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">No. HP</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?= $info['username'] ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Nama Santri</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?= $info['santriName'] ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Kamar</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?= $info['kamar'] ?></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-2"><label class=" form-control-label">Ketua Kamar</label></div>
                                    <div class="col-12 col-md-9">
                                        <p class="form-control-static"><?= $info['chairman'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Daftar Pelanggaran</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width:10px; text-align:left" >#</th>
                                            <th style="width:200px; text-align:left" >Tanggal</th>
                                            <th style="width:100px; text-align:left" >Jenis</th>
                                            <th style="text-align:left">Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listSantri">
                                        <?php foreach ($violation as $key => $item) { ?>
                                            <tr>
                                                <td class="serial"><?= $key + 1 ?></td>
                                                <td> <span><?= $item['createdAt'] ?></span> </td>
                                                <td>
                                                    <?php
                                                        if ($item['type'] == 3) {
                                                            echo '<span class="badge badge-success">Ringan</span>';
                                                        } else if ($item['type'] == 2) {
                                                            echo '<span class="badge badge-warning">Sedang</span>';
                                                        } else if ($item['type'] == 1) {
                                                            echo '<span class="badge badge-danger">Berat</span>';
                                                        }
                                                        ?>

                                                </td>
                                                <td style="text-align:left"><span><?= $item['description'] ?></span></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->