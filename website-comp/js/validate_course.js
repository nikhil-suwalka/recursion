var flag=0,flag3=0;
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
function fun()
{
    flag = 0;
    var cname = document.data.coursename.value;
    if (cname=='')
    {
        document.getElementById("sub").disabled = true;
        document.data.fname.value = "Course name field cannot be empty";
        document.data.coursename.style.borderColor = "#FF0000";
    }

    else if (cname.match(/[^a-zA-Z ]/))
    {
        document.data.fname.value = "Only Alphabets ";
        document.data.coursename.style.borderColor = "#FF0000";
    }

    else
    {
        if(cname.length!=0)
        {
            document.getElementById("sub").disabled = false;
            flag = 1;
            document.data.fname.value = "  ";
            document.data.coursename.style.borderColor = "green";
        }
        else
        {document.getElementById("sub").disabled = true;
            document.data.fname.value = " Course name field cannot be empty ";
            document.data.coursename.style.borderColor = "#FF0000";
        }
    }
    submit2();
}


//Course Code validation
function fun3()
{
    flag3 = 1;
    document.data.coursecode.style.borderColor = "green";
    submit2();
}
