
<style>
.fbottom{
    background-color: #1b1a1b;
}
.fbottom p{
    color: white;
    text-align: center;
    padding: 10px 0;
}
.fDesigner{
    opacity:0.7;
    font-weight: 400;
    text-transform: uppercase;
}

        .footer {
            /* Footer appearance */
            position: relative;
            bottom: -30px;
            width: 100%;
            background-color: #22549F;
            color: #CFDDF3;
            padding: 40px 0; 
        }

        /* Styles for footer links */
        .footer .footer-link {
            /* Footer link appearance */
            color: #CFDDF3;
            text-decoration: none;
        }

        /* Hover effect for footer links */
        .footer .footer-link:hover {
            color: #FFF;
        }

        /* Title style for footer sections */
        .footer .footer-title {
            /* Footer section title appearance */
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        /* Styles for social icons in the footer */
        .footer .social-icons .footer-social-link {
            /* Footer social icon appearance */
            margin: 0 10px;
            display: inline-block;
        }

        /* Styles for individual social icons in the footer */
        .footer .social-icons .footer-social-link .footer-icon {
            /* Footer social icon appearance */
            width: 30px;
            height: 32px;
        }

        /* Hover effect for social icons */
        .footer .social-icons .footer-social-link .footer-icon:hover {
            filter: brightness(1.2);
        }
    </style>


<body>
    
    <!-- Footer section -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row">
                <!-- Column for ISTronix information -->
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <h5 class="footer-title">ISTronix</h5>
                    <p>We students of West Visayas State University are willing to attribute this ISTronix business. We aim to deliver excellence and innovation in every aspect ryzen has risen.</p>
                </div>
                <!-- Column for contact information -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="footer-title">Contact Us</h5>
                    <ul class="companyinfo-list">
                        <li><a href="mailto:JioTechCompany@gmail.com" class="footer-link">Email: JioTechCompany@gmail.com</a></li>
                        <li><a href="tel:+6392218621219" class="footer-link">Phone: 092218621219</a></li>
                        <li><a href="#" class="footer-link">Address: 404, Arroyo Street, Santa Barbara, Iloilo</a></li>
                    </ul>
                </div>
                <!-- Column for social media links -->
                <div class="col-lg-4 col-md-6 text-center">
                    <h5 class="footer-title">Follow Us</h5>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/Almusal17373" class="footer-social-link"><img src="assets/images/designs/facebook.png" alt="Facebook" class="footer-icon"></a>
                        <a href="https://www.instagram.com/dinuguansayote/" class="footer-social-link"><img src="assets/images/designs/instagram.png" alt="Instagram" class="footer-icon"></a>
                        <a href="https://x.com/Yyyorme?t=8gqXy2KMHVtcOIz5RAFBig&s=09" class="footer-social-link"><img src="assets/images/designs/twitter.png" alt="Twitter" class="footer-icon"></a>
                    </div>
                </div>
            </div>
            <!-- Row for copyright -->
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 JioTECH Company. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
$(document).ready( function () {
    $('#coaTable').DataTable(function(){
        order: [[3, 'desc']];
    });
} );



</script>