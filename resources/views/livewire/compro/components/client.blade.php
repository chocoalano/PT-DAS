<section class="client_section">
    <div class="container">
        <div class="heading_container">
            <h2>
                WHAT CUSTOMERS SAY
            </h2>
        </div>
        <div class="carousel-wrap ">
            <div class="owl-carousel">
                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('assets/compro/images/c-1.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tempor incididunt <br>
                                <span>
                                    Dipiscing elit
                                </span>
                            </h5>
                            <img src="{{ asset('assets/compro/images/quote.png') }}" alt="">
                            <p>
                                Dipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('assets/compro/images/c-2.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tempor incididunt <br>
                                <span>
                                    Dipiscing elit
                                </span>
                            </h5>
                            <img src="{{ asset('assets/compro/images/quote.png') }}" alt="">
                            <p>
                                Dipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="box">
                        <div class="img-box">
                            <img src="{{ asset('assets/compro/images/c-3.png') }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tempor incididunt <br>
                                <span>
                                    Dipiscing elit
                                </span>
                            </h5>
                            <img src="{{ asset('assets/compro/images/quote.png') }}" alt="">
                            <p>
                                Dipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@once
    @push('scripts')
        <script type="text/javascript">
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 0,
                navText: [],
                center: true,
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        </script>
    @endpush
@endonce
