<?php
include 'header.php';
?>
<style>
    /* Gallery Styles */
.gallery_container {
  max-width: 1200px;
  margin: 0 auto;
}

@media (min-width: 1300px) and (max-width: 2560px) {
  .popup-gallery {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
  }
}

@media (min-width: 700px) and (max-width: 1299px) {
  .popup-gallery {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
  }
}

@media (min-width: 300px) and (max-width: 699px) {
  .popup-gallery {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 5px;
  }
}

.gallery_item {
  margin-bottom: 5px;
  overflow: hidden;
}

.popup-gallery a {
  display: block;
  width: 100%;
  border: 1px solid #fff;
  overflow: hidden;
  transition: transform 0.3s ease, border-color 0.3s ease;
}

.popup-gallery a:hover {
  transform: scale(1.05);
  border-color: #fff;
}

.popup-gallery img {
  display: block;
  width: 100%;
  object-fit: cover;
  min-height: 250px;
  max-height: 250px;
}

@media only screen and (max-width: 1000px) {
  .popup-gallery img {
    min-height: 150px;
    max-height: 150px;
  }
}

/* END  */

.singicon_btn_nlf {
  position: absolute;
  top: 44%;
  bottom: 56%;
  left: 44%;
  right: 56%;
  opacity: 0;
}

.singicon_btn_nlf svg {
  color: #fff;
}

.popup-gallery a:hover .singicon_btn_nlf {
  opacity: 1;
}

.hover_affect_nlf:hover img {
  opacity: 0.5;
}

</style>
<!-- popup style link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.2.0/magnific-popup.css" integrity="sha512-UhvuUthI9VM4N3ZJ5o1lZgj2zNtANzr3zyucuZZDy67BO6Ep5+rJN2PST7kPj+fOI7M/7wVeYaSaaAICmIQ4sQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- jQuery Links -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- gallery section  -->
<div class="gallery_container">
  <div class="popup-gallery">
    <div class="gallery_item">
      <a class="hover_affect_nlf position-relative" href="assets/images/gallery1.jpeg" title="Image 1">
        <img src="assets/images/gallery1.jpeg" alt="Thumbnail 1">
        <span class="singicon_btn_nlf">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </a>
    </div>
    <div class="gallery_item">
      <a class="hover_affect_nlf position-relative" href="assets/images/gallery2.jpeg" title="Image 2">
        <img src="assets/images/gallery2.jpeg" alt="Thumbnail 2">
        <span class="singicon_btn_nlf">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </a>
    </div>
    <div class="gallery_item">
      <a class="hover_affect_nlf position-relative" href="assets/images/gallery3.jpeg" title="Image 3">

        <img src="assets/images/gallery3.jpeg" alt="Thumbnail 3">
        <span class="singicon_btn_nlf">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </a>
    </div>
    <div class="gallery_item">
      <a class="hover_affect_nlf position-relative" href="assets/images/gallery4.jpeg" title="Image 4">
        <img src="assets/images/gallery4.jpeg" alt="Thumbnail 4">
        <span class="singicon_btn_nlf">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </a>
    </div>
    <div class="gallery_item">
      <a class="hover_affect_nlf position-relative" href="assets/images/2.jpeg" title="Image 4">
        <img src="assets/images/2.jpeg" alt="Thumbnail 4">
        <span class="singicon_btn_nlf">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </a>
    </div>
    
    
    <div class="gallery_item">
      <a class="hover_affect_nlf position-relative" href="assets/images/gallery6.jpeg" title="Image 4">
        <img src="assets/images/gallery6.jpeg" alt="Thumbnail 4">
        <span class="singicon_btn_nlf">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </a>
    </div>
    <div class="gallery_item">
      <a class="hover_affect_nlf position-relative" href="assets/images/gallery7.jpeg" title="Image 4">
        <img src="assets/images/gallery7.jpeg" alt="Thumbnail 4">
        <span class="singicon_btn_nlf">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </a>
    </div>
    <div class="gallery_item">
      <a class="hover_affect_nlf position-relative" href="assets/images/gallery8.jpeg" title="Image 4">
        <img src="assets/images/gallery8.jpeg" alt="Thumbnail 4">
        <span class="singicon_btn_nlf">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
          </svg>
        </span>
      </a>
    </div>
  </div>
</div>

<!-- popup scripts link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>








<script>
    // popup-gallery
jQuery(document).ready(function ($) {
  $(".popup-gallery").magnificPopup({
    delegate: "a",
    type: "image",
    tLoading: "Loading image #%curr%...",
    mainClass: "mfp-img-mobile",
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1] // Preload previous and next images
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function (item) {
        return item.el.attr("title") || "";
      }
    }
  });
});

</script>
<?php
include 'footer.php';
?>