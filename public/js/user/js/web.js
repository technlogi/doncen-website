(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-73239902-1', 'auto');
ga('send', 'pageview');


function showhide()
{
var div = document.getElementById("newpost");
if (div.style.display !== "none") {
div.style.display = "none";
} else {
div.style.display = "block";
}
}


function showhideDonor()
{
    var div = document.getElementById("Donor");
    var divhelper = document.getElementById("helper");
//           alert(divhelper.style.display != "none");
    if (div.style.display == "none" && divhelper.style.display == "none") {
        div.style.display = "block";
        divhelper.style.display = "none";
    } else if (div.style.display != "none") {
        div.style.display = "block";
        divhelper.style.display = "none";
    } else if (divhelper.style.display != "none") {
        divhelper.style.display = "none";
        div.style.display = "block";
    }
}
function showhidehelper()
{
    var div = document.getElementById("Donor");
    var divhelper = document.getElementById("helper");
    if (div.style.display == "none" || divhelper.style.display == "none") {
        div.style.display = "block";
        divhelper.style.display = "block";
    }
}
function showtxtAnyOthermeans()
{
    var div = document.getElementById("txtAnyOthermeans");
    if (div.style.display !== "none") {
        div.style.display = "none";
    } else {
        div.style.display = "none";
    }
}
function hidetxtAnyOthermeans()
{
    var div = document.getElementById("txtAnyOthermeans");
    if (div.style.display !== "none") {
        div.style.display = "none";
    } else {
        div.style.display = "none";
    }
}
function chkshow()
{
    var div = document.getElementById("chkreadonly");
    var div1 = document.getElementById("chkreadonly1");
    var div2 = document.getElementById("chkreadonly2");
    if (div.disabled == true || div1.disabled == true || div2.disabled == true) {
        div.disabled = false;
        div1.disabled = false;
        div2.disabled = false;
    } else {
        div.disabled = true;
        div1.disabled = true;
        div2.disabled = true;
    }
}
function chkshowage()
{
    var div = document.getElementById("chkreadonlyage");
    var div1 = document.getElementById("chkreadonlyage1");
    var div2 = document.getElementById("chkreadonlyage2");
    var div3 = document.getElementById("chkreadonlyage3");
    if (div.disabled == true || div1.disabled == true || div2.disabled == true || div3.disabled == true) {
        div.disabled = false;
        div1.disabled = false;
        div2.disabled = false;
        div3.disabled = false;
    } else {
        div.disabled = true;
        div1.disabled = true;
        div2.disabled = true;
        div3.disabled = true;
    }
}

function Monetary()
{
    var div = document.getElementById("txtMonetary");
    var div1 = document.getElementById("txtNonMonetary");
    if (div.style.display !== "none") {
        div.style.display = "block";
    } else {
        div.style.display = "block";
        div1.style.display = "none";
    }
}
function NonMonetary()
{
    var div = document.getElementById("txtMonetary");
    var div1 = document.getElementById("txtNonMonetary");
    if (div1.style.display !== "none") {
        div1.style.display = "block";
    } else {
        div.style.display = "none";
        div1.style.display = "block";
    }
}
function Free()
{
    var div = document.getElementById("txtMonetary");
    var div1 = document.getElementById("txtNonMonetary");
    if (div.style.display !== "none" || div1.style.display !== "none") {
        div1.style.display = "none";
        div.style.display = "none";

    } else
    {
        div1.style.display = "none";
        div.style.display = "none";
    }
}
function showyes()
{
    var div = document.getElementById("txtReason");
    if (div.style.display !== "none") {
        div.style.display = "block";
    } else {
        div.style.display = "block";
    }
}
function hideno()
{
    var div = document.getElementById("txtReason");
    if (div.style.display !== "none") {
        div.style.display = "none";
    } else {
        div.style.display = "none";
    }
}