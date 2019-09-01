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
                            <li class="active">Pelanggaran</li>
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
                        <strong>Tambah Pelanggan</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-2"><label class="form-control-label">Kamar</label></div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static" id="room">#</p>
                            </div>
                            <input type="text" hidden id="chairmanId" value="" >
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">Ketua Kamar</label></div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static" id="chairman">#</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="santri" class=" form-control-label">Santri</label></div>
                            <div class="col-12 col-md-2">
                                <select name="select" id="santri" onchange="getDetailSantri()" class="form-control">
                                    <option value="-">Pilih</option>
                                    <?php foreach ($santri as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="type" class=" form-control-label">Level Pelanggan</label></div>
                            <div class="col-12 col-md-2">
                                <select name="select" id="type" class="form-control">
                                    <option value="-">Pilih</option>
                                    <option value="1">Berat</option>
                                    <option value="2">Sedang</option>
                                    <option value="3">Ringan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="desc" class=" form-control-label">Deskripsi</label></div>
                            <div class="col-12 col-md-7"><textarea name="desc" id="desc" rows="9" placeholder="Masukkan deksripsi..." class="form-control"></textarea></div>
                        </div>
                        <button class="btn btn-primary" id="btnAddViolation" onclick="addViolation()">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Daftar Pelanggan</strong>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Santri</th>
                                    <th class="text-center" scope="col">Kamar</th>
                                    <th class="text-center" scope="col">Pengasuh</th>
                                    <th class="text-center" scope="col">Tipe</th>
                                    <th class="text-center" scope="col">Deskripsi</th>
                                    <th class="text-center" scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody id="listStaff">
                                <?php foreach ($violation as $key => $item) { ?>
                                    <tr id="<?= $item['id'] ?>">
                                        <td class="text-center"><?= $key + 1 ?></td>
                                        <td class="text-center"><?= $item['santriName'] ?></td>
                                        <td class="text-center"><?= $item['kamarId'] ?></td>
                                        <td class="text-center"><?= $item['pengasuhName'] ?></td>
                                        <td class="text-center">
                                            <?php
                                             if ($item['type'] == 1) {
                                                echo 'Berat';
                                             }else if ($item['type'] == 2) {
                                                echo 'Sedang';
                                            }else if ($item['type'] == 3) {
                                                echo 'Ringan';
                                             }
                                            ?>
                                        </td>
                                        <td class="text-center"><?= $item['description'] ?></td>
                                        <td class="text-center"><?= $item['createdAt'] ?></td>
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
        var santri = $("#santri").val()
        var chairmanId = $("#chairmanId").val()
        var room = $("#room").html()
        var type = $("#type").val()
        var desc = $("#desc").val()

        if (name != "" && desc != "" && chairmanId != "" && room != "" && type != "") {
            $("#btnAddViolation").attr("disabled", false)
        }
    }

    function getDetailSantri() {
        var id = $("#santri").val()
        $.ajax({
            method: "POST",
            url: `/admin/santri/getDetailSantri?id=${id}`,
            success: function(res) {
                if (res != "false") {
                    res = JSON.parse(res)
                    $("#room").html(res.kamar)
                    $("#chairman").html(res.pengasuhName)
                    $("#chairmanId").val(res.pengasuhId)
                }else{
                    toastError("Ambil Detail Santri Gagal")    
                }
            }
        })
    }

    function addViolation() {
        var santri = $("#santri").val()
        var chairmanId = $("#chairmanId").val()
        var room = $("#room").html()
        var type = $("#type").val()
        var desc = $("#desc").val()

        $.ajax({
            method: "POST",
            url: "/admin/violation/doAddViolation",
            data: {
                santriId: santri,
                chairmanId: chairmanId,
                roomId: room,
                type: type,
                desc: desc
            },
            beforeSend: function() {
                $("#btnAddViolation").html(`Loading...`).attr("disabled", true)
            },
            success: function(res) {
                console.log(res);
                
                // $("#btnAddViolation").html(`Tambah`).attr("disabled", false)
                // var total = $("#listStaff").children().length
                // if (total == 0) {
                //     total = 1
                // } else {
                //     total++
                // }
                // if (res != "false") {
                //     $("#listStaff").append(
                //         `
                //         <tr id='${res}' >
                //             <td class='text-center'>${total}</td>
                //             <td id='name_${res}' class='text-center'>${name}</td>
                //             <td id='username_${res}' class='text-center'>${username}</td>
                //             <td style='width:160px' class='text-center' >
                //                 <span class="btn btn-primary" onclick='edit("${res}")' >Edit</span>
                //                 <span class="btn btn-danger" onclick='del("${res}")' >Hapus</span>
                //             </td>
                //         </tr>
                //         `
                //     )
                //     toastSuccess("Sukses Tambah Staff")
                // } else {
                //     toastError("Gagal Tambah Staff")
                // }
            }
        })
    }

    function del(id) {
        $.ajax({
            method: "POST",
            url: "/admin/staff/doDeleteStaff",
            data: {
                id: id
            },
            success: function(res) {
                if (res == "true") {
                    toastSuccess("Sukses Hapus Staff")
                    $("#" + id).remove()
                } else {
                    toastError("Hapus Staff Gagal")
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