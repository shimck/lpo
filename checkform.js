function validate(userForm)
{
    div=document.getElementById("emailmsg");
    div.style.color="red"
    if(div.hasChildNodes())
    {
	div.removeChild(div.firstChild);
    }
    regex=/(^\w+\@\w+\.\w+)/;
    match=regex.exec(userForm.emailaddress.value);
    if(!match)
    {
	div.appendChild(document.createTextNode("   Invalid Email"));
	userForm.emailaddress.focus();
	return false;
    }

    // Password message
    div=document.getElementById("passwdmsg");
    div.style.color="red"
    if(div.hasChildNodes())
    {
	div.removeChild(div.firstChild);
    }
    if(userForm.password.value.length <= 7)
    {
	div.appendChild(document.createTextNode("   The password should be of at least size 8"));
	userForm.password.focus();
	return false;
    }
    div=document.getElementById("repasswdmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
	div.removeChild(div.firstChild);
    }
    if(userForm.password.value != userForm.repassword.value)
    {
	div.appendChild(document.createTextNode("   The two passwords don't match"));
	userForm.password.focus();
	return false;
    }
    var div=document.getElementById("usrmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
	div.removeChild(div.firstChild);
    }
    if(userForm.complete_name.value.length == 0)
    {
	div.appendChild(document.createTextNode("   Name cannot be blank"));
	userForm.complete_name.focus();
	return false;
    }

    // location code
    var div=document.getElementById("locmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
	div.removeChild(div.firstChild);
    }
     if(userForm.location.value.length != 4)
     {
	div.appendChild(document.createTextNode("   Location cannot be blank enter either 1000,2000,3000,4000,5000 or 6000 for location"));
	userForm.location.focus();
	return false;
    }

    
    // cost centre
    var div=document.getElementById("costmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
	div.removeChild(div.firstChild);
    }
    if(userForm.costcentre.value.length == 0)
    {
	div.appendChild(document.createTextNode("  Enter a cost centre e.g. FNA, MD, AS, S, CL"));
	userForm.costcentre.focus();
	return false;
    }
    
    return true;
}
