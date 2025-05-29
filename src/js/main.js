import Swiper from "swiper";
import { Navigation } from "swiper/modules";
import Choices from "choices.js";

document.addEventListener("DOMContentLoaded", () => {
  const services = document.querySelector(".services");
  const certificatesSlider = document.querySelector(".certificates__slider");
  const reviewsSlider = document.querySelector(".reviews__slider");
  const questionsItems = document.querySelector(".questions__items");
  const footerBtnScrollUp = document.querySelector(".footer__scroll-up");
  const serviceCertificatesSlider = document.querySelector(
    ".service-certificates__slider"
  );
  const reviewsFormFile = document.getElementById("reviews-form-file");
  const reviewsFormServiceChoices = document.querySelector(
    ".reviews-form__service-choices"
  );
  const reviewsFormElem = document.querySelector(".reviews-form__elem");
  const previewContainer = document.querySelector(
    ".reviews-form__file-preview"
  );

  const bntListServices = document.querySelectorAll(
    '[data-service]'
  );

  const popupOpenBtns = document.querySelectorAll("[data-popup]");
  const closeBtnsList = document.querySelectorAll(".form-popup__close");

  bntListServices.forEach((btnService) => {
    btnService.addEventListener("click", (event) => {
      const target = event.target;
      const service = target.dataset.service;
      const id = target.dataset.popup;
      if (!service || !id) return;
      const popup = document.getElementById(id);
      if (!popup) return;
      const form = popup.querySelector('form');
      if (!form) return;
      const checkInputService = form.querySelector('.form-popup__input--service');
      if (checkInputService) {
        checkInputService.value = service;
      } else {
        const input = document.createElement('input');
        input.type = 'text';
        input.disabled = true;
        input.classList.add('form-popup__input', 'form-popup__input--service')
        input.value = service;
        form.prepend(input);
        console.log(input);
      }
    });
  });

  popupOpenBtns.forEach((btnOpen) => {
    btnOpen.addEventListener("click", (event) => {
      const target = event.target;
      const id = target.dataset.popup;
      if (!id) return;
      const popup = document.getElementById(id);
      popup.classList.add("active");
      document.body.style.overflow = 'hidden';
    });
  });

  closeBtnsList.forEach((btnClose) => {
    btnClose.addEventListener("click", (event) => {
      const target = event.target;
      const form = target.closest(".form-popup");
      form.classList.remove("active");
       document.body.style.overflow = null;
    });
  });

  if (services) {
    services.addEventListener("click", (event) => {
      const target = event.target;
      if (target.closest(".services__elem-title")) {
        const titleElem = target.closest(".services__elem-title");
        const parent = target.closest(".services__elem");
        const elemDropdown = parent.querySelector(".services__elem-drop");
        elemDropdown.classList.toggle("active");
        titleElem.classList.toggle("active");
      }
    });
  }

  if (certificatesSlider) {
    new Swiper(certificatesSlider, {
      modules: [Navigation],
      slidesPerView: "auto",
      spaceBetween: 15,
      navigation: {
        nextEl: ".certificates__slider-next",
        prevEl: ".certificates__slider-prev",
      },
      breakpoints: {
        451: {
          spaceBetween: 24,
        },
      },
    });
  }

  if (reviewsSlider) {
    new Swiper(reviewsSlider, {
      modules: [Navigation],
      slidesPerView: "auto",
      spaceBetween: 24,
      autoHeight: true,
      navigation: {
        nextEl: ".reviews__btn-next",
        prevEl: ".reviews__btn-prev",
      },
      breakpoints: {
        601: {
          autoHeight: false,
        },
      },
    });
  }

  if (questionsItems) {
    questionsItems.addEventListener("click", (event) => {
      const target = event.target;
      if (target.closest(".questions__item-title")) {
        const parent = target.closest(".questions__item");
        const btnElem = parent.querySelector(".questions__item-btn");
        const elemDropdown = parent.querySelector(".questions__item-drop");
        elemDropdown.classList.toggle("active");
        btnElem.classList.toggle("active");
      }
    });
  }

  if (footerBtnScrollUp) {
    footerBtnScrollUp.addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });
  }

  if (serviceCertificatesSlider) {
    new Swiper(serviceCertificatesSlider, {
      loop: true,
      slidesPerView: 2,
      spaceBetween: 24,
      modules: [Navigation],
      navigation: {
        nextEl: ".service-certificates__btn-next",
        prevEl: ".service-certificates__btn-prev",
      },
    });
  }

  if (reviewsFormFile) {
    reviewsFormFile.addEventListener("change", (event) => {
      const files = event.target.files;
      previewContainer.innerHTML = "";

      Array.from(files).forEach((file) => {
        if (!file.type.startsWith("image/")) return;

        const reader = new FileReader();
        reader.onload = function (e) {
          const img = document.createElement("img");
          img.src = e.target.result;
          img.style.maxWidth = "120px";
          img.style.marginRight = "10px";
          img.style.marginBottom = "10px";
          img.style.borderRadius = "8px";
          img.alt = file.name;
          previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
      });
    });
  }

  if (reviewsFormServiceChoices) {
    const choices = new Choices(reviewsFormServiceChoices, {
      searchEnabled: false,
      itemSelectText: "Нажмите для выбора",
      shouldSort: false,
      placeholder: true,
    });
  }

  const reviewsFormStarList = document.querySelectorAll(".reviews-form__star");

  if (reviewsFormStarList) {
    const radios = document.querySelectorAll('input[name="rating"]');

    reviewsFormStarList.forEach((star, index) => {
      star.addEventListener("click", () => {
        radios[index].checked = true;
        reviewsFormStarList.forEach((l, i) =>
          l.classList.toggle("reviews-form__star--filled", i <= index)
        );
      });
    });
  }

  if (reviewsFormElem) {
    reviewsFormElem.addEventListener("submit", async (e) => {
      e.preventDefault();
      const ajaxUrl = reviewsFormElem.dataset.url;
      const formData = new FormData(reviewsFormElem);
      console.log(formData.get("files[]"));
      formData.append("action", "submit_service_review");

      try {
        const response = await fetch(ajaxUrl, {
          method: "POST",
          body: formData,
        });
        const result = await response.json();
        if (result.success) {
          alert("Спасибо за отзыв!");
          reviewsFormElem.reset();
          previewContainer.innerHTML = "";
        } else {
          alert(result.data || "Произошла ошибка. Повторите попытку позже.");
        }
      } catch (err) {
        console.error("AJAX error:", err);
        alert("Ошибка сети. Попробуйте позже.");
      }
    });
  }
});
