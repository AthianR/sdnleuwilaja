// Call the dataTables jQuery plugin
$(document).ready(function () {
    setTimeout(function () {
        $("#alert-success").fadeOut("slow");
    }, 3000);
});

$(document).ready(function () {
    setTimeout(function () {
        $("#alert-error").fadeOut("slow");
    }, 3000);
});

function confirmDelete(type) {
    var deleteFormId = type === "soal" ? "deleteFormSoal" : "deleteFormSiswa";
    var confirmText = type === "soal" ? "Soal" : "Siswa";

    Swal.fire({
        title: "Konfirmasi Hapus",
        text: `Apakah Anda yakin ingin menghapus data ${confirmText}?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(deleteFormId).submit();
        }
    });
}

$(document).ready(function () {
    new DataTable("#dataSoal", {
        initComplete: function () {
            var table = this;

            this.api()
                .columns()
                .every(function (index) {
                    if (index === 1) {
                        // Tentukan nomor indeks kolom yang ingin Anda terapkan filter seleksi di sini
                        var column = this;
                        var select = document.createElement("select");
                        select.add(new Option(""));
                        column.header().replaceChildren(select);

                        select.addEventListener("change", function () {
                            var val = DataTable.util.escapeRegex(select.value);

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    }
                });
        },
    });
});

$(document).ready(function () {
    new DataTable("#dataTableSiswa", {
        initComplete: function () {
            var table = this;

            this.api()
                .columns()
                .every(function (index) {
                    if (index === 1) {
                        // Tentukan nomor indeks kolom yang ingin Anda terapkan filter seleksi di sini
                        var column = this;
                        var select = document.createElement("select");
                        select.add(new Option(""));
                        column.header().replaceChildren(select);

                        select.addEventListener("change", function () {
                            var val = DataTable.util.escapeRegex(select.value);

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    }
                });
        },
    });
});

$(document).ready(function () {
    new DataTable("#dataLeaderboard", {
        initComplete: function () {
            var table = this;

            this.api()
                .columns()
                .every(function (index) {
                    if (index === 3) {
                        // Tentukan nomor indeks kolom yang ingin Anda terapkan filter seleksi di sini
                        var column = this;
                        var select = document.createElement("select");
                        select.add(new Option(""));
                        column.header().replaceChildren(select);

                        select.addEventListener("change", function () {
                            var val = DataTable.util.escapeRegex(select.value);

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    }
                });
        },
    });
});

$(document).ready(function () {
    new DataTable("#dataProgres", {
        initComplete: function () {
            var table = this;

            this.api()
                .columns()
                .every(function (index) {
                    if (index === 3) {
                        // Tentukan nomor indeks kolom yang ingin Anda terapkan filter seleksi di sini
                        var column = this;
                        var select = document.createElement("select");
                        select.add(new Option(""));
                        column.header().replaceChildren(select);

                        select.addEventListener("change", function () {
                            var val = DataTable.util.escapeRegex(select.value);

                            column
                                .search(val ? "^" + val + "$" : "", true, false)
                                .draw();
                        });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    }
                });
        },
    });
});

document.getElementById("jenisSoal").addEventListener("change", function () {
    var selectedValue = this.value;
    if (selectedValue === "") {
        // Jika tidak ada jenis soal yang dipilih, tampilkan alert
        document.getElementById("alertMessage").innerHTML =
            '<div class="alert alert-danger" role="alert">Pilih jenis soal terlebih dahulu!</div>';
    } else {
        // Jika jenis soal sudah dipilih, hapus alert
        document.getElementById("alertMessage").innerHTML = "";
    }
});
