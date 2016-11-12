function setclasscode(code)
{
	document.cookie = "currclasscode=" + code;
}

function setassign(code)
{
	document.cookie = "assignid=" + code;
}

function deleteclasscode(code)
{
	document.cookie = "currclasscode=; expires=Thu, 01 Jan 1970 00:00:00 UTC;"
}
