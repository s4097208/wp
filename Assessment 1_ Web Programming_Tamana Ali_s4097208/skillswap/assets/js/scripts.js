document.addEventListener("DOMContentLoaded", function () {
  const fileInput = document.querySelector('input[type="file"]');
  fileInput.addEventListener("change", function () {
    const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp)$/i;
    if (!allowedExtensions.exec(fileInput.value)) {
      alert("Only JPG, JPEG, PNG, GIF, or WEBP files are allowed.");
      fileInput.value = "";
    }
  });
});
