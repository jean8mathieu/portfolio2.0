/**
 * Submit form using form ajax
 */
$('.btn-submit').on('click', function () {
    formAjax('form', true);
});

/**
 * Sending form data using ajax
 *
 * @param id
 * @param redirect
 * @return boolean
 */
function formAjax(id, redirect = false) {
    let form = new Form(id);
    return form.sendRequest(redirect);
}

/**
 * If button is click disable it for a second and re enable after
 */
$(document).on('click', '.click', function () {
    let btn = $(this);
    let content = $(this).html();
    $(this).html(`<i class="fas fa-sync fa-2x fa-spin"></i>`);
    btn.prop('disabled', true);
    setTimeout(function () {
        btn.prop('disabled', false);
        btn.html(content);
    }, 2000);
});

/**
 *
 */
$('.tag').tokenize2({
    dataSource: '/api/admin/tag',
    delimiter: ','
});
