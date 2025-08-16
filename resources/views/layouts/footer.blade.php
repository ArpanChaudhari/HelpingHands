<footer class="footer">
  <div class="footer-container">

    <!-- Organization Info -->
    <div class="footer-section about">
      <img src="{{ asset('image/HelpingHands_logos.png') }}" alt="Helping Hands Logo" class="logo" />
      <p>A transparent platform connecting donations, services, and volunteers to real causes like education and disaster relief.</p>
      <p><strong>Reg.No: E30267</strong><br><strong>Pan No: AAOTSO794B</strong></p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="footer-section contact">
      <h3>Get In Touch!</h3>
      <p><i class="fas fa-map-marker-alt"></i> Office :60, Centrum shopping centre Lokhandwala , Mumbai</p>
      <p><i class="fas fa-phone-alt"></i> 9773414514 / 9427474008</p>
      <p><i class="fas fa-envelope"></i> support@HelpingHands.com</p>
    </div>

    <!-- Quick Links -->
    <div class="footer-section links">
      <h3>Quick Links</h3>
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('Explore') }}">Explore Campaigns</a></li>
        <li><a href="{{ route('Donate') }}">Donate</a></li>
        <li><a href="{{ route('Volunteer') }}">Volunteer</a></li>
        <li><a href="{{ route('Contactus') }}">Contact Us</a></li>
        <li><a href="{{ route('Contactus') }}#faqs">FAQs</a></li>
      </ul>
    </div>

    <!-- Gallery -->
    <div class="footer-section gallery">
      <h3>Our Gallery</h3>
      <div class="gallery-grid">
        <img src="{{ asset('image/priority_causes/Medical_Assistance_Health_Camps.webp') }}" alt="Gallery 1">
        <img src="{{ asset('image/priority_causes/Anti_Child_Labor_Campaign.jpg') }}" alt="Gallery 2">
        <img src="{{ asset('image/priority_causes/senior_Citizen_Care.jpg') }}" alt="Gallery 3">
        <img src="{{ asset('image/social services 1.jpg') }}" alt="Gallery 4">
        <img src="{{ asset('image/eco volunteer.jpg') }}" alt="Gallery 5">
        <img src="{{ asset('image/flood rescue.jpg') }}" alt="Gallery 6">
      </div>
    </div>

  </div>

  <div class="copyright">
    &copy; 2025 Helping Hands Foundation. All Rights Reserved.
  </div>
</footer>