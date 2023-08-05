let cardOverView = document.querySelector(".modal .overview");
let cardBody = cardOverView.querySelector(".card-body");
function fetchFiles(typeFetch) {
   cardBody.innerHTML = `
         <div class="loader">
            <div class="spinner-grow text-primary me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-success me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-danger me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-warning me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-info me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-light me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-dark" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
         </div>
         `;
   $.ajax({
      url: `/cms/admin/upload_files`,
      type: "GET",
      dataType: "json",
      success: function (data) {
         cardBody.innerHTML = ``;
         var files = data.files;
         cardBody.dataset.type = typeFetch;
         files.map((element, index) => {
            if (
               element.fileType == "image" &&
               (typeFetch == "image" || typeFetch == "all")
            ) {
               let url = "/cms/admin/upload_files/" + element.id;

               var imageSrc =
                  `/storage/files/${element.fileType}/` + element.file;
               cardBody.innerHTML += `
                  <div class="card-file my-2">
                        <div class="card-image">
                           <img class="rounded-3 img"
                              src="${imageSrc}"
                              alt="">
                        </div>
                        <div class="card-image-overlay">
                           <span > ${element.file} </span>
                           <div class="icons d-flex justify-content-center align-items-center">
                              <a href="${
                                 window.location.origin + imageSrc
                              }"  onclick="copyHrefToClipboard(event)" class="text-bg-info rounded-circle"> <i
                                       class="ph-link ph-1x"></i> </a>
                              <a href="#" onclick="destroy('${url}')" class="text-bg-danger rounded-circle"> <i
                                       class="ph-trash ph-1x"></i> </a>
                           </div>
                        </div>
                  </div>
         `;
            }
            if (
               element.fileType == "video" &&
               (typeFetch == "video" || typeFetch == "all")
            ) {
               let url = "/cms/admin/upload_files/" + element.id;

               var videoSrc =
                  `/storage/files/${element.fileType}/` + element.file;
               cardBody.innerHTML += `
                  <div class="card-file my-2">
                        <div class="card-image">
                           <video controls autoplay>
                              <source src="${videoSrc}" type="video/mp4">
                           </video>
                        </div>
                        <div class="card-image-overlay">
                           <span > ${element.file} </span>
                           <div class="icons d-flex justify-content-center align-items-center">
                              <a href="${
                                 window.location.origin + videoSrc
                              }"  onclick="copyHrefToClipboard(event)" class="text-bg-info rounded-circle"> <i
                                       class="ph-link ph-1x"></i> </a>
                              <a href="#" onclick="destroy('${url}')" class="text-bg-danger rounded-circle"> <i
                                       class="ph-trash ph-1x"></i> </a>
                           </div>
                        </div>
                  </div>
         `;
            }
            if (
               element.fileType == "document" &&
               (typeFetch == "document" || typeFetch == "all")
            ) {
               let url = "/cms/admin/upload_files/" + element.id;
               var imageSrc =
                  "https://static.vecteezy.com/system/resources/thumbnails/006/985/849/small/write-document-user-interface-outline-icon-logo-illustration-free-vector.jpg";
               cardBody.innerHTML += `
                  <div class="card-file my-2">
                        <div class="card-image">
                              <img class="rounded-3 img"
                              src="${imageSrc}"
                              alt="">
                        </div>
                        <div class="card-image-overlay">
                           <span > ${element.file} </span>
                           <div class="icons d-flex justify-content-center align-items-center">
                              <a href="${
                                 window.location.origin +
                                 `/storage/files/${element.fileType}/` +
                                 element.file
                              }"  onclick="copyHrefToClipboard(event)" class="text-bg-info rounded-circle"> <i
                                       class="ph-link ph-1x"></i> </a>
                              <a href="#" onclick="destroy('${url}')" class="text-bg-danger rounded-circle"> <i
                                       class="ph-trash ph-1x"></i> </a>
                           </div>
                        </div>
                  </div>
         `;
            }
         });
      },
      error: function (error) {
         console.error("Error fetching data:", error);
         cardBody.querySelector(".loader").classList.add("d-none");
      },
   });
}
function copyHrefToClipboard(event) {
   showAlert("تم نسخ الرابط بنجاح!");

   event.preventDefault();

   var linkElement = event.currentTarget;
   var hrefValue = linkElement.getAttribute("href");

   var clipboardInput = document.getElementById("clipboard-input");
   clipboardInput.value = hrefValue;

   var clipboard = new ClipboardJS(linkElement, {
      target: function (trigger) {
         return clipboardInput;
      },
   });

   clipboardInput.select();
   document.execCommand("copy");
}

function showAlert(message) {
   new Noty({
      text: message,
      type: "alert",
      timeout: 2500,
   }).show();
}
function destroy(url) {
   axios
      .delete(url)
      .then(function (response) {
         console.log(response);
         showMessage(response.data);
         fetchFiles("all");
      })
      .catch(function (error) {
         console.log(error.response);
         showMessage(error.response.response.data);
      })
      .then(function () {
         showMessage(response.data);
      });
}

function fetchFilesAndFetch(typeFetch, dataSearch) {
   cardBody.innerHTML = `
         <div class="loader">
            <div class="spinner-grow text-primary me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-success me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-danger me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-warning me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-info me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-light me-1" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-dark" role="status">
               <span class="visually-hidden">Loading...</span>
            </div>
         </div>
         `;
   $.ajax({
      url: `/cms/admin/search_For_FileHas/${dataSearch}`,
      type: "GET",
      dataType: "json",
      success: function (data) {
         cardBody.innerHTML = ``;
         var files = data.files;
         cardBody.dataset.type = typeFetch;
         console.log(typeFetch);
         files.map((element, index) => {
            if (
               element.fileType == "image" &&
               (typeFetch == "image" || typeFetch == "all")
            ) {
               let url = "/cms/admin/upload_files/" + element.id;

               var imageSrc =
                  `/storage/files/${element.fileType}/` + element.file;
               cardBody.innerHTML += `
                  <div class="card-file my-2">
                        <div class="card-image">
                           <img class="rounded-3 img"
                              src="${imageSrc}"
                              alt="">
                        </div>
                        <div class="card-image-overlay">
                           <span > ${element.file} </span>
                           <div class="icons d-flex justify-content-center align-items-center">
                              <a href="${
                                 window.location.origin + imageSrc
                              }"  onclick="copyHrefToClipboard(event)" class="text-bg-info rounded-circle"> <i
                                       class="ph-link ph-1x"></i> </a>
                              <a href="#" onclick="destroy('${url}')" class="text-bg-danger rounded-circle"> <i
                                       class="ph-trash ph-1x"></i> </a>
                           </div>
                        </div>
                  </div>
         `;
            }
            if (
               element.fileType == "video" &&
               (typeFetch == "video" || typeFetch == "all")
            ) {
               let url = "/cms/admin/upload_files/" + element.id;

               var videoSrc =
                  `/storage/files/${element.fileType}/` + element.file;
               cardBody.innerHTML += `
                  <div class="card-file my-2">
                        <div class="card-image">
                           <video controls autoplay>
                              <source src="${videoSrc}" type="video/mp4">
                           </video>
                        </div>
                        <div class="card-image-overlay">
                           <span > ${element.file} </span>
                           <div class="icons d-flex justify-content-center align-items-center">
                              <a href="${
                                 window.location.origin + videoSrc
                              }"  onclick="copyHrefToClipboard(event)" class="text-bg-info rounded-circle"> <i
                                       class="ph-link ph-1x"></i> </a>
                              <a href="#" onclick="destroy('${url}')" class="text-bg-danger rounded-circle"> <i
                                       class="ph-trash ph-1x"></i> </a>
                           </div>
                        </div>
                  </div>
         `;
            }
            if (
               element.fileType == "document" &&
               (typeFetch == "document" || typeFetch == "all")
            ) {
               let url = "/cms/admin/upload_files/" + element.id;
               var imageSrc =
                  "https://static.vecteezy.com/system/resources/thumbnails/006/985/849/small/write-document-user-interface-outline-icon-logo-illustration-free-vector.jpg";
               cardBody.innerHTML += `
                  <div class="card-file my-2">
                        <div class="card-image">
                              <img class="rounded-3 img"
                              src="${imageSrc}"
                              alt="">
                        </div>
                        <div class="card-image-overlay">
                           <span > ${element.file} </span>
                           <div class="icons d-flex justify-content-center align-items-center">
                              <a href="${
                                 window.location.origin +
                                 `/storage/files/${element.fileType}/` +
                                 element.file
                              }"  onclick="copyHrefToClipboard(event)" class="text-bg-info rounded-circle"> <i
                                       class="ph-link ph-1x"></i> </a>
                              <a href="#" onclick="destroy('${url}')" class="text-bg-danger rounded-circle"> <i
                                       class="ph-trash ph-1x"></i> </a>
                           </div>
                        </div>
                  </div>
         `;
            }
         });
      },
      error: function (error) {
         console.error("Error fetching data:", error);
         cardBody.querySelector(".loader").classList.add("d-none");
      },
   });
}

var searchInput = document.querySelector(".searchForFile");

searchInput.addEventListener("input", (_) => {
   var typeFetch = $(cardBody).data("type");
   var dataSearch = searchInput.value;
   fetchFilesAndFetch(typeFetch, dataSearch);
});
