var parent_category = document.querySelectorAll(".nav-link.parent_category");

parent_category.forEach((parent) => {
   var category = $(parent).data("category");
   parent.addEventListener("mouseenter", (_) => {
      var megaMenu = document.querySelector(
         `.mega-menue[data-category='${category}']`
      );
      var container = megaMenu.querySelector(".four-category-news");
      var loader = container.querySelector(".loader");
      loader.style.display = "inline-block";

      $.ajax({
         url: `/get_last_news_ajax/${category}`,
         type: "GET",
         dataType: "json",
         success: function (data) {
            loader.style.display = "none";
            var posts = data.posts;
            container.innerHTML = "";
            posts.map((post, index) => {
               var formattedDate = new Date(post.updated_at).toLocaleDateString("en-US");
               var newsLink = `/post_details/${post.id}`;
               var imageSrc = "/storage/images/blog/" + post.image;

               var animationDelay = (index + 1) * 250;

               var newItem = `
                   <div class="card animate__animated animate__fadeInUp" style="animation-delay: ${animationDelay}ms;">
                       <div class="lay">
                           <img style="height: 145px" class="card-img-top" src="${imageSrc}" alt="">
                           <a href="${newsLink}" style="display: flex; align-items: center; border-radius: 35px !important; justify-content: center;" class="overlayy overlayFade">
                               <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                           </a>
                       </div>
                       <a href="${newsLink}" class="card-body">
                           <h6 class="text-right text-white ">${post.name}</h6>
                       </a>
                       <div class="text-white-50 text-right">
                           <span class="date ">${formattedDate}</span>
                       </div>
                   </div>
               `;
               container.innerHTML += newItem;
           });
         },
         error: function (error) {
            console.error("Error fetching data:", error);
            loader.style.display = "none";

         },
      });
   });
});

document.addEventListener("DOMContentLoaded", function () {
   var subCategoryLinks = document.querySelectorAll(".sub-catttt");
   subCategoryLinks.forEach((link) => {
       var sub_category_id = $(link).data("category");
       link.addEventListener("mouseenter", (_) => {
           var megaMenu = link.closest(".mega-menue");
           var container = megaMenu.querySelector(".four-category-news");
         //   var loader = container.querySelector(".loader");
         //   loader.style.display = "block";
           $.ajax({
               url: `/get_last_news_ajax/${sub_category_id}`,
               type: "GET",
               dataType: "json",
               success: function (data) {
                  //  loader.style.display = "none";
                   container.innerHTML = "";
                   var posts = data.posts;
                   posts.map((post, index) => {
                       var formattedDate = new Date(post.updated_at).toLocaleDateString("en-US");
                       var newsLink = `/post_details/${post.id}`;
                       var imageSrc = "/storage/images/blog/" + post.image;

                       var animationDelay = (index + 1) * 250;

                       var newItem = `
                           <div class="card animate__animated animate__fadeInUp" style="animation-delay: ${animationDelay}ms;">
                               <div class="lay">
                                   <img style="height: 145px" class="card-img-top" src="${imageSrc}" alt="">
                                   <a href="${newsLink}" style="display: flex; align-items: center; border-radius: 35px !important; justify-content: center;" class="overlayy overlayFade">
                                       <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                                   </a>
                               </div>
                               <a href="${newsLink}" class="card-body">
                                   <h6 class="text-right text-white ">${post.name}</h6>
                               </a>
                               <div class="text-white-50 text-right">
                                   <span class="date ">${formattedDate}</span>
                               </div>
                           </div>
                       `;
                       container.innerHTML += newItem;
                   });

               },
               error: function (error) {
                   console.error("Error fetching data:", error);
               },
           });
       });
   });
});
$(".mega-menue .category-right ul li").on("mouseenter", function (event) {
   const listItems = $(".mega-menue .category-right ul li");
   listItems.removeClass("active");
   $(this).addClass("active");
});
