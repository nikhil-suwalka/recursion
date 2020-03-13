var flag = 0, flag3 = 0,flag1 = 0;

document.getElementById("sub").disabled = true;

function submit2() {

    fun();
    fun3();
    
    if (flag == 1 && flag3 == 1) {
        document.getElementById("sub").disabled = false;



    } else {
        document.getElementById("sub").disabled = true;

    }

}

function fun() {

    flag = 0;

    var fnaam = document.data.First_name.value;

    if (fnaam == '') {

        document.data.fname.value = "Student name field cannot be empty";

        document.data.First_name.style.borderColor = "#FF0000";

    } else if (fnaam.match(/[^a-zA-Z ]/)) {

        document.data.fname.value = "Only Alphabets ";

        document.data.First_name.style.borderColor = "#FF0000";

    } else {

        if (fnaam.length != 0) {


            flag = 1;

            document.data.fname.value = "  ";

            document.data.First_name.style.borderColor = "green";

        } else {

            document.data.fname.value = " Student name field cannot be empty ";

            document.data.First_name.style.borderColor = "#FF0000";

        }

    }

    submit2();

}


//Phone Number validation

function fun3() {

    flag3 = 0;

    var ph = document.data.Phoneno.value;

    if (ph == '') {


        document.data.phnno.value = "Phone Number field cannot be empty";

        document.data.Phoneno.style.borderColor = "#FF0000";

    } else if (ph.length < 10) {


        document.data.phnno.value = "Invalid Phone Number";

        document.data.Phoneno.style.borderColor = "#FF0000";

    } else if (ph.match(/[^0-9]/)) {

        document.data.phnno.value = "Only numbers ";

        document.data.Phoneno.style.borderColor = "#FF0000";

    } else {


        flag3 = 1;

        document.data.phnno.value = "  ";

        document.data.Phoneno.style.borderColor = "green";

    }

    submit2();

}

