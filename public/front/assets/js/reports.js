var reportsContainer = document.querySelector(".reportsContainer");
var categoryName = $(reportsContainer).data("category-name");
$.ajax({
   url: `/get_last_news_ajax_by_name/${categoryName}`,
   type: "GET",
   dataType: "json",
   success: function (data) {
      var posts = data.posts;
      reportsContainer.innerHTML = "";

      for (let i = 0; i < 4 && i < posts.length; i++) {
         const post = posts[i];
         var imageSrc = "/storage/images/blog/" + post.image;
         var newsLink = `/post_details/${post.id}`;
         var newItem = `
               <div class="pt-1">
                  <a href="${newsLink}">
                     <div style=" margin-right: 2px; width: 284px; height: 250px; background-image: url(${imageSrc});"
                        class="column position-relative img   ">
                        <div class="text text-right bottom-right text-white ">
                              <h6 class=" text-right"> ${post.name} </h6>
                              <span class="date "> 22/1/2001 </span>
                        </div>
                     </div>
                  </a>
               </div>

         `;
         reportsContainer.innerHTML += newItem;
      }
   },
   error: function (error) {
      console.error("Error fetching data:", error);
   },
});
