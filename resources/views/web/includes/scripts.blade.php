<!-- JQuery v1.12.4 -->
	<script src="{{ $web_source }}/assets/js/jquery-1.12.4.min.js"></script>

	<!-- Library - Js -->
	<script src="{{ $web_source }}/assets/js/popper.min.js"></script>
	<script src="{{ $web_source }}/assets/js/lib.js"></script>

	<!-- REVOLUTION JS FILES -->
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/jquery.themepunch.revolution.min.js"></script>

	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.migration.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script type="text/javascript" src="{{ $web_source }}/assets/revolution/js/extensions/revolution.extension.video.min.js"></script>

	<!-- Library - Theme JS -->
	<script src="{{ $web_source }}/assets/js/functions.js"></script>

    <script src="{{ $web_source }}/assets/js/custom.js"></script>

    <script src="{{ $web_source }}/assets/js/scripts.js"></script>
    <script src="{{asset('toast')}}/jquery.toast.min.js"></script>

    <script>
        ! function(p) {
            "use strict";
            var notifier;

            function t() {}
            t.prototype.send = function(t, i, o, e, n, a, s, r) {
                    var c = {
                        heading: t,
                        text: i,
                        position: o,
                        loaderBg: e,
                        icon: n,
                        hideAfter: a = a || 3e3,
                        stack: s = s || 1
                    };
                    r && (c.showHideTransition = r),
                        // console.log(c),
                        p.toast().reset("all"),
                        p.toast(c)
                },
                p.NotificationApp = new t,
                p.NotificationApp.Constructor = t
        }(window.jQuery),
        function(i) {
            notifier = i;
            "use strict";
        }(window.jQuery);

        function successMsg(title, msg) {
            notifier.NotificationApp.send(title, msg, "top-right", "#5ba035", "success")
        }

        function errorMsg(title, msg) {
            notifier.NotificationApp.send(title, msg, "top-right", "#bf441d", "error")
        }
    </script>
    @yield('script')
