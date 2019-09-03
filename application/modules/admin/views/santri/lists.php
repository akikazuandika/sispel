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
                            <li class="active">Santri</li>
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
                        <strong>Tambah Santri</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="capacity" class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-4"><input type="text" onkeypress="checkInput()" onchange="checkInput()" required id="name" placeholder="Input name here.." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="capacity" class=" form-control-label">Username</label></div>
                            <div class="col-12 col-md-4"><input type="text" onkeypress="checkInput()" onchange="checkInput()" required id="username" placeholder="Input username here.." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="capacity" class=" form-control-label">Password <small>(optional)</small> </label></div>
                            <div class="col-12 col-md-4"><input type="text" disabled value="default" id="password" placeholder="Input password here.." class="form-control"><small class="form-text text-muted">Password default adalah <b>default</b> </small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="capacity" class=" form-control-label">Nama Orang Tua / Wali</label></div>
                            <div class="col-12 col-md-4"><input type="text" onkeypress="checkInput()" onchange="checkInput()" required id="wali" placeholder="Input Nama Orang Tua / Wali here.." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="capacity" class=" form-control-label">No.Hp Orang Tua / Wali </label></div>
                            <div class="col-12 col-md-4"><input type="text" onkeypress="checkInput()" onchange="checkInput()" required id="phone" placeholder="Input No.Hp Orang Tua / Wali  here.." class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="room" class=" form-control-label">Kamar</label></div>
                            <div class="col-12 col-md-2">
                                <select name="select" id="room" onchange="getDetailRoom()" class="form-control">
                                    <option value="-">Pilih</option>
                                    <?php foreach ($rooms as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['id'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class="form-control-label">Ketua Kamar</label></div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static" id="chairman">#</p>
                            </div>
                        </div>
                        <button class="btn btn-primary" id="btnAddSantri" disabled onclick="addSantri()">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Santri</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Username</th>
                                    <th class="text-center" scope="col">Wali</th>
                                    <th class="text-center" scope="col">Kamar</th>
                                    <th class="text-center" scope="col">Ketua Kamar</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="listSantri">
                                <?php foreach ($santri as $key => $item) { ?>
                                    <tr id="<?= $item['id'] ?>">
                                        <td class="text-center"><?= $key + 1 ?></td>
                                        <td id="name_<?= $item['id'] ?>" class="text-center"><?= $item['name'] ?></td>
                                        <td id="username_<?= $item['id'] ?>" class="text-center"><?= $item['username'] ?></td>
                                        <td class="text-center"><?= $item['waliName'] ?></td>
                                        <td class="text-center"><?= $item['kamar'] ?></td>
                                        <td class="text-center"><?= $item['pengasuhName'] ?></td>
                                        <td style="width:200px" class="text-center">
                                            <span id="edit_<?= $item['id'] ?>" class="btn btn-primary" onclick='edit("<?= $item["id"] ?>")'>Edit</span>
                                            <span class="btn btn-danger" onclick='del("<?= $item["id"] ?>")'>Hapus</span>
                                        </td>
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

<script type="text/javascript">
    function checkInput() {
        var name = $("#name").val()
        var username = $("#username").val()
        if (name != "" && username != "") {
            $("#btnAddSantri").attr("disabled", false)
        }
    }

    function addSantri() {
        var name = $("#name").val()
        var username = $("#username").val()
        var password = $("#password").val()
        var waliName = $("#wali").val()
        var phone = $("#phone").val()
        var room = $("#room").val()
        var chairman = $("#chairman").html()

        $.ajax({
            method: "POST",
            url: "/admin/santri/doAddSantri",
            data: {
                name: name,
                username: username,
                password: '',
                waliName : waliName,
                phone : phone,
                room : room
            },
            beforeSend: function() {
                $("#btnAddSantri").html(`Loading...`).attr("disabled", true)
            },
            success: function(res) {
                $("#btnAddSantri").html(`Tambah`).attr("disabled", false)
                var total = $("#listSantri").children().length
                if (total == 0) {
                    total = 1
                } else {
                    total++
                }
                if (res != "false") {
                    $("#listSantri").append(
                        `
                        <tr id='${res}' >
                            <td class='text-center'>${total}</td>
                            <td class='text-center'>${name}</td>
                            <td class='text-center'>${username}</td>
                            <td class='text-center'>${waliName}</td>
                            <td class='text-center'>${room}</td>
                            <td class='text-center'>${chairman}</td>
                            <td style='width:160px' class='text-center' >
                                <span class="btn btn-primary" onclick='edit("${res}")' >Edit</span>
                                <span class="btn btn-danger" onclick='del("${res}")' >Hapus</span>
                            </td>
                        </tr>
                        `
                    )
                    toastSuccess("Sukses Tambah Santri")
                } else {
                    toastError("Gagal Tambah Staff")
                }
            }
        })
    }

    function getDetailRoom() {
        var id = $("#room").val()
        $.ajax({
            method: "POST",
            url: `/admin/santri/getDetailRoom?id=${id}`,
            success: function(res) {
                if (res != "false") {
                    res = JSON.parse(res)
                    $("#chairman").html(res.name)
                }else{
                    toastError("Ambil Detail Kamar Gagal")    
                }
            }
        })
    }

    function del(id) {
        $.ajax({
            method: "POST",
            url: "/admin/santri/doDeleteSantri",
            data: {
                id: id
            },
            success: function(res) {
                if (res == "true") {
                    toastSuccess("Sukses Hapus Santri")
                    $("#" + id).remove()
                } else {
                    toastError("Hapus Santri Gagal")
                }

            }
        })
    }

    function edit(id) {
        var username = $("#username_" + id).html();
        var name = $("#name_" + id).html();
        $("#name_" + id).html(`<input style="width:100px; padding : 0px auto" type="text" onchange="checkInput()" onkeypress="checkInput()"  placeholder="Name.." value="${name}" class="form-control text-center">`)
        $("#username_" + id).html(`<input style="width:100px; padding : 0px auto" type="text" onchange="checkInput()" onkeypress="checkInput()"  placeholder="Username.." value="${username}" class="form-control text-center">`)
        $("#edit_" + id).html("Simpan").attr("onclick", `save('${id}')`)
    }

    function save(id) {
        var name = $("#name_" + id + " input").val();
        var username = $("#username_" + id + " input").val();
        $.ajax({
            method: "POST",
            url: "/admin/staff/doUpdateStaff",
            data: {
                id: id,
                name: name,
                username: username,
            },
            success: function(res) {
                if (res == "true") {
                    toastSuccess("Sukses Update Staff")
                    $("#edit_" + id).html("Edit").attr("onclick", `edit('${id}')`)
                    $("#name_" + id).html(name)
                    $("#username_" + id).html(username)
                } else {
                    toastError("Update Kamar Gagal")
                }
            }
        })
    }
</script>