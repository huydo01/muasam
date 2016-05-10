/*! Visit www.menucool.com for source code, other menu scripts and web UI controls
*  Please keep this notice intact. Thank you. */

var sse1 = function () {
    var rebound = 20; //set it to 0 if rebound effect is not prefered
    var slip, k;
    return {
        buildMenu: function () {
            var m = document.getElementById('sses1');	//Chọn phần tử có id sses1
            if(!m) return;	//Nếu ko tồn tại thì kết thúc
            var ul = m.getElementsByTagName("ul")[0];	//Chọn phần tử ul con đầu tiên
            m.style.width = ul.offsetWidth+1+"px";	//Gán phần tử có id sses1 = độ rộng của ul con đầu tiên + 1 (px)
            var items = m.getElementsByTagName("li");	//Chọn mảng phần tử li con.
            var a = m.getElementsByTagName("a");	//Chọn mảng phần tử a.

            slip = document.createElement("li");//
            slip.className = "highlight";//3 dòng này tạo thêm 1 li con có class là highlight trong ul
            ul.appendChild(slip);//

            /*var url = document.location.href.toLowerCase();	//Lấy đường dẫn trên trình duyệt.
            k = -1;
            var nLength = -1;
            for (var i = 0; i < a.length; i++) {	//Lặp từng phần tử con a
				//Nếu tìm thấy giá trị của thẻ href của phần tử a trên trình duyệt và độ dài giá trị > -1
                if (url.indexOf(a[i].href.toLowerCase()) != -1 && a[i].href.length > nLength) {
                    k = i;
                    nLength = a[i].href.length;
                }
            }	//Vòng lặp lấy giá trị của phần tử có url chứa trong url trên trình duyệt
			
			
			//Nếu ko có phần tử a nào có href chứa trong url trên thanh địa chỉ
            if (k == -1 && /:\/\/(?:www\.)?[^.\/]+?\.[^.\/]+\/?$/.test) {
                for (var i = 0; i < a.length; i++) {
                    if (a[i].getAttribute("maptopuredomain") == "true") {
                        k = i;
                        break;
                    }
                }
                if (k == -1 && a[0].getAttribute("maptopuredomain") != "false")
                    k = 0;
            }*/
			
			for (var i = 0; i < a.length; i++) {	//Chỉnh sửa
				if (a[i].getAttribute("class") == "q_lihover") {
					k = i;
					break;
				}
			}
			if (k == -1) {
				k = 0;
			}
			

            if (k > -1) {
                slip.style.width = items[k].offsetWidth + "px";
                //slip.style.left = items[k].offsetLeft + "px";
                sse1.move(items[k]); //comment out this line and uncomment the line above to disable initial animation
            }
            else {
                slip.style.visibility = "hidden";
            }

            for (var i = 0; i < items.length - 1; i++) {
                items[i].onmouseover = function () {
                    if (k == -1) slip.style.visibility = "visible";
                    if (this.offsetLeft != slip.offsetLeft) {
                        sse1.move(this);
                    }
                }
            }

            m.onmouseover = function () {
                if (slip.t2)
                    slip.t2 = clearTimeout(slip.t2);
            };

            m.onmouseout = function () {
                if (k > -1 && items[k].offsetLeft != slip.offsetLeft) {
                    slip.t2 = setTimeout(function () { sse1.move(items[k]); }, 50);
                }
                if (k == -1) slip.t2 = setTimeout(function () { slip.style.visibility = "hidden"; }, 50);
            };
        },
        move: function (target) {
            clearInterval(slip.timer);
            var direction = (slip.offsetLeft < target.offsetLeft) ? 1 : -1;
            slip.timer = setInterval(function () { sse1.mv(target, direction); }, 15);
        },
        mv: function (target, direction) {
            if (direction == 1) {
                if (slip.offsetLeft - rebound < target.offsetLeft)
                    this.changePosition(target, 1);
                else {
                    clearInterval(slip.timer);
                    slip.timer = setInterval(function () {
                        sse1.recoil(target, 1);
                    }, 15);
                }
            }
            else {
                if (slip.offsetLeft + rebound > target.offsetLeft)
                    this.changePosition(target, -1);
                else {
                    clearInterval(slip.timer);
                    slip.timer = setInterval(function () {
                        sse1.recoil(target, -1);
                    }, 15);
                }
            }
            this.changeWidth(target);
        },
        recoil: function (target, direction) {
            if (direction == -1) {
                if (slip.offsetLeft > target.offsetLeft) {
                    slip.style.left = target.offsetLeft + "px";
                    clearInterval(slip.timer);
                }
                else slip.style.left = slip.offsetLeft + 2 + "px";
            }
            else {
                if (slip.offsetLeft < target.offsetLeft) {
                    slip.style.left = target.offsetLeft + "px";
                    clearInterval(slip.timer);
                }
                else slip.style.left = slip.offsetLeft - 2 + "px";
            }
        },
        changePosition: function (target, direction) {
            if (direction == 1) {
                //following +1 will fix the IE8 bug of x+1=x, we force it to x+2
                slip.style.left = slip.offsetLeft + Math.ceil(Math.abs(target.offsetLeft - slip.offsetLeft + rebound) / 10) + 1 + "px";
            }
            else {
                //following -1 will fix the Opera bug of x-1=x, we force it to x-2
                slip.style.left = slip.offsetLeft - Math.ceil(Math.abs(slip.offsetLeft - target.offsetLeft + rebound) / 10) - 1 + "px";
            }
        },
        changeWidth: function (target) {
            if (slip.offsetWidth != target.offsetWidth) {
                var diff = slip.offsetWidth - target.offsetWidth;
                if (Math.abs(diff) < 4) slip.style.width = target.offsetWidth + "px";
                else slip.style.width = slip.offsetWidth - Math.round(diff / 3) + "px";
            }
        }
    };
} ();

if (window.addEventListener) {
    window.addEventListener("load", sse1.buildMenu, false);
}
else if (window.attachEvent) {
    window.attachEvent("onload", sse1.buildMenu);
}
else {
    window["onload"] = sse1.buildMenu;
}