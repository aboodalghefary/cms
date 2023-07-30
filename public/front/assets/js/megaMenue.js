function displayNewsItems(libraries_most_views) {
   const fourCategoryNews = $('.four-category-news');
   fourCategoryNews.empty(); 

   libraries_most_views.forEach(item => {
     const newItem = `
       <div style="width: 260px;" class="card">
         <div class="lay">
           <img style="height: 155px" class="card-img-top" src="${item.image}" alt="">
           <a href="#" style="display: flex; align-items: center; justify-content: center;" class="overlayy overlayFade">
             <i style="display: block; color: white; font-size: 25px;" class="fa-solid fa-link-simple"></i>
           </a>
         </div>
         <a href="#" class="card-body">
           <h6 class="text-right text-white">${item.title}</h6>
         </a>
         <div class="text-white-50 text-right">
           <span class="date">${item.updated_at}</span>
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
       const libraries_most_views = data.libraries_most_views;
       displayNewsItems(libraries_most_views);
     },
     error: function(error) {
       console.error('Error fetching data:', error);
     }
   });
 }

 const categoryNumber1 = $('.mega-menue .category-right ul li[data-category="1"]');
 categoryNumber1.trigger('mouseenter');

 $('.mega-menue .category-right ul li').on('mouseenter', handleListItemMouseEnter);
