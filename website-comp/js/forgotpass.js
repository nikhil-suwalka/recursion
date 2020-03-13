
var flag = 0;
document.getElementById("sub").disabled = true;

function submit2() {
    if (flag == 1) {
        document.getElementById("sub").disabled = false;

    } else {
        document.getElementById("sub").disabled = true;

    }
}

function fun() {
    flag = 0;
    var fname = document.data.email1.value;
    if (fname === '') {
        flag = 0;
        document.data.emailval.value = "Email Feild Cannot be Empty";
        document.data.email1.style.borderColor = "#FF0000";
    } else if (fname.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
        flag = 1;
        document.data.emailval.value = "  ";
        document.data.email1.style.borderColor = "green";
    } else {
        flag = 0;
        document.data.emailval.value = "Invalid Email";
        document.data.email1.style.borderColor = "#FF0000";
    }

    submit2();
}

var time = 3, myvar;
