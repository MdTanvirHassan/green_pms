/*
	A simple class for displaying file information and progress
	Note: This is a demonstration only and not part of SWFUpload.
	Note: Some have had problems adapting this class in IE7. It may not be suitable for your application.
*/

// Constructor
// file is a SWFUpload file object
// targetID is the HTML element id attribute that the FileProgress HTML structure will be added to.
// Instantiating a new FileProgress object with an existing file will reuse/update the existing DOM elements


function FileProgress(file, targetID) {
	this.fileProgressID = file.id;

	this.opacity = 100;
	this.height = 0;
	

	this.fileProgressWrapper = document.getElementById(this.fileProgressID);
	if (!this.fileProgressWrapper) {
		this.fileProgressWrapper = document.createElement("div");
		this.fileProgressWrapper.className = "progressWrapper";
		this.fileProgressWrapper.id = this.fileProgressID;

		this.fileProgressElement = document.createElement("div");
		this.fileProgressElement.className = "progressContainer";

		var progressCancel = document.createElement("a");
		progressCancel.className = "progressCancel";
		progressCancel.href = "javascript:";
		progressCancel.style.visibility = "hidden";
		progressCancel.appendChild(document.createTextNode(" "));

		var progressText = document.createElement("div");
		progressText.className = "progressName";
		progressText.appendChild(document.createTextNode(o.formatFileName(file.name,520,true)));

		var progressBar = document.createElement("div");
		progressBar.className = "progressBarInProgress";
		
		var progressBarContainer = document.createElement("div");
		progressBarContainer.className = "progressBarContainer";
		progressBarContainer.appendChild(progressBar);
		
		var progressStatus = document.createElement("div");
		progressStatus.className = "progressBarStatus";
		progressStatus.innerHTML = "&nbsp;";
		
		var progressPercent = document.createElement("div");
		progressStatus.className = "progressPercent";
		progressStatus.innerHTML = "&nbsp;";
		
		var progressUploading = document.createElement("div");
		progressStatus.className = "progressUploading";
		progressStatus.innerHTML = "&nbsp;";
		
		var progressTimeRemaining = document.createElement("div");
		progressStatus.className = "progressTimeRemaining";
		progressStatus.innerHTML = "&nbsp;";
		
		var progressSpeed = document.createElement("div");
		progressStatus.className = "progressSpeed";
		progressStatus.innerHTML = "&nbsp;";

		this.fileProgressElement.appendChild(progressCancel);
		this.fileProgressElement.appendChild(progressText);
		this.fileProgressElement.appendChild(progressStatus);
		this.fileProgressElement.appendChild(progressBarContainer);
		this.fileProgressElement.appendChild(progressPercent);
		this.fileProgressElement.appendChild(progressUploading);
		this.fileProgressElement.appendChild(progressTimeRemaining);
		this.fileProgressElement.appendChild(progressSpeed);

		this.fileProgressWrapper.appendChild(this.fileProgressElement);
		document.getElementById(targetID).appendChild(this.fileProgressWrapper);
	} else {
		this.fileProgressElement = this.fileProgressWrapper.firstChild;
		this.reset();
	}

	this.height = this.fileProgressWrapper.offsetHeight;
	this.setTimer(null);
	
}

FileProgress.prototype.setTimer = function (timer) {
	this.fileProgressElement["FP_TIMER"] = timer;
};
FileProgress.prototype.getTimer = function (timer) {
	return this.fileProgressElement["FP_TIMER"] || null;
};

FileProgress.prototype.reset = function () {
	this.fileProgressElement.className = "progressContainer";

	this.fileProgressElement.childNodes[2].innerHTML = "&nbsp;";
	this.fileProgressElement.childNodes[2].className = "progressBarStatus";
	
	this.fileProgressElement.childNodes[3].className = "progressBarContainer";
	this.fileProgressElement.childNodes[3].childNodes[0].className = "progressBarInProgress";
	this.fileProgressElement.childNodes[3].childNodes[0].style.width = "0%";
	
	this.fileProgressElement.childNodes[4].className = "progressPercent";
	this.fileProgressElement.childNodes[5].className = "progressUploading";
	this.fileProgressElement.childNodes[6].className = "progressTimeRemaining";
	this.fileProgressElement.childNodes[7].className = "progressSpeed";
	this.appear();	
};

FileProgress.prototype.setProgress = function (percentage) {
	this.fileProgressElement.className = "progressContainer green";
	this.fileProgressElement.childNodes[3].childNodes[0].className = "progressBarInProgress";
	this.fileProgressElement.childNodes[3].childNodes[0].style.width = percentage + "%";

	this.appear();	
};
FileProgress.prototype.setComplete = function () {
	this.fileProgressElement.className = "progressContainer blue";
	this.fileProgressElement.childNodes[3].childNodes[0].className = "progressBarComplete";
	this.fileProgressElement.childNodes[3].childNodes[0].style.width = "100%";
	this.fileProgressElement.childNodes[0].className = "progressComplete";
	this.fileProgressElement.childNodes[0].style.visibility = "hidden";
	var oSelf = this;
	this.setTimer(setTimeout(function () {
		oSelf.disappear();
	}, 500));
};
FileProgress.prototype.setError = function () {
	this.fileProgressElement.className = "progressContainer red";
	this.fileProgressElement.childNodes[3].childNodes[0].className = "progressBarError";
	this.fileProgressElement.childNodes[3].childNodes[0].style.width = "";

	var oSelf = this;
	this.setTimer(setTimeout(function () {
		oSelf.disappear();
	}, 500));
};
FileProgress.prototype.setCancelled = function () {
	this.fileProgressElement.className = "progressContainer";
	this.fileProgressElement.childNodes[3].childNodes[0].className = "progressBarError";
	this.fileProgressElement.childNodes[3].childNodes[0].style.width = "";

	var oSelf = this;
	this.setTimer(setTimeout(function () {
		oSelf.disappear();
	}, 500));
};
FileProgress.prototype.setStatus = function (status) {
	this.fileProgressElement.childNodes[2].innerHTML = status;
};

FileProgress.prototype.setPercent = function (percent) {
	
	this.fileProgressElement.childNodes[4].innerHTML = percent+"%";
};

FileProgress.prototype.setUploading = function (bytesLoaded, bytesTotal) {
	this.fileProgressElement.childNodes[5].innerHTML = bytesLoaded+" uploaded of "+bytesTotal;
};

FileProgress.prototype.setTimeRemaining = function (timeRemain) {
	var ret = "";
	if(typeof(timeRemain) == "string"){
		ret = timeRemain;
	}
	else if(timeRemain<=60){
		ret = Math.ceil(timeRemain)+" Seconds Remaining";
	}
	else{
		ret = Math.ceil((timeRemain/60))+" Minutes Remaining";
	}
	this.fileProgressElement.childNodes[6].className = "progressTimeRemaining";
	this.fileProgressElement.childNodes[6].innerHTML = ret;
};

FileProgress.prototype.setUploadSpeed = function (speed) {
	var ret = "";
	if(speed<=1048576){
		ret = Math.ceil(speed/1024)+" Kb/s";
	}
	else{
		ret = Math.ceil(speed/1048576)+" Kb/s";
	}
	this.fileProgressElement.childNodes[7].innerHTML = ret;
};


// Show/Hide the cancel button
FileProgress.prototype.toggleCancel = function (show, swfUploadInstance) {
	this.fileProgressElement.childNodes[0].style.visibility = show ? "visible" : "hidden";
	if (swfUploadInstance) {
		var fileID = this.fileProgressID;
		this.fileProgressElement.childNodes[0].onclick = function () {
			swfUploadInstance.cancelUpload(fileID);
			return false;
		};
	}
};

FileProgress.prototype.appear = function () {
	if (this.getTimer() !== null) {
		clearTimeout(this.getTimer());
		this.setTimer(null);
	}
	
	if (this.fileProgressWrapper.filters) {
		try {
			this.fileProgressWrapper.filters.item("DXImageTransform.Microsoft.Alpha").opacity = 100;
		} catch (e) {
			// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
			this.fileProgressWrapper.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=100)";
		}
	} else {
		this.fileProgressWrapper.style.opacity = 1;
	}
		
	this.fileProgressWrapper.style.height = "";
	
	this.height = this.fileProgressWrapper.offsetHeight;
	this.opacity = 100;
	this.fileProgressWrapper.style.display = "";
	
};

// Fades out and clips away the FileProgress box.
FileProgress.prototype.disappear = function () {

	var reduceOpacityBy = 15;
	var reduceHeightBy = 4;
	var rate = 30;	// 15 fps

	if (this.opacity > 0) {
		this.opacity -= reduceOpacityBy;
		if (this.opacity < 0) {
			this.opacity = 0;
		}

		if (this.fileProgressWrapper.filters) {
			try {
				this.fileProgressWrapper.filters.item("DXImageTransform.Microsoft.Alpha").opacity = this.opacity;
			} catch (e) {
				// If it is not set initially, the browser will throw an error.  This will set it if it is not set yet.
				this.fileProgressWrapper.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=" + this.opacity + ")";
			}
		} else {
			this.fileProgressWrapper.style.opacity = this.opacity / 100;
		}
	}

	if (this.height > 0) {
		this.height -= reduceHeightBy;
		if (this.height < 0) {
			this.height = 0;
		}

		this.fileProgressWrapper.style.height = this.height + "px";
	}

	if (this.height > 0 || this.opacity > 0) {
		var oSelf = this;
		this.setTimer(setTimeout(function () {
			oSelf.disappear();
		}, rate));
	} else {
		this.fileProgressWrapper.style.display = "none";
		this.setTimer(null);
	}
};;