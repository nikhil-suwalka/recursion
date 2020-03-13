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
    var npass = document.data.newpass.value;
    var cnpass = document.data.confnewpass.value;
    if (npass == '' || npass.length == 0) {
        document.data.newpassval.value = "Field Cannot be empty";
        document.data.newpass.style.borderColor = "#FF0000";
        flag = 0;
    } else {
        flag = 1;
        document.data.newpassval.value = " ";
        document.data.newpass.style.borderColor = "green";
    }
    if (cnpass == '' || cnpass.length == 0) {
        document.data.confnewpassval.value = "Field Cannot be empty";
        document.data.confnewpass.style.borderColor = "#FF0000";
        flag = 0;

    } else {
        flag = 1;
        document.data.confnewpassval.value = " ";
        document.data.confnewpass.style.borderColor = "green";

    }
    if (npass !== cnpass || flag === 0) {
        document.data.confnewpassval.value = "Password does not match";
        document.data.confnewpass.style.borderColor = "#FF0000";

    } else {
        flag = 1;
        document.data.newpassval.value = " ";
        document.data.confnewpassval.value = " ";
        document.data.newpass.style.borderColor = "#ced4da";
        document.data.confnewpass.style.borderColor = "#ced4da";
    }
    submit2();

}
