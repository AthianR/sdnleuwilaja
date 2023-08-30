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

function confirmDeleteSoal(id) {
    Swal.fire({
        title: "Konfirmasi Hapus",
        text: `Apakah Anda yakin ingin menghapus data Soal?`,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("deleteFormSoal_" + id).submit();
        }
    });
}

function confirmDeleteSiswa(id) {
    Swal.fire({
        title: "Konfirmasi Hapus",
        text: "Apakah Anda yakin ingin menghapus data Siswa?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("deleteFormSiswa_" + id).submit();
        }
    });
}

$(document).ready(function () {
    new DataTable("#dataSiswa", {
        initComplete: function () {
            var table = this;

            this.api()
                .columns()
                .every(function (index) {
                    if (index === 2) {
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

function displaySiswaDetails(nama, nik, password) {
    document.getElementById("modalNama").textContent = nama;
    document.getElementById("modalNIK").textContent = nik;
    document.getElementById("modalPassword").textContent = password;
}

// Event listener untuk setiap tombol "Lihat" pada setiap baris siswa
document.querySelectorAll(".btn-info").forEach(function (button) {
    button.addEventListener("click", function () {
        var nama = this.getAttribute("data-nama");
        var nik = this.getAttribute("data-nik");
        var password = this.getAttribute("data-password");
        displaySiswaDetails(nama, nik, password);
    });
});
