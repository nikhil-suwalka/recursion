var flag=0,flag3=0,flag5=0,flag7=0;

function submit2()
{
    if(flag==1 && flag3==1 && flag5==1 && flag7==1 && flag8 == 0)
    {

    }
    else
    {

    }
}


function fun() {
    flag = 0;
    var fname = document.data.Institutename.value;
    if (fname == '') {
        document.data.fname.value = "Institute name field cannot be empty";
        document.data.Institutename.style.borderColor = "#FF0000";
    }

    else if (fname.match(/[^a-zA-Z ]/)) {
        document.data.fname.value = "Only Alphabets ";
        document.data.Institutename.style.borderColor = "#FF0000";
    }

    else {
        flag = 1;
        document.data.fname.value = "  ";
        document.data.Institutename.style.borderColor = "green";
    }
    submit2();
}


//Phone Number validation
function fun3() {
    flag3 = 0;
    var ph = document.data.Contactno.value;
    if (ph == '') {

        document.data.phno.value = "Phone Number field cannot be empty";
        document.data.Contactno.style.borderColor = "#FF0000";
    }

    else if (ph.length < 10) {
        document.data.phno.value = "Invalid Phone Number";
        document.data.Contactno.style.borderColor = "#FF0000";
    }

    else if (ph.match(/[^0-9]/)) {
        document.data.phno.value = "Only numbers ";
        document.data.Contactno.style.borderColor = "#FF0000";
    }

    else {
        flag3 = 1;
        document.data.phno.value = "  ";
        document.data.Contactno.style.borderColor = "green";
    }
    submit2();
}


function fun5()
{
    flag5 = 0;
    var fname = document.data.email.value;
    if (fname === '')
    {
        document.data.emailval.value = "Email Feild Cannot be Empty";
        document.data.email.style.borderColor = "#FF0000";
    }
    else if (fname.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
    {
        document.data.emailval.value = "  ";
        document.data.email.style.borderColor = "green";
    }
    else {
        document.data.emailval.value = "Invalid Email";
        document.data.email.style.borderColor = "#FF0000";
    }

    submit2();
}

//ZipCode validation
function fun7()
{
    flag7 = 0;
    var lname = document.data.zipcode.value;
    if(lname == '')
    {
        document.data.zipval.value = "ZipCode cannot be empty";
        document.data.zipcode.style.borderColor = "#FF0000";
    }

    else if(lname.length != 6)
    {
        document.data.zipval.value = "Invalid ZipCode Number";
        document.data.zipcode.style.borderColor = "#FF0000";
    }

    else if(lname.match(/[^0-9 ]/))
    {
        document.data.zipval.value = "Only Numbers are allowed";
        document.data.zipcode.style.borderColor = "#FF0000";
    }
    else
    {
        flag7 = 1;
        document.data.zipval.value = "  ";
        document.data.zipcode.style.borderColor = "green";
    }
    submit2();
}

//ZipCode validation
function fun8() {
    flag8 = 0;
    var address = document.data.address.value;

    if (address == '') {
        document.data.addval.value = "Address cannot be empty";
        document.data.addval.style.borderColor = "#FF0000";
    }
    else {
        flag8 = 1;
        document.data.addval.value = "  ";
        document.data.addval.style.borderColor = "green";
    }
}