$(function () {
    function load() {
        var url = 'list/?q=' + $('#trainpay-search').val() + '&sort=' + $('#trainpay-sort').val();

        $.get(url, function (response) {
            var $list = $('#trainpay-list').empty();

            $.each(response.data, function (i, p) {
                $list.append(
                    '<div class="payment">' +
                        '<h3><a href="' + p.id + '/">' + p.title + '</a></h3>' +
                        '<span class="amount">' + p.amount + ' руб.</span>' +
                        '<span class="status">' + p.status + '</span>' +
                    '</div>'
                );
            });
        }, 'json');
    }

    $('#trainpay-search').on('input', load);
    $('#trainpay-sort').on('change', load);

    $('#trainpay-list').on('submit', 'form.refund', function (e) {
        e.preventDefault();
        $.post('refund/', $(this).serialize(), function (response) {
            load();
        }, 'json');
    });
});
