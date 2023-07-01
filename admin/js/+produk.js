function previewImages(event) {
    var container = document.getElementById("image-preview-container");
    container.innerHTML = "";
    if (event.target.files) {
      var files = event.target.files;
      for (var i = 0; i < files.length; i++) {
        var reader = new FileReader();
        reader.onload = function(e) {
          var image = document.createElement("div");
          image.className = "image-preview";
          var img = new Image();
          img.src = e.target.result;
          img.onload = function() {
            image.appendChild(img);
            container.appendChild(image);
          }
          var deleteBtn = document.createElement("div");
          deleteBtn.className = "delete-image";
          deleteBtn.innerHTML = "&times;";
          deleteBtn.addEventListener("click", function() {
            container.removeChild(image);
          });
          image.appendChild(deleteBtn);
        }
        reader.readAsDataURL(files[i]);
      }
    }
  }
  