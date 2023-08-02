/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */
let lang = document.dir;
if (lang == "rtl") {
   localStorage.removeItem("theme");
   let radios = document.querySelectorAll('[name="main-theme"]');
   radios.forEach((element) => {
      let sideBar = document.querySelector(".offcanvas-body");
      sideBar.firstElementChild.classList.add("d-none");
      element.closest(".list-group").classList.add("d-none");
      element.classList.add("d-none");
   });
}

function openEditModal(element, divName, divID, divHref, divContent) {
   var imageInput = document.querySelector(
      "#modal_form_horizontal .imageInput"
   );
   var hrefInput = document.querySelector("#modal_form_horizontal .hrefInput");
   var contentInput = document.querySelector(
      "#modal_form_horizontal .contentInput"
   );
   var submmitBtn = document.querySelector("#modal_form_horizontal #submit");
   if (divName == "logo") {
      imageInput.classList.remove("d-none");
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "home_ad1") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "home_ad2") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "home_ad3") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "home_ad4") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "home_ad5") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "home_ad6") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "home_ad7") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "home_ad8") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "privacy") {
      contentInput.classList.remove("d-none");
      contentInput.querySelector("#content").innerText = divContent;
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "متعلقات") {
      contentInput.classList.remove("d-none");
      contentInput.querySelector("#content").innerText = divContent;
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "الاخبار الرئيسية") {
      contentInput.classList.remove("d-none");
      contentInput.querySelector("#content").innerText = divContent;
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "اقرا ايضا") {
      contentInput.classList.remove("d-none");
      contentInput.querySelector("#content").innerText = divContent;
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "تقارير خاصة") {
      contentInput.classList.remove("d-none");
      contentInput.querySelector("#content").innerText = divContent;
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
   if (divName == "post_ad1") {
      imageInput.classList.remove("d-none");
      hrefInput.classList.remove("d-none");
      hrefInput.querySelector("input").setAttribute("value", divHref);
      submmitBtn.setAttribute("onclick", `performUpdate(${divID})`);
   }
}
function performUpdate(id) {
   let formData = new FormData();
   formData.append("content", document.getElementById("content").value);
   formData.append("href", document.getElementById("href").value);
   formData.append("image", document.getElementById("image").files[0]);
   storeRedirect("/cms/admin/divs_update/" + id, formData, "/home");
}
