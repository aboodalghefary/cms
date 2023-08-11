let gallery = document.querySelector(".gallery");
lightGallery(gallery, {
   plugins: [lgFullscreen, lgShare, lgZoom, lgThumbnail], // Include the lgThumbnail plugin
   controls: true,
   counter: true,
   download: false,
   autoplay: true,
   autoplaySpeed: 1000,
   pauseOnHover: true,
   getThumbContHeight: function () {
      return 100; // Adjust the height of the thumbnail container as needed
   },
   thumbWidth: 100, // Adjust the width of each thumbnail as needed
   thumbHeight: "80px", // Adjust the height of each thumbnail as needed
   thumbMargin: 10, // Adjust the margin between thumbnails as needed
   thumbContHeight: 120, // Adjust the height of the thumbnail container as needed
});
let main__video = document.querySelector(".main-video");
let first__video = document.querySelector(".videoooo");
main__video.querySelector("iframe").src = first__video.dataset.src;

const getHoverDirection = function (event) {
   var directions = ["top", "right", "bottom", "left"];
   var item = event.currentTarget;

   var w = item.offsetWidth;
   var h = item.offsetHeight;

   var x =
      (event.clientX - item.getBoundingClientRect().left - w / 2) *
      (w > h ? h / w : 1);
   var y =
      (event.clientY - item.getBoundingClientRect().top - h / 2) *
      (h > w ? w / h : 1);

   var d = Math.round(Math.atan2(y, x) / 1.57079633 + 5) % 4;

   return directions[d];
};
document.addEventListener("DOMContentLoaded", function (event) {
   // Loop over items (in a IE11 compatible way).
   var items = document.getElementsByClassName("hover");
   for (var i = 0; i < items.length; i++) {
      // Loop over the registered event types.
      ["mouseenter", "mouseleave"].forEach(function (eventname) {
         items[i].addEventListener(
            eventname,
            function (event) {
               // Retrieve the direction of the enter/leave event.
               var dir = getHoverDirection(event);

               // Reset classes.
               // event.currentTarget.className = 'item hover';
               // > If support for IE11 is not needed.
               // event.currentTarget.classList.remove('mouseenter', 'mouseleave', 'top', 'right', 'bottom', 'left');
               // > If support for IE11 is needed.
               event.currentTarget.classList.remove("mouseenter");
               event.currentTarget.classList.remove("mouseleave");
               event.currentTarget.classList.remove("top");
               event.currentTarget.classList.remove("right");
               event.currentTarget.classList.remove("bottom");
               event.currentTarget.classList.remove("left");

               // Add the event and direction classes.
               // > If support for IE11 is not needed.
               // event.currentTarget.classList.add(event.type, dir);
               // > If support for IE11 is needed.
               event.currentTarget.className += " " + event.type + " " + dir;
            },
            false
         );
      });
   }
});
