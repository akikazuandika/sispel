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
                            <li class="active">Ketua Kamar</li>
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
                        <strong class="card-title">Daftar Ketua Kamar</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Username</th>
                                </tr>
                            </thead>
                            <tbody id="listStaff">
                                <?php foreach ($staff as $key => $item) { ?>
                                    <tr id="<?= $item['id'] ?>">
                                        <td class="text-center"><?= $key + 1 ?></td>
                                        <td id="name_<?= $item['id'] ?>" class="text-center"><?= $item['name'] ?></td>
                                        <td id="username_<?= $item['id'] ?>" class="text-center"><?= $item['username'] ?></td>
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