var flag = 0, flag1 = 0, flag2 = 0, flag3 = 0, flag4 = 0, flag5 = 0, flag6 = 0, flag7 = 0, flag11 = 0, flag101 = 0,
    flag102 = 0, flag103 = 0;


// To hide or show button
function submit1() {
    if (flag == 1 && flag1 == 1 && flag101==1 && flag103==1) {
        $(':button').prop('disabled', false);
    } else {
        $(':button').prop('disabled', true);
    }
}

//Email validation
function fun() {
    flag = 0;
    var fname = document.getElementById("email").value;
    if (fname === '') {
        document.getElementById("emailval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Email Field cannot be empty</span>";
        $(".emailval").show();

    } else if (fname.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
        flag = 1;
        document.getElementById("emailval").innerHTML = "";
    }
    else
    {
        document.getElementById("emailval").innerHTML = "<span style=\"color: red;  font-size: 12px  \">Invalid </span>";
        $(".emailval").show();
    }
    
    submit1();
}

//Password validation
function fun2() {
    flag1 = 0;
    var lname = document.getElementById("password").value;
    if (lname == '')
    {
        document.getElementById("passval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Password Field cannot be empty</span>";
        $(".passval").show();

    } else if (lname.length < 8) {
        document.getElementById("passval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Password too short ! Make a Stronger One</span>";
        $(".passval").show();
    } else
    {
        flag1 = 1;
        document.getElementById("passval").innerHTML = "";
    }
    submit1();
}

// Confirm Password validation
function fun300()
{
    flag101 = 0;
    var lname = document.getElementById("password-repeat").value;

    if (lname === '')
    {

        document.getElementById("passval2").innerHTML = "<span style=\"color: red; font-size: 12px \"> Confirm Password field cannot be empty </span>";
        $(".passval2").show();
    }
    else if (lname.length < 8) {
        document.getElementById("passval2").innerHTML = "<span style=\"color: red; font-size: 12px \"> Password too short ! Make a Stronger One </span>";
        $(".passval2").show();
    }
    else
    {
        flag101 = 1;
        document.getElementById("passval2").innerHTML = "";
    }
    funConfirm();
    submit1();
}

function funConfirm() {
    flag102 = 0;
    var password2 = document.getElementById("password").value;
    var confpassword = document.getElementById("password-repeat").value;

    if (confpassword == password2) {
        document.getElementById("passval2").innerHTML = "";
        flag102 = 1;
    } else {
        document.getElementById("passval2").innerHTML = "<span style=\"color: red; font-size: 12px \"> Password Does'nt Match </span>";
        $(".passval2").show();
    }
}

//Institute Name Validation
function fun3() {
    flag3 = 0;
    var ph = document.data.institute_name.value;
    if (ph == '')
    {
        document.getElementById("instituteval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Institute Name field cannot be empty </span>";
        $(".instituteval").show();
    } else if (ph.match(/[^A-Za-z]/))
    {
        document.getElementById("instituteval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Only Alphabets </span>";
        $(".instituteval").show();
    }
    else
    {
        flag3 = 1;
        $(".instituteval").hide();
    }
    submit1();
}

//Country validation
function fun4()
{
    flag4 = 0;
    var lname = document.data.country.value;
    if (lname == '')
    {
        document.getElementById("countryval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Country field cannot be empty </span>";
        $(".countryval").show();

    }
    else if (lname.match(/[^a-zA-Z]/))
    {
        document.getElementById("countryval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Only alphabets are allowed </span>";
        $(".countryval").show();
    }
    else
    {
        flag4 = 1;
        document.getElementById("countryval").innerHTML = "";

    }
    submit1();
}



//City Validation
function fun6() {
    flag6 = 0;
    var lname = document.data.pincode.value;
    if (lname == '')
    {
        document.getElementById("pincodeval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Pincode field cannot be empty </span>";
        $(".pincodeval").show();
    }
    else if (lname.match(/[^0-9]/))
    {
        document.getElementById("pincodeval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Only Numbers </span>";
        $(".pincodeval").show();
    }
    else
    {
        document.getElementById("pincodeval").innerHTML = "";

        flag6 = 1;
    }
    submit1();
}

//Address Validation
function fun7() {
    flag7 = 0;
    var lname = document.data.address.value;
    if (lname == '')
    {
        document.getElementById("addressval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Address field cannot be empty </span>";
        $(".addressval").show();
    }
    else
    {
        document.getElementById("addressval").innerHTML = "";
        flag7 = 1;
    }
    submit1();
}

//Contact validation
function fun81() {
    flag103 = 0;
    var ph = document.getElementById("pno").value;
    if (ph == '') {
        document.getElementById("pnoval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Contact field cannot be empty </span>";
        $(".contactval").show();
    } else if (ph.match(/[^0-9+]/) || ph.length<10)
    {
        document.getElementById("pnoval").innerHTML = "<span style=\"color: red; font-size: 12px \"> Only Numbers  </span>";
        $(".contactval").show();
    } else {
        flag103 = 1;
        document.getElementById("pnoval").innerHTML = "";

    }
    submit1();
}



