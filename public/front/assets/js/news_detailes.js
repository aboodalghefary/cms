var motaleqatContainer = document.querySelector(".news-more-container");
var categoryName = $(motaleqatContainer).data("category-name");
$.ajax({
   url: `/get_last_news_ajax_by_name/${categoryName}`,
   type: "GET",
   dataType: "json",
   success: function (data) {
      var posts = data.posts;
      motaleqatContainer.innerHTML = "";

      posts.forEach((post) => {
         var newsLink = `/post_details/${post.id}`;
         var newItem = `
                  <div class="news-more d-flex align-items-center px-4 py-4 border ">
                     <i class="fa-regular fa-arrow-left"></i>
                     <span class="mr-3"> <a href="${newsLink}"> ${post.name} </a></span>
                  </div>
             `;
         motaleqatContainer.innerHTML += newItem;
      });
   },
   error: function (error) {
      console.error("Error fetching data:", error);
   },
});
