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
        const regexText = /[\w{2,}\_\-!@#$%&*^]/i;
        return regexText.test(value);
    },
};



let emailInput = document.getElementById("email");
emailInput.addEventListener('blur', function() {
    if (!rulesForValidation.email(document.getElementById('email').value)) {
        emailInput.style = "border: 1px solid red;"
    } else {
        emailInput.style = "border-bottom: 1px solid #d3bb89;"
    }
});

let passwordlInput = document.getElementById("password");
passwordlInput.addEventListener('blur', function() {
    if (!rulesForValidation.password(document.getElementById('password').value)) {
        passwordlInput.style = "border: 1px solid red;";
    } else {
        passwordlInput.style = "border-bottom: 1px solid #d3bb89;";
    }
});

let textInput = document.getElementById("text");
textInput.addEventListener('blur', function() {
    if (!rulesForValidation.text(document.getElementById('text').value)) {
        textInput.style = "border: 1px solid red;";
    } else {
        textInput.style = "border-bottom: 1px solid #d3bb89;";
    }
});

let textInput2 = document.getElementById("text2");
textInput2.addEventListener('blur', function() {
    if (!rulesForValidation.text(document.getElementById('text2').value)) {
        textInput2.style = "border: 1px solid red;";
    } else {
        textInput2.style = "border-bottom: 1px solid #d3bb89;";
    }
});

let selectInput = document.getElementById("select");
selectInput.addEventListener('change', function() {
    if (document.getElementById('select').value === "Select House") {
        selectInput.style = "border: 1px solid red;";
    } else {
        selectInput.style = "border-bottom: 1px solid #d3bb89;";
    }
});



function checkFirstForm() {
    let form1 = document.getElementById("form1");
    let form2 = document.getElementById("form2");

    if (rulesForValidation.email(document.getElementById('email').value) &&
        rulesForValidation.password(document.getElementById('password').value)) {
        form1.style.display = "none";
        form2.style.display = "block";
    } else {
        if (!rulesForValidation.email(document.getElementById('email').value)) {
            emailInput.style = "border: 1px solid red;";
        }
        if (!rulesForValidation.password(document.getElementById('password').value)) {
            passwordlInput.style = "border: 1px solid red;";
        }  
    }
}

function checkSecondForm() {
    let form2 = document.getElementById("form2");
    let select = document.getElementById('select');

    if (rulesForValidation.text(document.getElementById('text').value) && select.value !== "Select House" &&
        rulesForValidation.text(document.getElementById('text2').value)) {
        alert("You passed this lesson. Congratulate!!!");
    } else {
        if (!rulesForValidation.text(document.getElementById('text').value)) {
            textInput.style = "border: 1px solid red;";
        }
        if (!rulesForValidation.text(document.getElementById('text2').value)) {
            textInput2.style = "border: 1px solid red;";
        }
        if (select.value === "Select House") {
            select.style = "border: 1px solid red;";
        }
    }
}