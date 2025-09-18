<button onclick="openUrl()">Open URL</button>

<script>
function openUrl() {
    var url = "{{ $url }}";
    window.open(url, "_blank"); // Open in a new tab
}
</script>
