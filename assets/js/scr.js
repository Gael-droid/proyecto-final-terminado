
  const imageLinks = [
    "https://www.xtrafondos.com/wallpapers/burbujas-rojas-abstractas-5368.jpg",
    "https://www.xtrafondos.com/wallpapers/logo-de-razer-colorido-5389.jpg",
    "https://www.xtrafondos.com/wallpapers/carretera-triangulos-3150.jpg",
  ];
  
  const slides = document.querySelectorAll(".slide");
  const prevButton = document.getElementById("prev");
  const nextButton = document.getElementById("next");
  let currentSlide = 0;
  let autoSlideInterval; 
  
  function showSlide(n) {
    slides[currentSlide].classList.remove("active");
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.add("active");
  }
  
  function prevSlide() {
    showSlide(currentSlide - 1);
    resetAutoSlide(); 
  }
  
  function nextSlide() {
    showSlide(currentSlide + 1);
    resetAutoSlide(); 
  }
  
  function autoSlide() {
    nextSlide();
  }
  
  function resetAutoSlide() {
    clearInterval(autoSlideInterval); 
    autoSlideInterval = setInterval(autoSlide, 5000); 
  }
  
  prevButton.addEventListener("click", prevSlide);
  nextButton.addEventListener("click", nextSlide);
  
 
  for (let i = 0; i < slides.length; i++) {
    const img = new Image();
    img.src = imageLinks[i];
    img.alt = "Imagen " + (i + 1);
    slides[i].appendChild(img);
  }
  
  showSlide(currentSlide);
  resetAutoSlide(); 
  