let rulesForValidation = {
  email: function(value) {
    const regexEmail = /(\w+[\.\-\_]?\w+)[@]{1,}\w+\.\w+/;
    return regexEmail.test(value);
  },
  password: function(value) {
    const regexPassword = /[\d\w!@#$%&*^]{8,}/;
    return regexPassword.test(value);
  },
  text: function(value) {
    const regexText = /^[^!@#$%&*]{2,}$/i;
    return regexText.test(value);
  },
};



let emailInput = document.getElementById("email");
emailInput.addEventListener('blur', function() {
  if (!rulesForValidation.email(emailInput.value)) {
    emailInput.style = "border: 1px solid red;"
  } else {
    emailInput.style = "border-bottom: 1px solid #d3bb89;"
  }
});

let passwordlInput = document.getElementById("password");
passwordlInput.addEventListener('blur', function() {
  if (!rulesForValidation.password(passwordlInput.value)) {
    passwordlInput.style = "border: 1px solid red;";
  } else {
    passwordlInput.style = "border-bottom: 1px solid #d3bb89;";
  }
});

let textInput = document.getElementById("text");
textInput.addEventListener('blur', function() {
  if (!rulesForValidation.text(textInput.value)) {
    textInput.style = "border: 1px solid red;";
  } else {
    textInput.style = "border-bottom: 1px solid #d3bb89;";
  }
});

let textInput2 = document.getElementById("text2");
textInput2.addEventListener('blur', function() {
  if (!rulesForValidation.text(textInput2.value)) {
    textInput2.style = "border: 1px solid red;";
  } else {
    textInput2.style = "border-bottom: 1px solid #d3bb89;";
  }
});



//for Slider_4

$(document).ready(function() {
  let owl = $('.owl-carousel');
  owl.owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true
  });
  $('.play').on('click', function() {
    owl.trigger('play.owl.autoplay', [1000])
  });
  $('.stop').on('click', function() {
    owl.trigger('stop.owl.autoplay')
  });

  // Sets the size of the slider and pictures
  setSizeToSlider();

  function setSizeToSlider() {
    let halfOfWindow = $(".grid").width() / 2;
    let heightOfWindow = $(window).height();

    $(".owl-carousel, .item, .image_slide, .left_sidebar, .right_sidebar").css({ "width": halfOfWindow,
      "height": heightOfWindow });
  }

  $(window).resize(function(){
    setSizeToSlider();
  });


  // launches dropDown
  $('.nselect').nSelect();

  //Removes error-borders from select
  let selectInput = $(".nselect__head");
  selectInput.on("click", function() {
    $(this).css("box-shadow", "none");
  });


  // Reads the selected value and scrolls the carousel to the desired image
  $(".nselect__list").find("li").click(function() {
    let propActive = $('._active').attr("data-val");
    if (propActive !== "Select House") {
      owl.trigger('play.owl.autoplay', [50]);


      // Stop the slideshow after selecting an item in DropDown
      let myVar = setInterval(myTimer, 50);

      function myTimer() {
        if ($('.owl-item[class~="active"] .item img').attr("value") === propActive) {
          owl.trigger('stop.owl.autoplay');
          clearInterval(myVar);
        }
      }
    } else if (propActive === "Select House") {
      owl.trigger('play.owl.autoplay', [3000]);
    }
  });
});