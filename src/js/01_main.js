"use strict";

var modals, modalTogglers;
var html = document.querySelector("html");
function closeModals(e, o, t) {
  modalTogglers.forEach(function (e) {
    e.classList.remove("active-modal-button");
  }), modals.forEach(function (e) {
    e.classList.remove("modal--opened"), setTimeout(function () {
      "mobileNav" !== e.id && e.classList.remove("!flex"), o && o(), html.classList.remove("overflow-hidden");
    }, t !== null && t !== void 0 ? t : 300);
  });
}
function openModal(e, o, t) {
  html.classList.add("overflow-hidden"), o.classList.add("!flex"), t.classList.add("active-modal-button"), setTimeout(function () {
    o.classList.add("modal--opened");
  }, 1);
}
function toggleModal(e) {
  e.preventDefault();
  var o = document.getElementById(this.dataset.modal),
    t = e.currentTarget,
    l = t.dataset.modalTransition;
  o.classList.contains("modal--opened") ? closeModals(void 0, void 0, l) : null !== document.querySelector(".modal--opened") ? closeModals(void 0, function () {
    return openModal(e, o, t);
  }) : openModal(e, o, t);
}
var setModals = () => {
  modalTogglers = document.querySelectorAll("[data-modal]"), 
  modals = document.querySelectorAll(".modal");
  const modalsContainer = document.querySelectorAll(".modal > div"), 
  modalsClose = document.querySelectorAll(".modal__close") 
  modalTogglers.forEach(function (e) {
    e.addEventListener("click", toggleModal);
  }), modals.forEach(function (e) {
    e.addEventListener("click", function (e) {
      e.preventDefault(), closeModals();
    });
  }), modalsClose.forEach(function (e) {
    e.addEventListener("click", function (e) {
      e.preventDefault(), closeModals();
    });
  }), modalsContainer.forEach(function (e) {
    e.addEventListener("click", function (e) {
      e.stopPropagation();
    });
  });
};
document.addEventListener("DOMContentLoaded", function () {
  setModals()
  document.querySelectorAll(".accardeon").forEach(function (e) {
    var o = e.querySelectorAll(":scope > .accardeon-item");
    o.forEach(function (e) {
      e.querySelector(".accardeon-item__but").addEventListener("click", function () {
        e.classList.contains("opened") ? e.classList.remove("opened") : (o.forEach(function (e) {
          e.classList.remove("opened");
        }), e.classList.add("opened"));
      });
    });
  });

  const dropDownButs = [...document.querySelectorAll('.drop-down__open')]
  const dropDownLists = [...document.querySelectorAll('.drop-down__list')]

  dropDownButs.forEach((el) => {
    el.addEventListener('click', function(e) {
      e.preventDefault()
      this.closest(".drop-down").classList.toggle('opened')
    })
  })

  dropDownLists.forEach((el) => {
    if(el.querySelectorAll(':scope > a').length < 4){
      el.closest(".drop-down").classList.add('disbled')
    }
  })

  

  const inputPhone = document.querySelectorAll('[name="PHONE"]');

  inputPhone.forEach((el) => {
    IMask(el,  {
      mask: '+{7}(000)000-00-00'
    });
  })

  Fancybox.bind("[data-fancybox]", {
    // Your custom options
  });
 

});
var documentHeight = function documentHeight() {
  document.documentElement.style.setProperty("--doc-height", window.innerHeight + "px");
};
documentHeight(), window.addEventListener("resize", documentHeight);