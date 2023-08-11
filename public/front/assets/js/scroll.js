window.addEventListener("scroll" , function () {
 var header = document.querySelector("header");
 header.classList.toggle("sticky" , window.scrollY > 0);

})

window.addEventListener("scroll", function () {
   if (window.scrollY > 600) {
     document.querySelector(".scroll-top").classList.remove("not-visible");
   } else {
     document.querySelector(".scroll-top").classList.add("not-visible");
   }
 });

 document.querySelector(".scroll-top").addEventListener("click", function (event) {
   event.preventDefault();
   scrollToTop(1000);
 });

 function scrollToTop(duration) {
   const startingY = window.scrollY;
   const startTime = performance.now();

   function step(timestamp) {
     const currentTime = timestamp || performance.now();
     const elapsed = currentTime - startTime;
     const progress = Math.min(elapsed / duration, 1);

     window.scrollTo(0, startingY * (1 - progress));

     if (progress < 1) {
       window.requestAnimationFrame(step);
     }
   }

   window.requestAnimationFrame(step);
 }


    