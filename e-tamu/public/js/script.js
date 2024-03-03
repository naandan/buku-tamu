let menu = document.querySelector(".menu");
let sideMenu = document.querySelector(".side-menu");
menu.addEventListener("click", function () {
  menu.classList.toggle("active");
  sideMenu.classList.toggle("hidden");
});

function grafik() {
  window.open("grafik.php", "DUMET School", "height=700, width=1000, scrollbars=yes");
}

// Animate
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("img");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.opacity = "0";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex - 1].style.opacity = "1";
  dots[slideIndex - 1].className += " active";
}

let autoplayInterval = setInterval(function () {
  document.getElementById("next").click();
}, 5000);

const dropZone = document.querySelector("#drop-zone");
const inputElement = document.querySelector("#drop-zone input");
const img = document.querySelector("#drop-zone img");
let p = document.querySelector("#drop-zone p");
inputElement.addEventListener("change", function (e) {
  const clickFile = this.files[0];
  if (clickFile) {
    img.style = "display:block;";
    p.style = "display: none";
    dropZone.style = "height: fit-content";
    const reader = new FileReader();
    reader.readAsDataURL(clickFile);
    reader.onloadend = function () {
      const result = reader.result;
      let src = this.result;
      img.src = src;
      img.alt = clickFile.name;
    };
  }
});
dropZone.addEventListener("click", () => inputElement.click());
dropZone.addEventListener("dragover", (e) => {
  e.preventDefault();
});
dropZone.addEventListener("drop", (e) => {
  e.preventDefault();
  img.style = "display:block;";
  let file = e.dataTransfer.files[0];
  const reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onloadend = function () {
    e.preventDefault();
    p.style = "display: none";
    dropZone.style = "height: fit-content";
    let src = this.result;
    img.src = src;
    img.alt = file.name;
  };
});

const alert = document.querySelector(".alert span");
alert.addEventListener("click", (e) => {
  e.target.parentElement.classList.toggle("alert-active");
});
