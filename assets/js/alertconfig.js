function swalConfirm(table, id, name) {
    var text = "";
    var methodName = "delete" + table.charAt(0).toUpperCase() + table.slice(1);
    switch (table) {
        case "pengeluaran":
            text = "Data Pengeluaran Program ini akan dihapus, akumulasi dana yang masuk dan sisa dana akan berubah !";
            break;
        case "program":
            text = "Jika Sudah ada dana yang masuk ke program ini maka program tidak bisa dihapus! Jika ingin tetap menghapus data harap lapor pihak maintenance !";
            break;
        case "Berita":
            text = "";
            break;
        default:
            text = "";
            break;
    }


    swal({
        title: "Yakin Menghapus "+ name +" ?",
        text: text,
        icon: "warning",
        buttons: [
            'Batal',
            'Hapus'
        ],
        dangerMode: true,
    }).then(function (isConfirm) {
        if (isConfirm) {

            try {
                window.location.href = window.location.origin + "/ashhabuljannah/adminuser" +
                    "/" + methodName + "/" + id;
            } catch (err) {
                console.log(err);
                swal({
                    title: 'Error',
                    text: err,
                    icon: 'error'
                })
            }
        }
    })

}