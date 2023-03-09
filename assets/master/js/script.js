$(document).ready(function () {
    checkAll();
    $('table').on('click', "input[name='chk_id[]']", function () {
        enableHapusTerpilih();
    });
    enableHapusTerpilih();
    $('#table-data').DataTable();

    function checkAll(id = "#chk_all") {
        $('table').on('click', id, function () {
            if ($(this).is(':checked')) {
                $('.table input[type=checkbox]').each(function () {
                    $(this).prop("checked", true);
                });
            } else {
                $('.table input[type=checkbox]').each(function () {
                    $(this).prop("checked", false);
                });
            }
            $('.table input[type=checkbox]').change();
            enableHapusTerpilih();
        });
        $("[data-toggle=tooltip]").tooltip();
    }

    function enableHapusTerpilih() {
        if ($("input[name='chk_id[]']:checked:not(:disabled)").length <= 0) {
            $('.aksi-terpilih').addClass('disabled');
            $('.hapus-terpilih').addClass('disabled');
        } else {
            $('.aksi-terpilih').removeClass('disabled');
            $('.hapus-terpilih').removeClass('disabled');
        }
    }
});