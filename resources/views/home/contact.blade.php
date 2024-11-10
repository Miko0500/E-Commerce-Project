
<section class="contact_section layout_padding">
    <div class="container px-0">
    <div class="heading_container heading_center">
                <a class="top-title" href="">
                    <span style="color: #000;">CONTACT DETAILS</span>
                </a>
            </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d239.48238571990592!2d119.92692649983063!3d16.183477652863065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3393c382618bb049%3A0xa8412ba680ab549c!2sSan%20Vicente%2C%20Alaminos%2C%20Pangasinan!5e0!3m2!1sen!2sph!4v1725189939029!5m2!1sen!2sph" width="600" height="450" style="border: 3px solid #000; /* Neon blue border */
    border-radius: 15px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">  
          <div class="contact-info">
            <h3 class="info-heading">Contact Information</h3>
            <ul class="info-list">
                <li><span class="info-label">Name:</span>   Sheena Rivera Gonzalez</li>
                <li><span class="info-label">Email:</span>   shee08autodetailingshop@gmail.com</li>
                <li><span class="info-label">Phone:</span>   09165430188</li>
            </ul>
            <p class="info-description">For inquiries or to explore more products, feel free to reach out to us. We're here to assist you.</p>
          </div>
        </div>
      </div>
    </div>
</section>
@include('home.css')
<style>
    .contact-section {
        background-color: #f9f9f9;
        padding: 50px 0;
        
    }
    .map-responsive {
        overflow: hidden;
        position: relative;
        width: 100%;
        height: 0;
        padding-top: 56.25%; /* Aspect ratio 16:9 */
        
    }
    .map-responsive iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 95%;
        height: 100%;
        
    }
    .contact-info {
        padding: 20px;
        background-color: #fff;
        border: 3px solid #000; /* Neon blue border */
    border-radius: 15px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    .info-heading {
        color: #000;
        font-size: 24px;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: bold;
    }
    .info-list {
        list-style-type: none;
        padding: 0;
        margin-bottom: 20px;
        color: #000;
    }
    .info-list li {
        margin-bottom: 10px;
        font-size: 18px;
        color: #000;
    }
    .info-label {
        font-weight: bold;
        color: #000;
    }
    .info-description {
        font-size: 16px;
        color: #000;
    }
    .top-title{
    
    font-size: 40px;
    font-weight: 600;
    margin: 0;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #000;
  padding: 10px;
  padding-top: -100px;
  margin-top: -70px;
  }
</style>
