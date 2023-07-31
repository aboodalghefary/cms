

var parent_category = document.querySelectorAll(".nav-link.parent_category");

parent_category.forEach((parent) => {
   var category = $(parent).data("category");
   parent.addEventListener("mouseenter", (_) => {
      var megaMenu = document.querySelector(
         `.mega-menue[data-category='${category}']`
      );
      var container = megaMenu.querySelector(".four-category-news");
      $.ajax({
         url: `/get_last_news_ajax/${category}`,
         type: "GET",
         dataType: "json",
         success: function (data) {
            var posts = data.posts;
            container.innerHTML = "";
            posts.forEach((post) => {
               var formattedDate = new Date(post.updated_at).toLocaleDateString(
                  "en-US"
               );
               var imageSrc = "storage/images/blog/" + post.image;
               var newItem = `
                       <div class="card">
                           <div class="lay">
                               <img style="height: 145px" class="card-img-top" src="${imageSrc}" alt="">
                               <a href="#" style="display: flex; align-items: center;    border-radius: 35px !important;
                               justify-content: center;" class="overlayy overlayFade">
                                   <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
                               </a>
                           </div>
                           <a href="#" class="card-body">
                               <h6 class="text-right text-white mr-2">${post.name}</h6>
                           </a>
                           <div class="text-white-50 text-right">
                               <span class="date mr-2">${formattedDate}</span>
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

var subCategoryLinks = document.querySelectorAll(".sub-category-link");

subCategoryLinks.forEach((link) => {
    var category = $(link).data("category");
    link.addEventListener("mouseenter", (_) => {
        var megaMenu = document.querySelector(
            `.mega-menue[data-category='${category}']`
        );
        var container = megaMenu.querySelector(".four-category-news");
        $.ajax({
            url: `/get_last_news_ajax/${category}`,
            type: "GET",
            dataType: "json",
            success: function (data) {
                var posts = data.posts;
                container.innerHTML = "";
                posts.forEach((post) => {
                    var formattedDate = new Date(post.updated_at).toLocaleDateString(
                        "en-US"
                    );
                    var imageSrc = "storage/images/blog/" + post.image;
                    var newItem = `
                        <div class="card">
                            <!-- HTML structure for the news item -->
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
