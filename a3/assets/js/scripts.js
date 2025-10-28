document.addEventListener("DOMContentLoaded", function () {
  const modalImage = document.getElementById("modalImage");
  const images = document.querySelectorAll('[data-bs-target="#imageModal"]');

  const filter = document.getElementById("categoryFilter");
  const items = document.querySelectorAll(".gallery-item");

  images.forEach((img) => {
    img.addEventListener("click", function () {
      modalImage.src = this.src;
    });
  });
  filter.addEventListener("change", function () {
    const selected = this.value;

    items.forEach((item) => {
      const category = item.getAttribute("data-category");
      if (selected === "all" || category === selected) {
        item.style.display = "block";
      } else {
        item.style.display = "none";
      }
    });
  });

  const fileInput = document.getElementById("skillImage");
  const errorMsg = document.getElementById("errorMsg");

  fileInput.addEventListener("change", function () {
    errorMsg.style.display = "none";

    if (!this.value.match(/.(jpg|jpeg|png|gif|webp|svg)$/i)) {
      errorMsg.style.display = "block";
      this.value = "";
    }
  });
});
