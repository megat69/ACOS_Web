let foreground_app_expand = false;
let resize_foreground_app = false;

window.addEventListener('contextmenu', function (e) {
  e.preventDefault();
  return false;
}, false);

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function expandIFrame() {
	IFrame = document.getElementById('foreground_app');
	if (foreground_app_expand == false) {
		IFrame.style.width = "94.5%";
		IFrame.style.height = "100%";
		foreground_app_expand = true;
		document.getElementsByClassName('Expand').style.transform = 'rotateX(180deg)';
	} else {
		IFrame.style.width = "70%";
		IFrame.style.height = "60%";
		foreground_app_expand = false;
		document.getElementsByClassName('Expand').style.transform = 'rotateX(0deg)';
	}
	
}

function resizeIframe() {
	let IFrame = document.getElementById('foreground_app');
	document.getElementById('resizer_width').setAttribute('value', document.getElementById('foreground_app').offsetWidth);
	document.getElementById('resizer_width').setAttribute('max', Math.round(window.screen.width*0.94));
	document.getElementById('resizer_height').setAttribute('value', document.getElementById('foreground_app').offsetHeight);
	document.getElementById('resizer_height').setAttribute('max', Math.round(window.screen.height*0.85));
	if (resize_foreground_app == false) {
		document.getElementById("resizer").style.display = "block";
		resize_foreground_app = true;
	} else {
		document.getElementById("resizer").style.display = "none";
		resize_foreground_app = false;
	}
}

function now_resizeIFrame() {
	IFrame = document.getElementById('foreground_app');
	IFrame.style.width = document.getElementById('resizer_width').value + 'px';
	IFrame.style.height = document.getElementById('resizer_height').value + 'px';
}

function changeLang(given_value, foreground_app) {
	if (getCookie('ACOS_Lang') != given_value) {
		document.cookie = "ACOS_Lang="+ given_value +"; expires=Tue, 25 Mar 2032 12:00:00 UTC; path=/acos-remastered";
		document.location.href = "../../main/?foreground_app="+foreground_app+"&lang="+given_value;
	}
}

function changeTheme(given_value) {
	if (getCookie('ACOS_Theme') != given_value) {
		document.cookie = "ACOS_Theme="+ given_value +"; expires=Tue, 25 Mar 2032 12:00:00 UTC; path=/acos-remastered";
		document.location.reload(true);
	}
}

function customBackground(given_value) {
	if (getCookie('ACOS_Background') != given_value) {
		document.cookie = "ACOS_Background=CUSTOM:"+ given_value +"; expires=Tue, 25 Mar 2032 12:00:00 UTC; path=/acos-remastered";
		document.location.reload(true);
	}
}

/*function dragElement(elmnt) {
  	var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  	if (document.getElementById(elmnt + "_header")) {
    	// if present, the header is where you move the DIV from:
    	document.getElementById(elmnt + "_header").onmousedown = dragMouseDown;
  	} else {
    	// otherwise, move the DIV from anywhere inside the DIV:
    	elmnt.onmousedown = dragMouseDown;
  	}

  	function dragMouseDown(e) {
    	e = e || window.event;
	    e.preventDefault();
		// get the mouse cursor position at startup:
	    pos3 = e.clientX;
	    pos4 = e.clientY;
	    document.onmouseup = closeDragElement;
	    // call a function whenever the cursor moves:
	    document.onmousemove = elementDrag;
	}

	function elementDrag(e) {
	    e = e || window.event;
	    e.preventDefault();
	    // calculate the new cursor position:
	    pos1 = pos3 - e.clientX;
	    pos2 = pos4 - e.clientY;
	    pos3 = e.clientX;
	    pos4 = e.clientY;
	    // set the element's new position:
	    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
	    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
	}

	function closeDragElement() {
	    // stop moving when mouse button is released:
	    document.onmouseup = null;
	    document.onmousemove = null;
	}
}

dragElement(document.getElementById("foreground_app"));*/