// Call the dataTables jQuery plugin
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
                        column.footer().replaceChildren(select);

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
