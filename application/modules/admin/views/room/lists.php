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
                        <strong>Tambah Kamar</strong>
                    </div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-2"><label class=" form-control-label">Kode</label></div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static" id="code">#</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="buildCode" class=" form-control-label">Kode Gedung</label></div>
                            <div class="col-12 col-md-2">
                                <select name="select" id="buildCode" onchange="changeCode()" class="form-control">
                                    <option value="-">Pilih</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                    <option value="I">I</option>
                                    <option value="J">J</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="roomNumber" class=" form-control-label">Nomor Ruang</label></div>
                            <div class="col-12 col-md-2">
                                <select name="select" id="roomNumber" onchange="changeCode()" class="form-control">
                                    <option value="-">Pilih</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="capacity" class=" form-control-label">Kapasitas</label></div>
                            <div class="col-12 col-md-2"><input type="number" onchange="changeCode()" onkeypress="changeCode()" id="capacity" placeholder="10" class="form-control"></div>
                        </div>
                        <button class="btn btn-primary" id="btnAddRoom" disabled onclick="addRoom()">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
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
                                    <th class="text-center" scope="col">Kode Gedung</th>
                                    <th class="text-center" scope="col">Nomor Ruang</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="listKamar">
                                <?php foreach ($rooms as $key => $item) { ?>
                                    <tr id="<?= $item['id'] ?>">
                                        <td class="text-center"><?= $item['id'] ?></td>
                                        <td id="capacity_<?= $item['id'] ?>" class="text-center"><?= $item['capacity'] ?></td>
                                        <td class="text-center"><?= $item['code'] ?></td>
                                        <td class="text-center"><?= $item['nomor'] ?></td>
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
    function changeCode() {
        var buildCode = $("#buildCode") == "-" ? "" : $("#buildCode").val();
        var roomNumber = $("#roomNumber") == "-" ? "" : $("#roomNumber").val();
        var capacity = parseInt($("#capacity").val());

        if (roomNumber != "-" && buildCode != "-" && capacity >= 1) {
            $("#btnAddRoom").attr("disabled", false)
        }

        if (buildCode == "-") {
            buildCode = "";
        }

        if (roomNumber == "-") {
            roomNumber = "";
        }

        $("#code").html("#" + buildCode + roomNumber)
    }

    function addRoom() {
        var code = $("#code").html().substr(1)
        var buildCode = $("#buildCode") == "-" ? "" : $("#buildCode").val();
        var roomNumber = $("#roomNumber") == "-" ? "" : $("#roomNumber").val();
        var capacity = parseInt($("#capacity").val());

        $.ajax({
            method: "POST",
            url: "/admin/room/doAddRoom",
            data: {
                capacity: capacity,
                code: code,
                roomNumber: roomNumber,
                buildCode: buildCode,
            },
            beforeSend: function() {
                $("#btnAddRoom").html(`Loading...`).attr("disabled", true)
            },
            success: function(res) {
                $("#btnAddRoom").html(`Tambah`).attr("disabled", false)
                if (res == "true") {
                    $("#listKamar").prepend(
                        `
                        <tr id='${code}' >
                            <td class='text-center'>${code}</td>
                            <td id='capacity_${code}' class='text-center'>${capacity}</td>
                            <td class='text-center'>${buildCode}</td>
                            <td class='text-center'>${roomNumber}</td>
                            <td style='width:160px' class='text-center' >
                                <span class="btn btn-primary" onclick='edit("${code}")' >Edit</span>
                                <span class="btn btn-danger" onclick='del("${code}")' >Hapus</span>
                            </td>
                        </tr>
                        `
                    )
                    toastSuccess("Sukses Tambah Kamar")
                }else{
                    toastError("Gagal Tambah Kamar")
                }
            }
        })
    }

    function del(id) {
        $.ajax({
            method: "POST",
            url: "/admin/room/doDeleteRoom",
            data: {
                id: id
            },
            success: function(res) {
                if (res == "true") {
                    toastSuccess("Sukses Hapus Kamar")
                    $("#" + id).remove()
                } else {
                    toastError("Hapus Kamar Gagal")
                }

            }
        })
    }

    function edit(id) {
        var val = $("#capacity_" + id).html();
        $("#capacity_" + id).html(`<input style="width:100px; padding : 0px auto" type="number" onchange="changeCode()" onkeypress="changeCode()" id="capacity" placeholder="10" value="${val}" class="form-control text-center">`)
        $("#edit_" + id).html("Simpan").attr("onclick", `save('${id}')`)
    }

    function save(id) {
        var capacity = $("#capacity_" + id + " input").val();
        $.ajax({
            method: "POST",
            url: "/admin/room/doUpdateRoom",
            data: {
                id: id,
                capacity: capacity
            },
            success: function(res) {
                if (res == "true") {
                    toastSuccess("Sukses Update Kamar")
                    $("#edit_" + id).html("Edit").attr("onclick", `edit('${id}')`)
                    $("#capacity_" + id).html(capacity)
                } else {
                    toastError("Update Kamar Gagal")
                }
            }
        })
    }
</script>