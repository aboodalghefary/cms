  function handleListItemMouseEnter(event) {
   const listItems = document.querySelectorAll('.mega-menue .category-right ul li');
   listItems.forEach((item) => {
     item.classList.remove('active');
   });
   event.currentTarget.classList.add('active');
   const fourCategoryNews = document.querySelector('.four-category-news');

   // لسا ضايل هان شغل , يستكمل غدا ان شاءاله
   fourCategoryNews.innerHTML = '';
   const newItem = `
   <div style="width: 260px;" class=" card">
   <div class="lay">
       <img style="height: 155px" class="card-img-top"
           src="{{ asset('front/assets/images/2.jpg') }}" alt="">
       <a href="#"
           style="display: flex; align-items: center; justify-content: center;"
           class="overlayy overlayFade">
           <i style="display: block; color: white; font-size: 25px;"
               class="fa-solid fa-link-simple"></i>
       </a>
   </div>
   <a href="# " class="card-body">
       <h6 class=" text-right text-white">
           مستوطنون يحاولون سرقة أغنام المواطنين في تجمع عرب المليحات غرب أريحا
       </h6>
   </a>
   <div class=" text-white-50  text-right">
       <span class="date">22/2/200 </span>
   </div>
</div>
<div style="width: 260px;" class=" card">
   <div class="lay">
       <img style="height: 155px" class="card-img-top"
           src="{{ asset('front/assets/images/2.jpg') }}" alt="">
       <a href="#"
           style="display: flex; align-items: center; justify-content: center;"
           class="overlayy overlayFade">
           <i style="display: block; color: white; font-size: 25px;"
               class="fa-solid fa-link-simple"></i>
       </a>
   </div>
   <a href="# " class="card-body">
       <h6 class=" text-right text-white">
           مستوطنون يحاولون سرقة أغنام المواطنين في تجمع عرب المليحات غرب أريحا
       </h6>
   </a>
   <div class=" text-white-50  text-right">
       <span class="date">22/2/200 </span>
   </div>
</div>
<div style="width: 260px;" class=" card">
   <div class="lay">
       <img style="height: 155px" class="card-img-top"
           src="{{ asset('front/assets/images/2.jpg') }}" alt="">
       <a href="#"
           style="display: flex; align-items: center; justify-content: center;"
           class="overlayy overlayFade">
           <i style="display: block; color: white; font-size: 25px;"
               class="fa-solid fa-link-simple"></i>
       </a>
   </div>
   <a href="# " class="card-body">
       <h6 class=" text-right text-white">
           مستوطنون يحاولون سرقة أغنام المواطنين في تجمع عرب المليحات غرب أريحا
       </h6>
   </a>
   <div class=" text-white-50  text-right">
       <span class="date">22/2/200 </span>
   </div>
</div>
<div style="width: 260px;" class=" card">
   <div class="lay">
       <img style="height: 155px" class="card-img-top"
           src="{{ asset('front/assets/images/2.jpg') }}" alt="">
       <a href="#"
           style="display: flex; align-items: center; justify-content: center;"
           class="overlayy overlayFade">
           <i style="display: block; color: white; font-size: 25px;"
               class="fa-solid fa-link-simple"></i>
       </a>
   </div>
   <a href="# " class="card-body">
       <h6 class=" text-right text-white">
           مستوطنون يحاولون سرقة أغنام المواطنين في تجمع عرب المليحات غرب أريحا
       </h6>
   </a>
   <div class=" text-white-50  text-right">
       <span class="date">22/2/200 </span>
   </div>
</div>
   `;
   // لسا ضايل هان شغل , يستكمل غدا ان شاءاله

   fourCategoryNews.insertAdjacentHTML('beforeend', newItem);
 }

 const listItems = document.querySelectorAll('.mega-menue .category-right ul li');
 listItems.forEach((item) => {
   item.addEventListener('mouseenter', handleListItemMouseEnter);
 });

