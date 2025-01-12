let files = [];
let dropArea = document.querySelector(".pictures-droparea");
let pictures_input = document.getElementById("product_pictures");
let pictures_container = document.getElementById("pictures_preview");

pictures_input.addEventListener("change", function (e) {
  let file = pictures_input.files;
  for (let index = 0; index < file.length; index++) {
    if (!alreadyExist(file[index])) files.push(file[index]);
  }

  pictures_input.value = null;
  showImages();
});

// CHECK IF SELECTED IMAGE ALREADY EXIST
function alreadyExist(image) {
  let exist = false;
  if (files.length > 0) {
    files.forEach((item) => {
      if (item.name === image.name) {
        exist = true;
      }
    });
  }

  return exist;
}

dropArea.addEventListener("click", (e) => {
  pictures_input.click();
});

dropArea.addEventListener("dragover", (e) => {
  e.preventDefault();

  //   console.log(e.dataTransfer);
  e.dataTransfer.dropEffect = "copy";
  dropArea.classList.add("drag-over");
});

dropArea.addEventListener("dragleave", (e) => {
  dropArea.classList.remove("drag-over");
});

dropArea.addEventListener("drop", handleDrop, false);

function handleDrop(e) {
  e.preventDefault();
  dropArea.classList.remove("drag-over");
  let file = e.dataTransfer.files;

  for (let index = 0; index < file.length; index++) {
    if (!alreadyExist(file[index])) files.push(file[index]);
  }

  showImages();
}

// SHOW IMAGES FUNCTION
function showImages() {
  let images = "";
  files.forEach((element, i) => {
    images += `<div class="single-picture">
    <img
      width="100"
      height="100"
      src="${URL.createObjectURL(element)}"
      alt="product-image" />
    <a
      class="delete-picture"
      id="delete-picture"
      onclick="deleteImage(${i})"
      title="إزالة هذه الصورة">
      <i class="bi bi-dash-circle-fill"></i>
    </a>
  </div>`;
  });

  if (files.length == 0) images = " لم يتم اختيار اي صور جديدة";

  pictures_container.innerHTML = images;
  console.log(files);
}

// delete image function
function deleteImage(image) {
  files.splice(image, 1);
  showImages();
}
