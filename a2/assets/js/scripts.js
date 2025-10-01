document.addEventListener("DOMContentLoaded", function () {
    const galleryImages = document.querySelectorAll('[data-bs-target="#imageModal"]');
    const modalImage = document.getElementById('modalImage');

    galleryImages.forEach(img => {
      img.addEventListener('click', () => {
        const src = img.getAttribute('data-img');
        modalImage.src = src;
      });
    });
const fileInput = document.getElementById('skillImage');
const errorMsg = document.getElementById('errorMsg');

fileInput.addEventListener('change', function () {
    errorMsg.style.display = 'none'; 

    if (!this.value.match(/.(jpg|jpeg|png|gif|webp|svg)$/i)) {
        errorMsg.style.display = 'block';
        this.value = ''; 
    }
});
});
