<footer class="rx-footer">
    © <span id="year"></span> {{ config('app.name') }} · All rights reserved
</footer>
<script>
    (function () {
        var year = document.getElementById('year');
        if (year) year.textContent = new Date().getFullYear();
    })();
</script>
