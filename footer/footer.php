<footer>
    <div id="footer_container">
        <div id="footer_img">
            <div id="footer_img_div">
                <img src="../images/woty_logo.png" alt="woty"/>
            </div>
        </div><!-- footer_img -->
        <div id="footer_content">
            <div class="footer_content_block">
                Contact
            </div><!--footer_content_block -->
            <div class="footer_content_block">
                Over Webshop
            </div><!--footer_content_block -->
            <div class="footer_content_block">
                Algemene voorwaarden
            </div><!--footer_content_block -->
            <div class="footer_content_block">
                Privacy
            </div><!--footer_content_block -->
        </div><!-- footer_content -->
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