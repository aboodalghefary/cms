function displayNewsItems(posts) {
   const fourCategoryNews = $('.four-category-news');
   fourCategoryNews.empty();

   posts.forEach(post => {
     const formattedDate = new Date(post.updated_at).toLocaleDateString('en-US');
     const imageSrc = "storage/images/blog/" + post.image;
     const newItem = `
       <div class="card">
         <div class="lay">
           <img style="height: 125px" class="card-img-top" src="${imageSrc}" alt="">
           <a href="#" style="display: flex; align-items: center; justify-content: center;" class="overlayy overlayFade">
             <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
           </a>
         </div>
         <a href="#" class="card-body">
           <h6 class="text-right text-white">${post.name}</h6>
         </a>
         <div class="text-white-50 text-right">
           <span class="date">${formattedDate}</span>
         </div>
       </div>
     `;
     fourCategoryNews.append(newItem);
   });
 }

 function handleListItemMouseEnter(event) {
   const category = event.currentTarget.dataset.category;
   const listItems = $('.mega-menue .category-right ul li');

   listItems.removeClass('active');
   $(event.currentTarget).addClass('active');

   $.ajax({
     url: `/get_last_news_ajax/${category}`,
     type: 'GET',
     dataType: 'json',
     success: function(data) {
       const posts = data.posts;
       displayNewsItems(posts);
     },
     error: function(error) {
       console.error('Error fetching data:', error);
     }
   });
 }

 $(document).ready(function() {
   const categoryNumber1 = $('.mega-menue .category-right ul li[data-category="1"]');
   const defaultCategoryId = categoryNumber1.data('category');
   const isDefault = categoryNumber1.data('default');

   $.ajax({
     url: `/get_last_news_ajax/${defaultCategoryId}`,
     type: 'GET',
     dataType: 'json',
     success: function(data) {
       const posts = data.posts;
       displayNewsItems(posts);
     },
     error: function(error) {
       console.error('Error fetching data:', error);
     }
   });

   if (isDefault) {
     handleListItemMouseEnter({ currentTarget: categoryNumber1[0] });
   }
 });

 $('.mega-menue .category-right ul li').on('mouseenter', handleListItemMouseEnter);
