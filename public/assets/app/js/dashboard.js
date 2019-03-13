jQuery(document).ready(function() {
    Dashboard.init();
    DashboardBulan.init();
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

var DashboardBulan=function() {
    return {
        init:function() {
            var e,
            t;
            !function() {
                var e=$("#m_chart_daily_sales");
                if(0!=e.length) {
                    var t= {
                        labels:["Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember"],
                        datasets:[ {
                            backgroundColor: mApp.getColor("success"), data: [15, 20, 25, 30, 25, 20, 15, 20, 25, 30, 25, 20]
                        }
                        ,
                        {
                            backgroundColor: "#f3f3fb", data: [15, 20, 25, 30, 25, 20, 15, 20, 25, 30, 25, 20]
                        }
                        ]
                    }
                    ;
                    new Chart(e, {
                        type:"bar", data:t, options: {
                            title: {
                                display: !1
                            }
                            , tooltips: {
                                intersect: !1, mode: "nearest", xPadding: 10, yPadding: 10, caretPadding: 10
                            }
                            , legend: {
                                display: !1
                            }
                            , responsive:!0, maintainAspectRatio:!1, barRadius:4, scales: {
                                xAxes:[ {
                                    display: !1, gridLines: !1, stacked: !0
                                }
                                ], yAxes:[ {
                                    display: !1, stacked: !0, gridLines: !1
                                }
                                ]
                            }
                            , layout: {
                                padding: {
                                    left: 0, right: 0, top: 0, bottom: 0
                                }
                            }
                        }
                    }
                    )
                }
            }
            ()
        }
    }
}();