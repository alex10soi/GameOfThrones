// Validation rules for user input.
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



$(document).ready(function() {
  const userEmail = $('#email').val();

  $('#secondForm').submit((ev) => {
    ev.preventDefault();
    let valuesFromSecondForm = $('#secondForm').serializeArray();

    $.ajax({
      type: 'POST',
      url: '../../../GameOfThrones/infoKeeper.php',
      data: {"userEmail" : '' + userEmail,
             "infoAboutMe" : valuesFromSecondForm},
      async: true,
      error: function () {
        console.log('Server fail');
      },
      success: function (data) {
        ev.target.submit();
      }
    });
  });


	// Settings for Slider Slick
	$('.slick-slider').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  pauseOnHover: false,
	  pauseOnFocus: false,
	  autoplay: true,
	  autoplaySpeed: 3000,
	  focusOnSelect: true
	});


	// Sets the size of the slider and pictures
  setSizeToSlider();

  // Adjusts block sizes and pictures for slider
  function setSizeToSlider() {
    let halfOfWindow = $(".grid").width() / 2;
    let heightOfWindow = $(window).height();
    let widthSlickTrack = halfOfWindow * 10;

    $(".slick-list, .slick-track, .slick-slide").css({ "width": halfOfWindow,
      "height": heightOfWindow 
    });

    $(".slick-track").css({ "width": widthSlickTrack,
      "height": heightOfWindow 
    });
  }
	
  $(window).resize(function(){
    setSizeToSlider();
  });

	//DropDown 
	$('.nselect').select2({});

	//-------------------------------------------
  
	setInterval(checkChangesSelect, 1000);

	// Checks for changes to DropDown
	function checkChangesSelect(){
		setInterval(stopStartSlide, 50);
	}

	// Title taken from DropDown
	let title = '';


	// Starts a slide to the selected image in DropDown. The selected "Select House" item again restores 
	// the auto-scroll of the slider.
	function stopStartSlide(){
		let tittleBlock = $('#select2-select-container').attr('title');
		let activeItem = $('.slick-active').find('img').attr('value');
		if(tittleBlock != title){
			$('.slick-slider').slick('slickPlay');
		}
		title = tittleBlock;

		if(tittleBlock != 'Select House' && typeof activeItem != 'underfined' && activeItem != tittleBlock ){
			$('.slick-slider').slick('slickSetOption', 'autoplay', true);
			$('.slick-slider').slick('slickSetOption', 'autoplaySpeed', 1);
		}else if(tittleBlock == 'Select House'){
			$('.slick-slider').slick('slickSetOption', 'autoplay', true);
			$('.slick-slider').slick('slickSetOption', 'autoplaySpeed', 3000);
		}else if(typeof activeItem != 'underfined' && activeItem == tittleBlock){
			$('.slick-slider').slick('slickPause');
		}
	}
});