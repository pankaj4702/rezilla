<footer>
    <div class="container">
        <div class="footer-inner">
            <div class="row">
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>About Us</h2>
                        <ul class="footer-menu">
                            <li><a href="javascript::">Company Profile</a></li>
                            <li><a href="javascript::">Chairman’s Message</a></li>
                            <li><a href="javascript::">CEO Message</a></li>
                            <li><a href="javascript::">Corporate Team</a></li>
                            <li><a href="javascript::">Real Estate Agents</a></li>
                            <li><a href="javascript::">Client Reviews</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>Services</h2>
                        <ul class="footer-menu">
                            <li><a href="javascript::">Asset Management</a></li>
                            <li><a href="javascript::">Holiday Homes</a></li>
                            <li><a href="javascript::">Commercial</a></li>
                            <li><a href="javascript::">Investments & Advisory</a></li>
                            <li><a href="javascript::">Conveyance</a></li>
                            <li><a href="javascript::">Property Valuation</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>Quick Links</h2>
                        <ul class="footer-menu">
                            <li><a href="javascript::">Buy</a></li>
                            <li><a href="javascript::">Rent</a></li>
                            <li><a href="{{ route('sell_property') }}">Sell</a></li>
                            <li><a href="javascript::">Communities</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>Market Trends</h2>
                        <ul class="footer-menu">
                            <li><a href="javascript::">Rele Estate News</a></li>
                            <li><a href="javascript::">Reports</a></li>
                            <li><a href="javascript::">Property Insights</a></li>
                            <li><a href="javascript::">Media</a></li>
                            <li><a href="javascript::">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="footer-inner-content">
                        <h2>Subscribe to our Newsletter!</h2>
                        <form class="news-letter">
                            <input type="email" name="subscriberEmail" id="subscriberEmail" placeholder="Email Address" autocomplete="off" />
                            <button type="button" class="news-letter-btn" onclick="subscribe()">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.7071 8.70711C17.0976 8.31658 17.0976 7.68342 16.7071 7.29289L10.3431 0.928932C9.95262 0.538408 9.31946 0.538408 8.92893 0.928932C8.53841 1.31946 8.53841 1.95262 8.92893 2.34315L14.5858 8L8.92893 13.6569C8.53841 14.0474 8.53841 14.6805 8.92893 15.0711C9.31946 15.4616 9.95262 15.4616 10.3431 15.0711L16.7071 8.70711ZM0 9H16V7H0V9Z"
                                        fill="white"
                                    />
                                </svg>
                            </button>
                        </form>
                        <div class="social-icon">
                            <h2>Follow Us on</h2>
                            <ul>
                                <li>
                                    <a href="javascript::"><i class="fa-brands fa-linkedin-in"></i></a>
                                </li>
                                <li>
                                    <a href="javascript::"><i class="fa-brands fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a href="javascript::"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="footer-bottom-inner-left">
                            <figure>
                                <img src="{{ asset('images/footer-logo.png') }}">
                            </figure>
                            <P>© Rezilla – All rights reserved</P>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="footer-bottom-inner-right">
                            <ul>
                                <li><a href="javascript::">Terms and Conditions</a></li>
                                <li><a href="javascript::">Privacy Policy</a></li>
                                <li><a href="javascript::">Disclaimer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function subscribe(){
        var address = $('#subscriberEmail').val();
        $.ajax({
                  url: "{{ route('subscribe') }}",
                  type: 'GET',
                  data:{
                    mail_address: address,
                  },
                  success: function(response) {
                    if(response.status == 2){
                        $('#subscriberEmail').val('');
                        location.href = "{{ route('loginpage') }}";
                    }
                    else if(response.status == 1){
                        Swal.fire({
                            title: 'Subscribe',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#subscriberEmail').val('');
                                 }
                                });
                            }
                    else if(response.status == 3){
                        Swal.fire({
                            title: 'This User Already Subscriber',
                            icon: 'warning',
                            showCancelButton: true,
                            showConfirmButton: false,
                            cancelButtonColor: '#e76363',
                        }).then((result) => {
                            if (result.dismiss) {
                                $('#subscriberEmail').val('');
                                 }
                                });
                            }
                        },
                  });
}
</script>
