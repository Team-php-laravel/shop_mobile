// DOM Ready
$(function () {
    var $el, $ps, $up, totalHeight;
    $(".sidebar-box .button").click(function () {

        // IE 7 doesn't even get this far. I didn't feel like dicking with it.

        totalHeight = 0

        $el = $(this);
        $p = $el.parent();
        $up = $p.parent();
        $ps = $up.find("p:not('.read-more')");

        // measure how tall inside should be by adding together heights of all inside paragraphs (except read-more paragraph)
        $ps.each(function () {
            totalHeight += $(this).outerHeight(true);
            // FAIL totalHeight += $(this).css("margin-bottom");
        });

        $up
            .css({
                // Set height to prevent instant jumpdown when max height is removed
                "height": $up.height(),
                "max-height": 99999
            })
            .animate({
                "height": '100%'
            });

        // fade out read-more
        $p.fadeOut();
        // prevent jump-down
        return false;
    });

});

window.addEvent('domready', function () {

    SqueezeBox.initialize({});
    SqueezeBox.assign($$('a.modal'), {
        parse: 'rel'
    });
});

var show_quicktext = "Xem nhanh";
jQuery(document).ready(function () {
    jQuery("#product_list .vmproduct li , .list_carousel .vmproduct li > div , .izotop_load .vmproduct li > div, .mod_vm2products #vm2product li > div.prod-row, .vmproduct.best li").each(function (indx, element) {
        var my_product_id = jQuery(this).find(".quick_ids").val();
        //alert(my_product_id);
        if (my_product_id) {
            jQuery(this).append("<div class='quick_btn' onClick ='quick_btn(" + my_product_id + ")'>" + show_quicktext + "</div>");
        }
        jQuery(this).find(".quick_id").remove();
    });
});


jQuery(window).load(function () {
    jQuery('#accordion li.level0  ul').each(function (index) {
        jQuery(this).prev().addClass('idCatSubcat')
    });
    jQuery('#accordion li.level0 ul').css('display', 'none');
    jQuery('#accordion li.active').each(function () {
        jQuery('#accordion li.active > span').addClass('expanded');
    });
    jQuery('#accordion li.level0.active > ul').css('display', 'block');
    jQuery('#accordion li.level0.active > ul  li.active > ul').css('display', 'block');
    jQuery('#accordion li.level0.active > ul  li.active > ul li.active > ul').css('display', 'block');
    jQuery('#accordion li.level0 ul').each(function (index) {
        jQuery(this).prev().addClass('close').click(function () {
            if (jQuery(this).next().css('display') == 'none') {
                jQuery(this).next().slideDown(200, function () {
                    jQuery(this).prev().removeClass('collapsed').addClass('expanded');
                });
            } else {
                jQuery(this).next().slideUp(200, function () {
                    jQuery(this).prev().removeClass('expanded').addClass('collapsed');
                    jQuery(this).find('ul').each(function () {
                        jQuery(this).hide().prev().removeClass('expanded').addClass('collapsed');
                    });
                });
            }
            return false;
        });
    });
});

window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}

gtag('js', new Date());

gtag('config', 'AW-804845090');

$(document).ready(function () {
    $('.search-box input[type="text"]').on("keyup input", function () {
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if (term.length) {
            $.get("ajaxsearch/backend-search-mm.html", {query: term}).done(function (data) {
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else {
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function () {
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});

window.fbAsyncInit = function () {
    FB.init({appId: '1138296669597023', xfbml: true, version: 'v2.11'});
    FB.AppEvents.logPageView();
};
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "../connect.facebook.net/vi_VN/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

jQuery(document).ready(function ($) {
    $('#product_list .hasTooltip').tooltip('hide');
    $(function () {

        $('#product_list div.prod-row').each(function () {
            var tip = $(this).find('div.count_holder_small');

            $(this).hover(
                function () {
                    tip.appendTo('body');
                },
                function () {
                    tip.appendTo(this);
                }
            ).mousemove(function (e) {
                var x = e.pageX + 60,
                    y = e.pageY - 50,
                    w = tip.width(),
                    h = tip.height(),
                    dx = $(window).width() - (x + w),
                    dy = $(window).height() - (y + h);

                if (dx < 50) x = e.pageX - w - 60;
                if (dy < 50) y = e.pageY - h + 130;

                tip.css({left: x, top: y});
            });
        });

    });

});