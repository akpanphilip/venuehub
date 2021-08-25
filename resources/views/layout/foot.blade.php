<footer class="container-fluid footer">
    <div class="container-fluid footer-row row gy-3">
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="footer-content">
                <div class="footer-content-img">
                    VENUEHUB.NG
                    {{-- <img src="{{asset('img/white-logo.png')}}" alt=""> --}}
                </div>
                <div class="social-links">
                    {{-- <i class="img-icon">
                        <img src="{{asset('img/facebook.png')}}">
                    </i>
                    <i class="img-icon">
                        <img src="{{asset('img/whatsapp.png')}}">

                    </i>
                    <i class="img-icon">
                        <img src="{{asset('img/ig.png')}}">
                    </i> --}}
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="footer-content">
                <div class="footer-content-heading">Useful Links</div>
                <ul class="footer-content-list">
                    <li><i class="fas fa-angle-double-right"></i> <a href="{{ route('about-us') }}">About VenueHub NG</a></li>
                    <li><i class="fas fa-angle-double-right"></i> <a href="{{route('contact-us')}}">Contact Us</a></li>
                    <li><i class="fas fa-angle-double-right"></i> <a href="{{route('user.add-listing')}}">List Your Venue</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="footer-content">
                <div class="footer-content-heading">Find Support</div>
                <ul class="footer-content-list">
                    <li><i class="fas fa-angle-double-right"></i> <a href="mailto:support@venuehub.ng">Support@venuehub.ng</a></li>
                    {{-- <li><i class="fas fa-angle-double-right"></i><a href="tel:+234-803-456-7890">+234-803-456-7890</a></li> --}}
                    <li><i class="fas fa-angle-double-right"></i> <a href="#">FAQs</a></li>

                </ul>
            </div>
        </div>
    </div>
</footer>
