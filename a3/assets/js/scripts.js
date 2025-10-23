document.addEventListener("DOMContentLoaded", function () {
  const modalImage = document.getElementById("modalImage");
  const images = document.querySelectorAll('[data-bs-target="#imageModal"]');

  images.forEach((img) => {
    img.addEventListener("click", function () {
      modalImage.src = this.src;
    });
  });

  const fileInput = document.getElementById("skillImage");
  const errorMsg = document.getElementById("errorMsg");

  fileInput.addEventListener("change", function () {
    errorMsg.style.display = "none";

    if (!this.value.match(/\.(jpg|jpeg|png|gif|webp|svg)$/i)) {
      errorMsg.style.display = "block";
      this.value = "";
    }
  });
});