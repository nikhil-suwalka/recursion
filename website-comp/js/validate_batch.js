var flag=0,flag3=0,flag5=0,flag7=0;
document.getElementById("sub").disabled = true;

function submit2()
{
    if(flag==1 && flag3==1)
    {
        
    }
    else
    {
        
    }
}

// Course Name
function fun() {
    flag = 0;
    var year = document.data.Batchyear.value;

    if (year == '') 
    {
        document.getElementById("sub").disabled = true;
        document.data.fname.value = "Batch year field cannot be empty";
        document.data.Batchyear.style.borderColor = "#FF0000";
    }

    else if (year.length !== 4) 
    {
        document.getElementById("sub").disabled = true;
        document.data.fname.value = "Invalid year";
        document.data.Batchyear.style.borderColor = "#FF0000";
    }

    else if (year.match(/[^0-9]/)) 
    {
        document.data.fname.value = "Only numbers ";
        document.data.Batchyear.style.borderColor = "#FF0000";
    }

    else 
    {
        document.getElementById("sub").disabled = false;
        flag = 1;
        document.data.fname.value = " ";
        document.data.Batchyear.style.borderColor = "green";
    }
    submit2();
}


//Course Code validation
function fun3() {

    flag3 = 1;
    document.data.coursecode.style.borderColor = "green";

    submit2();
}
