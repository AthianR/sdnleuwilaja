// Call the dataTables jQuery plugin
$(document).ready(function () {
    setTimeout(function () {
        $("#alert-success").fadeOut("slow");
    }, 2000);
});

$(document).ready(function () {
    setTimeout(function () {
        $("#alert-error").fadeOut("slow");
    }, 2000);
});

$(document).ready(function () {
    // $("#dataTable").DataTable();

    new DataTable("#dataTable", {
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
    // $("#dataTable").DataTable();

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
    // $("#dataTable").DataTable();

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

function confirmDelete() {
    Swal.fire({
        title: "Konfirmasi Hapus",
        text: "Apakah Anda yakin ingin menghapus data soal?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("deleteForm").submit();
        }
    });
}

function confirmDelete() {
    Swal.fire({
        title: "Konfirmasi Hapus",
        text: "Apakah Anda yakin ingin menghapus data soal?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("deleteFormSiswa").submit();
        }
    });
}
