<script src="{{ asset('./sitinjut/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('./sitinjut/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="{{ asset('./sitinjut/js/temuan.js') }}"></script>
<script>
    AOS.init();
</script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    function logout() {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>