<footer>
    <div class="innerfooter">
        <div>
            <span>&copy; Copyright 2021 hyeonmin All right reserved</span>
            <ul class="sns">
                <li><a href="https://reverent-mclean-efe985.netlify.app/" target="_blank" class="fab fa-facebook-messenger"></a></li>
                <li><a href="https://inspiring-haibt-d90b74.netlify.app/" target="_blank" class="far fa-clock"></a></a></li>
                <li><a href="https://github.com/qetqet910" target="_blank" class="fab fa-github"></a></li>
            </ul>
        </div>
        <div>
            <ul class="mola">
                <li><a href="#">광고문의</a></li>
                <li><a href="#">이용약관</a></li>
                <li><a href="#">개인정보처리방침</a></li>
            </ul>
            <ul id="menu">
                <?php
                echo $List;
                ?>
            </ul>
        </div>
    </div>
</footer>
</body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</html>
<script>
    // const header = document.querySelector('header');
    // const headerback = document.querySelector('.headerback');
    // const nav = header.querySelector('nav');
    // const span = nav.querySelectorAll('li a');
    // const ls = document.querySelectorAll('.user a');
    // const usn = document.querySelector('.userName');
    // const a = document.querySelector('.logo');
    // const hehe = document.querySelector('.adminmenu');
    // const hehe2 = document.querySelectorAll(".list li a")

    // const spans = header.querySelectorAll('label span');

    // window.addEventListener('scroll', function(e) {
    //     headerrr();
    // });

    // function headerrr() {
    //     if (Math.floor(window.scrollY) > 0) {
    //         headerback.style.height = '100%';
    //         a.style.color = 'white';

    //         ls.forEach(e => {
    //             e.style.color = 'white';
    //         })
    //         span.forEach(e => {
    //             e.style.color = 'white';
    //         })
    //         spans.forEach(e => {
    //             e.style.background = 'white';
    //         })
    //         if (usn != null) {
    //             usn.style.color = 'white';
    //         }
    //         hehe.style.color = 'white';
    //         hehe2.forEach(e => {
    //             e.style.color = 'black';
    //         })
    //     } else {
    //         headerback.style.height = '0%';
    //         a.style.color = 'black';

    //         ls.forEach(e => {
    //             e.style.color = 'black';
    //         })
    //         span.forEach(e => {
    //             e.style.color = 'black';
    //         })
    //         spans.forEach(e => {
    //             e.style.background = 'black';
    //         })
    //         if (usn != null) {
    //             usn.style.color = 'black';
    //         }
    //         hehe.style.color = 'black';
    //         hehe2.forEach(e => {
    //             e.style.color = 'black';
    //         })
    //     }
    // }
</script>
<?php
mysqli_close($conn);
?>