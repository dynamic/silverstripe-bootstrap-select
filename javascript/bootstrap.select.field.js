(function ($) {

    $.fn.extend({
        ssBootstrapSelectOptionset: function (opts) {
            return $(this).each(function () {
                var config = $.extend(opts || {}, $(this).data(), $(this).data('bootstrapselectconfig'), {});
                $(this).each(function () {
                    if ($(this).hasClass('bs-applied')) return; // already applied
                    $(this).addClass('bs-applied').selectpicker(config);
                    $(this).blur().focus(); // trigger show
                })
            });
        }
    });

    $(window).on('load', function () {
        $('.bootstrap-select-field').ssBootstrapSelectOptionset();
    });

}(jQuery));
