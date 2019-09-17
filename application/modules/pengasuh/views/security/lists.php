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
                            <li class="active">Keamanan</li>
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
                        <strong class="card-title">Daftar Keamanan</strong>
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
                                <?php foreach ($security as $key => $item) { ?>
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

<script type="text/javascript">
    function checkInput() {
        var name = $("#name").val()
        var username = $("#username").val()
        if (name != "" && username != "") {
            $("#btnAddStaff").attr("disabled", false)
        }
    }

    function addStaff() {
        var name = $("#name").val()
        var username = $("#username").val()
        var password = $("#password").val()

        $.ajax({
            method: "POST",
            url: "/admin/security/doAddStaff",
            data: {
                name: name,
                username: username,
                password: password
            },
            beforeSend: function() {
                $("#btnAddStaff").html(`Loading...`).attr("disabled", true)
            },
            success: function(res) {
                $("#btnAddStaff").html(`Tambah`).attr("disabled", false)
                var total = $("#listStaff").children().length
                if (total == 0) {
                    total = 1
                }else{
                    total++
                }
                if (res != "false") {
                    $("#listStaff").append(
                        `
                        <tr id='${res}' >
                            <td class='text-center'>${total}</td>
                            <td id='name_${res}' class='text-center'>${name}</td>
                            <td id='username_${res}' class='text-center'>${username}</td>
                            <td style='width:160px' class='text-center' >
                                <span id='edit_${res}' class="btn btn-primary" onclick='edit("${res}")' >Edit</span>
                                <span class="btn btn-danger" onclick='del("${res}")' >Hapus</span>
                            </td>
                        </tr>
                        `
                    )
                    toastSuccess("Sukses Tambah Keamanan")
                }else{
                    toastError("Gagal Tambah Keamanan")
                }
            }
        })
    }

    function del(id) {
        $.ajax({
            method: "POST",
            url: "/admin/security/doDeleteStaff",
            data: {
                id: id
            },
            success: function(res) {
                if (res == "true") {
                    toastSuccess("Sukses Hapus Keamanan")
                    $("#" + id).remove()
                } else {
                    toastError("Hapus Keamanan Gagal")
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
            url: "/admin/security/doUpdateStaff",
            data: {
                id: id,
                name: name,
                username: username,
            },
            success: function(res) {
                if (res == "true") {
                    toastSuccess("Sukses Update Keamanan")
                    $("#edit_" + id).html("Edit").attr("onclick", `edit('${id}')`)
                    $("#name_" + id).html(name)
                    $("#username_" + id).html(username)
                } else {
                    toastError("Update Keamanan Gagal")
                }
            }
        })
    }
</script>