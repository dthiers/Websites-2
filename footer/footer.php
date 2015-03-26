<footer>
    <div id="footer_container">
        <p>
            HIER KOMT DE FOOTER
        </p>
    </div>
</footer>

<!-- js -->
<script src="../js/classie.js"></script>
<script src="../js/functions.js"></script>
<script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 65,
                header = document.querySelector("header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
</script>

</body>
</html>