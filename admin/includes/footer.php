<div id="toast"></div>

<script>
    function showToast(message, position, type) {
        const toast = document.getElementById("toast");
        toast.className = toast.className + " show";

        if (message) toast.innerText = message;

        if (position !== "") toast.className = toast.className + ` ${position}`;
        if (type !== "") toast.className = toast.className + ` ${type}`;

        setTimeout(function () {
            toast.className = toast.className.replace(" show", "");
        }, 3000);
    }
</script>

<?php get_message(); ?>

<script src="js/script.js"></script>
<script src="js/swiper-bundle.min.js"></script>
<script src="https://kit.fontawesome.com/4d0e1aab0d.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>