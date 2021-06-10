<!-- Footer -->
<footer class="Foot text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">

        <!-- Section: Social media -->

        <!-- Section: Form -->
        <section class="">
            <form action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">

                </div>
                <!--Grid row-->
            </form>
        </section>

        <!-- Section: Links -->
        <section class="FooterSection">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase footerHead">Tutor</h5>

                    <p class="footerPara">
                        Isn't days fill, after him bring. Set likeness meat seed whose for itself you can't seas itself.
                        Herb
                        replenish he, dry he. Firmament their.
                    </p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 pl-5">
                    <h5 class="text-uppercase followHead">Follow Us</h5>

                    <ul class="list-unstyled mb-0 followPara">
                        <li>
                            <i class="fab fa-facebook-f pr-3"></i>
                            <a href="https://www.facebook.com/">Facebook</a>
                        </li>
                        <li>
                            <i class="fab fa-instagram pr-3"></i>
                            <a href="https://www.instagram.com/">Instagram</a>
                        </li>
                        <li>
                            <i class="fab fa-whatsapp pr-3"></i>
                            <a href="https://web.whatsapp.com/">WhatsApp</a>
                        </li>
                        <li>
                            <i class="fab fa-twitter pr-3"></i>
                            <a href="https://twitter.com/">Twitter</a>
                        </li>
                        <li>
                            <i class="fab fa-youtube pr-3"></i>
                            <a href="https://www.youtube.com/">Youtube</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->

                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 ">
                    <h5 class="text-uppercase footerHead">Contact</h5>


                    <ul class="list-unstyled mb-0 footerPara">
                        <li>
                            <i class="fas fa-map-marker-alt mr-3"></i>
                            <a href="#!">USA, 3280 Cabell Avenue Alexandria</a>
                        </li>
                        <li>
                            <i class="fas fa-phone mr-3"></i>
                            <a href="#!">Tel.: +1 703-518-6099</a>
                        </li>
                        <li>
                            <i class="fas fa-fax mr-3"></i>
                            <a href="#!">Fax: +1 709-834-2693</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope mr-3"></i>
                            <a href="#!">info@ustudi.com</a>
                        </li>
                    </ul>
                </div>

        </section>
        <!-- Section: Links -->
    </div>
    <!-- Grid container -->
    <!-- Section: Social media -->
    <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/" role="button"><i
                class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com/" role="button"><i
                class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.google.com/" role="button"><i
                class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com/" role="button"><i
                class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://www.linkedin.com/feed/" role="button"><i
                class="fab fa-linkedin-in"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="https://github.com/" role="button"><i
                class="fab fa-github"></i></a>
    </section>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="#">Pluton.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<script>
    $(document).ready(function () {
        load_unseen_notification();

        setInterval(() => {
            load_unseen_notification();
        }, 3000);
    })

    var get_message_notifications_url = "{{route('notification')}}";

</script>

{{-- Chat Functions --}}
<script src="{{ asset('asset/js/chat.js') }}"></script>
