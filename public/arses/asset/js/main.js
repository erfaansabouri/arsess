$(document).ready(function () {
  const $headerMnu = $(".headerMnu");
  const $sideMenu = $(".sideMenu");

  /***********mouseup********/
  $(document).mouseup((ev) => {
    if ($(".subBox").hasClass("opened")) {
      if (!$headerMnu.is(ev.target) && $headerMnu.has(ev.target).length === 0) {
        $(".subBox").removeClass("opened").slideUp(300);
        // $(".afterBox").slideUp(500);
        $(".menuVector").fadeOut(500);

        $(".openSub").parent().removeClass("open");
        $(".hdrSubUl").slideUp();

        $(".opnPrdctSub").parent().removeClass("open");
        $(".prdctSubBx").slideUp();
      }
    }

    if ($(".sideMenu").hasClass("opened")) {
      if (!$sideMenu.is(ev.target) && $sideMenu.has(ev.target).length === 0) {
        $(".sideMenu").removeClass("opened");
        $("body").removeClass("hidOverflow");
      }
    }
  });

  /********************open-menu******************/
  if ($(".menuLink").length) {
    $(".menuLink").click(function () {
      if ($(".subBox").hasClass("opened")) {
        $(".subBox").removeClass("opened").slideUp(300);
        $(".menuVector").fadeOut(300);
      } else {
        $(".subBox").addClass("opened").slideDown(300);
        $(".menuVector").fadeIn(300);
      }
    });
  }

  /********************input-focus******************/
  if ($(".searchInput").length) {
    $(".searchInput").focus(function () {
      $(".afterBox").fadeIn(500);
    });
    $(".searchInput").blur(function () {
      $(".afterBox").fadeOut(500);
    });
  }

  /********************sub-menu******************/
  if ($(".havSub").length) {
    $(".havSub").each(function () {
      var thisLi = $(this);
      var thisLink = thisLi.find(".openSub");
      var thisSub = thisLi.find(".hdrSubUl");
      thisLink.click(function (ev) {
        ev.preventDefault();
        if (thisLink.parent().hasClass("open")) {
          thisLink.parent().removeClass("open");
          thisSub.slideUp();
          $(".opnPrdctSub").parent().removeClass("open");
          $(".prdctSubBx").slideUp();
        } else {
          thisLi.siblings().find(".openSub").parent().removeClass("open");
          thisLi.siblings().find(".hdrSubUl").slideUp();
          thisLink.parent().addClass("open");
          thisSub.slideDown();
        }
      });
    });

    if ($(".prdctHasSub").length) {
      $(".prdctHasSub").each(function () {
        var thisLi = $(this);
        var thisLink = thisLi.find(".opnPrdctSub");
        var thisSub = thisLi.find(".prdctSubBx");

        thisLink.click(function (ev) {
          ev.preventDefault();
          if (thisLink.parent().hasClass("open")) {
            thisLink.parent().removeClass("open");
            thisSub.slideUp();
          } else {
            thisLi.siblings().find(".opnPrdctSub").parent().removeClass("open");
            thisLi.siblings().find(".prdctSubBx").slideUp();
            thisLink.parent().addClass("open");
            thisSub.slideDown();
          }
        });
      });
    }
  }

  /********************open-side-menu******************/
  if ($(".openSide").length) {
    $(".openSide").click(function () {
      $(".sideMenu").addClass("opened");
      $("body").addClass("hidOverflow");
    });

    $(".closeSide").click(function () {
      $(".sideMenu").removeClass("opened");
      $("body").removeClass("hidOverflow");
    });
  }

  /*###########swiper##################*/
  if ($(".topBnnrSwpr").length) {
    var swiper3 = new Swiper(".topBnnrSwpr .swiper", {
      spaceBetween: 0,
      slidesPerView: 1,
      grabCursor: true,
      centeredSlides: true,
      loop: true,
      reverseDirection: false,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: ".topBnnrSwpr .swiper-button-next",
        prevEl: ".topBnnrSwpr .swiper-button-prev",
      },
    });
  }

  if ($(".newestSwpr1").length) {
    var swiper3 = new Swiper(".newestSwpr1 .swiper", {
      spaceBetween: 25,
      slidesPerView: "auto",
      grabCursor: true,
      centeredSlides: false,
      loop: false,
      reverseDirection: false,
      pagination: {
        el: ".newestSwpr1 .swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".newestSwpr1 .swiper-button-next",
        prevEl: ".newestSwpr1 .swiper-button-prev",
      },
      breakpoints: {
        0: {
          spaceBetween: 20,
        },
        768: {
          spaceBetween: 25,
        },
      },
    });
  }

  if ($(".newestSwpr2").length) {
    var swiper3 = new Swiper(".newestSwpr2 .swiper", {
      spaceBetween: 25,
      slidesPerView: "auto",
      grabCursor: true,
      centeredSlides: false,
      loop: false,
      reverseDirection: false,
      pagination: {
        el: ".newestSwpr2 .swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".newestSwpr2 .swiper-button-next",
        prevEl: ".newestSwpr2 .swiper-button-prev",
      },
      breakpoints: {
        0: {
          spaceBetween: 20,
        },
        768: {
          spaceBetween: 25,
        },
      },
    });
  }

  if ($(".newestSwpr3").length) {
    var swiper3 = new Swiper(".newestSwpr3 .swiper", {
      spaceBetween: 25,
      slidesPerView: "auto",
      grabCursor: true,
      centeredSlides: false,
      loop: false,
      reverseDirection: false,
      pagination: {
        el: ".newestSwpr3 .swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".newestSwpr3 .swiper-button-next",
        prevEl: ".newestSwpr3 .swiper-button-prev",
      },
      breakpoints: {
        0: {
          spaceBetween: 20,
        },
        768: {
          spaceBetween: 25,
        },
      },
    });
  }

  if ($(".topLgoSwpr").length) {
    var swiper2 = new Swiper(".topLgoSwpr .swiper", {
      spaceBetween: 200,
      slidesPerView: "auto",
      grabCursor: true,
      centeredSlides: false,
      loop: true,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
      },
      reverseDirection: true,
      breakpoints: {
        0: {
          centeredSlides: true,
          spaceBetween: 50,
        },
        576: {
          centeredSlides: true,
          spaceBetween: 90,
        },
        768: {
          centeredSlides: false,
          spaceBetween: 150,
        },
        992: {
          centeredSlides: false,
          spaceBetween: 200,
        },
      },
    });
  }

  /********************tabBox*********************/
  $(".tabBox").each(function () {
    // var thisTAb = $(this);
    // thisTAb.find(".tablinks").click(function (e) {
    //   e.preventDefault();
    //   var thisLink = $(this);
    //   var tabId = thisLink.attr("tabId");
    //   var tabId = "#" + tabId;
    //   thisTAb.find(".tabcontent").hide();
    //   thisTAb.find(tabId).show();
    //   thisLink.parent().siblings().find(".tablinks").removeClass("active");
    //   thisLink.addClass("active");
    // });
  });

  /********************edit-account*********************/
  if ($(".editBtn").length) {


    $(".cancelBtn").click(function () {
        $('#submit-btn').hide();
        $('#edit-btn').show();
        // hide edit-btn
      $(".editBtn").text("ویرایش");
      $(".hideTable").fadeOut(300);
      $(".accountInfo").removeClass("editable").addClass("readonlyInfo");
      $(".accountInfo input").attr("readonly", true);

        // find input with id #profile-form and change value to not-ready
            var inputField = $("#profile-form");
            if (inputField.length) {
                inputField.val("not_ready");
            }
    });
  }

  /********************margin*********************/
  if ($(".arsesTitl").length) {
    var offset = $(".arsesTitl").offset();
    $(".swprContainr").css("marginRight", offset.left);

    // Update on window resize
    $(window).on("resize", function () {
      var offset = $(".arsesTitl").offset();
      $(".swprContainr").css("marginRight", offset.left);
    });
  }
});

/********************discountCod*********************/
$(window).on("resize", function () {
    $(".discountBx").slideUp();
});

if ($(".discountCod").length) {
    $(".discountCod").each(function () {
        var thisBtn = $(this);
        thisBtn.click(function (ev) {
            ev.preventDefault();
            $(".discountBx").slideUp();
            thisBtn.next(".discountBx").slideDown(300);
        });
    });
}

if ($(".opnDiscntBx").length) {
    $(".opnDiscntBx").click(function (ev) {
        ev.preventDefault();
        $(".discntBx").slideDown(300);
        $(".hasCodeTxt").fadeOut();
    });
}
