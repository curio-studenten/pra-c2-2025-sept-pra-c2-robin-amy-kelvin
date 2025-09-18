<script>
    window.open("{{ $url }}", "_blank");
    setTimeout(function() {
        window.history.back();
    }, 500);
</script>
