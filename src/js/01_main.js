let lockScroll, modals, modalTogglers, isDesktop, scrollTop, loadPage;
const html = document.querySelector("html");

function closeModals(_, callback, modalTransition) {
  modalTogglers.forEach((el) => {
    el.classList.remove("active-modal-button");
  });
  modals.forEach((el) => {
    el.classList.remove("modal--opened");
    setTimeout(function () {
      if (el.id !== "mobileNav") {
        el.classList.remove("!flex");
      }
      if (callback) {
        callback();
      }
      lockScroll.start();
      html.classList.remove("overflow-hidden");
    }, modalTransition ?? 300);
  });
}

function openModal(e, target, toggler) {
  lockScroll.stop();
  html.classList.add("overflow-hidden");
  target.classList.add("!flex");
  toggler.classList.add("active-modal-button");
  setTimeout(function () {
    target.classList.add("modal--opened");
  }, 1);
}

function toggleModal(e) {
  e.preventDefault();
  const modal = document.getElementById(this.dataset.modal);
  const toggler = e.currentTarget;
  const modalTransition = toggler.dataset.modalTransition;

  if (!modal.classList.contains("modal--opened")) {
    if (document.querySelector(".modal--opened") !== null) {
      closeModals(undefined, () => openModal(e, modal, toggler));
    } else {
      openModal(e, modal, toggler);
    }
  } else {
    closeModals(undefined, undefined, modalTransition);
  }
}

const setModals = () => {
  modalTogglers = document.querySelectorAll("[data-modal]");
  modals = document.querySelectorAll(".modal");
  modalsContainer = document.querySelectorAll(".modal > div");
  modalsClose = document.querySelectorAll(".modal__close");

  modalTogglers.forEach((el) => {
    el.addEventListener("click", toggleModal);
  });
  modals.forEach((el) => {
    el.addEventListener("click", function (e) {
      e.preventDefault();
      closeModals();
    });
  });
  modalsClose.forEach((el) => {
    el.addEventListener("click", function (e) {
      e.preventDefault();
      closeModals();
    });
  });
  modalsContainer.forEach((el) => {
    el.addEventListener("click", function (e) {
      e.stopPropagation();
    });
  });
};

document.addEventListener("DOMContentLoaded", function () {
  setModals();
  // Scroll
  gsap.registerPlugin(ScrollTrigger, matchMedia);

  const headerNavigation = document.querySelector(".navigation");

  const fakeFooter = document.querySelector(".fake-footer");
  const footer = document.querySelector(".footer");

  lockScroll = new LocomotiveScroll({
    el: document.querySelector("[data-scroll-container]"),
    smooth: true,
    scrollFromAnywhere: false,
    getDirection: true,
    smartphone: {
      breakpoint: 640,
    },
    tablet: {
      breakpoint: 1024,
    },
    // tablet: {
    //   breakpoint: 1280,
    // },
  });


  scrollTop = () => {
    lockScroll.scrollTo(0, {duration: 0});
  }

  isDesktop = html.classList.contains("has-scroll-smooth")

  lockScroll.on("scroll", ScrollTrigger.update);
  // each time Locomotive Scroll updates, tell ScrollTrigger to update too (sync positioning)
  // each time the window updates, we should refresh ScrollTrigger and then update LocomotivelockScroll.
  // tell ScrollTrigger to use these proxy methods for the ".smooth-scroll" element since Locomotive Scroll is hijacking things
  ScrollTrigger.scrollerProxy("[data-scroll-container]", {
    scrollTop(value) {
      return arguments.length
        ? lockScroll.scrollTo(value, { duration: 0, disableLerp: true })
        : lockScroll.scroll.instance.scroll.y;
    }, // we don't have to define a scrollLeft because we're only scrolling vertically.
    getBoundingClientRect() {
      return {
        top: 0,
        left: 0,
        width: window.innerWidth,
        height: window.innerHeight,
      };
    },
    // LocomotiveScroll handles things completely differently on mobile devices - it doesn't even transform the container at all! So to get the correct behavior and avoid jitters, we should pin things with position: fixed on mobile. We sense it by checking to see if there's a transform applied to the container (the LocomotiveScroll-controlled element).
    pinType: isDesktop
      ? "transform"
      : "fixed",
  });
  ScrollTrigger.addEventListener("refresh", () => lockScroll.update());
  ScrollTrigger.defaults({ scroller: "[data-scroll-container]" });


  

  // --- SETUP END ---


  
  loadPage = () => {
    setTimeout(function () {
      scrollTop()
      lockScroll.on("scroll", ({ scroll, direction }) => {
        if (direction === "down") {
          headerNavigation.style.transform = "translateY(-100%)";
        }
        if (direction === "up") {
          headerNavigation.style.transform = "translateY(0)";
        }
      });
      // setTimeout(function () {
      //   lockScroll.on("scroll", ({ scroll, direction }) => {
      //     if (direction === "down") {
      //       headerNavigation.style.transform = "translateY(-100%)";
      //     }
      //     if (direction === "up") {
      //       headerNavigation.style.transform = "translateY(0)";
      //     }
      //   });

      //   ScrollTrigger.refresh();
      // }, 10)
    }, 10)
  }

  //  Scroll end -------------------------------------------------->

  function setFooter() {
    fakeFooter.setAttribute("style", `height: ${footer.clientHeight}px`);
    lockScroll.update();
    ScrollTrigger.refresh();
  }

  setFooter();
  window.addEventListener("resize", function () {
    setFooter();
  });

  //   Animations
  mm = gsap.matchMedia();

  const config = {
    scrollTrigger: {
      trigger: fakeFooter,
      start: "top bottom",
      end: `bottom bottom`,
      scrub: true,
      onEnter: function () {},
      onEnterBack: function () {},
      onLeaveBack: function () {},
      onLeave: function () {},
    },
    y: "0%",
    ease: "linear",
  };

  mm.add("(min-width: 1024px)", () => {
    gsap.fromTo(
      document.querySelector(".footer__text"),
      {
        y: "110%",
      },
      {
        ...config,
      }
    );

    gsap.fromTo(
      document.querySelector(".footer__wordmark"),
      {
        y: "57%",
      },
      {
        ...config,
      }
    );
  });

  const textFromBotAnimation = gsap.utils.toArray('.text-from-bot')

  textFromBotAnimation.forEach((el, i) => {
    gsap.fromTo(el, {
      opacity: 0,
      y: '100px',
    },{
      opacity: 1,
      y: 0,
      // stagger: 0.5,
      ease: "power4.out",
      duration: 0.5,
      scrollTrigger: {
       trigger: el,
       start: 'bottom bottom',
       toggleActions: "restart none none reverse",
      }
     })
  })

  const sticky = gsap.utils.toArray(".sticky-container.sticky-container--mob");

  sticky.forEach((el) => {
    const inner = el.querySelector(".sticky-container__el");

    ScrollTrigger.create({
      trigger: el,
      start: "top top",
      end: "bottom bottom",
      pin: inner,
      pinSpacing: false,
      anticipatePin: 1,
    });
  });

  if (isDesktop) {
    const stickyDesk = gsap.utils.toArray(".sticky-container:not(.sticky-container--mob)");
    
    stickyDesk.forEach((el) => {
      const inner = el.querySelector(".sticky-container__el");
  
      ScrollTrigger.create({
        trigger: el,
        start: "top top",
        end: "bottom bottom",
        pin: inner,
        pinSpacing: false,
        anticipatePin: 1,
      });
    });
  }


  const sideSocialsOpen = document.querySelector('.side-socials__btn--open');
  const sideSocials = document.querySelector('.side-socials')
  const sideSocialsButton = document.querySelectorAll('.side-socials__btn:not(.side-socials__btn--open)')
  let widget;

  sideSocialsOpen.addEventListener('click', function(e) {
    e.preventDefault();

    sideSocials.classList.toggle('lock')
    widget.close();
  })



  window.addEventListener("onBitrixLiveChat", function (event) {
    widget = event.detail.widget;
  });

  sideSocialsButton.forEach((el, i) => {
    el.addEventListener('click', function (e) {
      e.preventDefault();

      if(el.classList.contains('life-line__button')){
        widget.open();
      };

      sideSocials.classList.toggle('lock')
      
    });
  })

  
});

// Animations end ---------->
window.addEventListener('load', () => {
  loadPage()
}, {once: true})

const documentHeight = () => {
  const doc = document.documentElement;
  doc.style.setProperty("--doc-height", `${window.innerHeight}px`);
};

documentHeight();
window.addEventListener("resize", documentHeight);
