var l = 0, t = 0;
var elements;

function startDrag () {
	// object mulai didrag
	console.log('dragged');
}

function whileDrag () {
	// yang terjadi ketika objek sedang didrag
	console.log('im dragging');
	elements = document.getElementById("object");

	// deteksi top dan left by mouse position untuk nanti diset ketika object didrop
	document.addEventListener("dragover", function(e){
		e = e || window.event;
		l = e.pageX, t = e.pageY;
	}, false);
}

function stopDrag () {
	// yang terjadi ketika objek sudah didrop
	console.log('dropped');
	elements.style.left = l+'px';	//change 300px with l
    elements.style.top = t+'px';	//change 300px with t
}