console.log("hello");
function openSlideMenu()
{
    document.getElementById("menu").style.width = "250px";
    document.getElementById("content").style.marginLeft = "250px";
}

function closeSideMenu()
{
    document.getElementById("menu").style.width = "0px";
    document.getElementById("content").style.marginLeft = "0px";
}