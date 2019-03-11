jQuery(document).ready(function() {
    Dashboard.init()
});

var Dashboard=function() {
    return {
        init:function() {
            var e, t;
            e=$(".owl-carousel"),
            t=$("#m_widget_body_owlcarousel_items"),
            e.children().each(function(e) {
                $(this).attr("data-position", e)
            }
            ),
            t.owlCarousel( {
                items: 1, animateIn: "fadeIn(100)", loop: 0
            }
            ),
            e.owlCarousel( {
                center: !0, loop: 0, items: 2
            }
            ),
            $(document).on("click", ".carousel", function() {
                e.trigger("to.owl.carousel", $(this).data("position"))
            }
            )
        }
    }
}();