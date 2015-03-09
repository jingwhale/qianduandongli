function dbank_str_trim(a) {
    return a != null ? a.replace(/(^\s*)|(\s*$)/g, "") : a
} 
(function() {
    var a = navigator.appVersion.indexOf("MSIE") != -1,
    b = /webkit\/(\d+)/i.test(navigator.userAgent) && RegExp.$1 < 525,
    c = [],
    d = function() {
        for (var a = 0; a < c.length; a++) c[a]()
    },
    e = document;
    e.dbankpl_ready = function(f) {
        if (!a && !b && e.addEventListener) return e.addEventListener("DOMContentLoaded", f, !1);
        if (c.push(f) > 1) return;
        if (a)(function() {
            try {
                e.documentElement.doScroll("left"),
                d()
            } catch(a) {
                setTimeout(arguments.callee, 0)
            }
        })();
        else if (b) var g = setInterval(function() { / ^(loaded | complete) $ / .test(e.readyState) && (clearInterval(g), d())
        },
        0)
    }
})(),
document.onclick = function(a) {
    var b = a || window.event,
    c = b.target ? b.target: b.srcElement,
    d = dbank_str_trim(c.getAttribute("href"));
    if (d != null && d.indexOf("http://dl.vmall.com/") == 0) return ! 1;
    if (d != null && d.indexOf("http://dl.dbank.com/d/") == 0) return ! 1
},
create_dbankpl_fu = function() {
    dbankpl_is_mouse_down = !1;
    var a = document.body.offsetWidth;
    a = (a - 704) / 2,
    a < 0 && (a = 0),
    dbankpl_div_left = a,
    dbankpl_div_top = "120",
    dbankpl_div = document.getElementById("DBANKPL_DIV_F");
    if (!dbankpl_div) {
        dbankpl_div = document.createElement("div"),
        dbankpl_div.id = "DBANKPL_DIV_F",
        dbankpl_div.style.display = "none",
        dbankpl_div.style.left = dbankpl_div_left + "px";
        if (navigator.appVersion.indexOf("MSIE 6") != -1) {
            var b = parseInt(document.documentElement.scrollTop) + parseInt(dbankpl_div_top);
            dbankpl_div.style.top = b + "px",
            dbankpl_div.style.position = "absolute"
        } else dbankpl_div.style.top = dbankpl_div_top + "px",
        dbankpl_div.style.position = "fixed";
        dbankpl_div.style.background = "transparent",
        dbankpl_div.style.zIndex = "9999",
        navigator.appVersion.indexOf("MSIE 6") != -1 ? dbankpl_iframe = document.createElement('<iframe frameborder="0" scrolling="no" width="586" height="479" src="">') : (dbankpl_iframe = document.createElement("iframe"), dbankpl_iframe.frameBorder = 0, dbankpl_iframe.scrolling = "no", dbankpl_iframe.width = 586, dbankpl_iframe.height = 479, dbankpl_iframe.src = ""),
        dbankpl_drag_div = document.createElement("div"),
        dbankpl_drag_div.id = "DBANKPL_DRAG_DIV",
        dbankpl_drag_div.style.position = "absolute",
        dbankpl_drag_div.style.top = 0,
        dbankpl_drag_div.style.left = "220px",
        dbankpl_drag_div.style.width = "300px",
        dbankpl_drag_div.style.height = "52px",
        dbankpl_drag_div.style.cursor = "move",
        dbankpl_drag_div.style.zIndex = "9999",
        dbankpl_drag_div.onmousedown = function(a) {
            var b = a || window.event;
            return dx = b.clientX,
            dy = b.clientY,
            sx = parseInt(dbankpl_div.style.left),
            sy = parseInt(dbankpl_div.style.top),
            dbankpl_is_mouse_down || (dbankpl_is_mouse_down = !0),
            !1
        },
        dbankpl_close_div = document.createElement("div"),
        dbankpl_close_div.id = "DBANKPL_CLOSE_DIV",
        dbankpl_close_div.title = "\u5173\u95ed",
        dbankpl_close_div.style.position = "absolute",
        dbankpl_close_div.style.top = 0,
        dbankpl_close_div.style.right = 0,
        dbankpl_close_div.style.width = "42px",
        dbankpl_close_div.style.height = "33px",
        dbankpl_close_div.style.cursor = "pointer",
        dbankpl_close_div.style.zIndex = "9999",
        dbankpl_close_div.onclick = function() {
            dbankpl_iframe.src = "",
            dbankpl_iframe.attachEvent ? dbankpl_iframe.detachEvent("onload", iframe_on) : dbankpl_iframe.onload = "",
            dbankpl_mainframe_div.style.display = "none",
            dbankpl_div.style.display = "none"
        },
        dbankpl_mainframe_div = document.createElement("div"),
        dbankpl_mainframe_div.id = "DBANKPL_MAINFRAME_DIV",
        dbankpl_mainframe_div.style.position = "absolute",
        dbankpl_mainframe_div.style.top = 0,
        dbankpl_mainframe_div.style.left = 0,
        dbankpl_mainframe_div.style.width = "586px",
        dbankpl_mainframe_div.style.height = "479px",
		dbankpl_mainframe_div.style.display = "none",
        dbankpl_mainframe_div.style.backgroundColor = "transparent",
        dbankpl_mainframe_div.style.zIndex = "99999",
        dbankpl_mainframe_div.innerHTML = "<div style='margin:0 auto;margin-top:200px;color:#888888;width:220px;font-size:20px;position: relative;'><img src='http://st1.dbank.com/netdisk/images/waiting.gif'><div style='width:250px;height:50px;position: absolute;top:-5px;left:25px;font-size: 17px;'><b>\u6b63\u5728\u52aa\u529b\u52a0\u8f7d...</b></div></div>",
        dbankpl_div.appendChild(dbankpl_close_div),
        dbankpl_div.appendChild(dbankpl_mainframe_div),
        dbankpl_div.appendChild(dbankpl_drag_div),
        dbankpl_div.appendChild(dbankpl_iframe);
        try {
            document.body.appendChild(dbankpl_div)
        } catch(c) {}
    }
    iframe_on = function() {
        dbankpl_mainframe_div.style.display = "none"
    };
    var d = document.getElementsByTagName("a"),
    e = d.length;
    for (var f = 0; f < e; f++) {
        var g = dbank_str_trim(d[f].getAttribute("href"));
        if (g != null && g.indexOf("http://dl.vmall.com/") == 0) {
            var h = d[f].innerHTML;
            h.indexOf("dl.vmall.com/") != -1 && (d[f].innerHTML = "\u534E\u4E3A\u7F51\u76D8\u4E0B\u8F7D")
        }
    }
    var i = function() {
        dbankpl_iframe.attachEvent ? dbankpl_iframe.attachEvent("onload", iframe_on) : dbankpl_iframe.onload = iframe_on;
        if (navigator.appVersion.indexOf("MSIE 6") != -1) {
            var a = parseInt(document.documentElement.scrollTop) + parseInt(dbankpl_div_top);
            dbankpl_div.style.top = a + "px"
        }
        dbankpl_div.style.display = "",
        document.onmouseup = function() {
            return dbankpl_is_mouse_down && (dbankpl_is_mouse_down = !1),
            !1
        },
        document.onmousemove = function(a) {
            var b = a || window.event;
            if (dbankpl_is_mouse_down) return dbankpl_div_left = b.clientX - (dx - sx),
            dbankpl_div.style.left = dbankpl_div_left + "px",
            navigator.appVersion.indexOf("MSIE 6") != -1 ? (dbankpl_div_top_6 = b.clientY - (dy - sy), dbankpl_div.style.top = dbankpl_div_top_6 + "px") : (dbankpl_div_top = b.clientY - (dy - sy), dbankpl_div.style.top = dbankpl_div_top + "px"),
            !1
        }
    };
    document.onclick = function(a) {
        var b = a || window.event,
        c = b.target ? b.target: b.srcElement,
        d = c.parentNode,
        e = c.parentNode.parentNode,
        f = "";
        c.nodeName == "A" ? f = c: d.nodeName == "A" ? f = d: e.nodeName == "A" && (f = e);
        if (f == "") return;
        var g = dbank_str_trim(f.getAttribute("href"));
        if (g != null && g.indexOf("http://dl.vmall.com/") == 0 ) {
			setTimeout(function(){dbankpl_mainframe_div.style.display = "";},1500);
			setTimeout(function(){if(dbankpl_mainframe_div.style.display != "none")dbankpl_mainframe_div.style.display = "none";},15000);
            //dbankpl_mainframe_div.style.display = "";
            var h = g.substr(20);
			return dbankpl_iframe.src = "http://dl.vmall.com/mini_Show.html?id=" + h,
            i(),
            !1
        }
        if (g != null && g.indexOf("http://dl.dbank.com/") == 0) {
            setTimeout(function(){dbankpl_mainframe_div.style.display = "";},1500);
			setTimeout(function(){if(dbankpl_mainframe_div.style.display != "none")dbankpl_mainframe_div.style.display = "none";},15000);
			//dbankpl_mainframe_div.style.display = "";
            var h = g.substr(20);
		    return dbankpl_iframe.src = "http://dl.vmall.com/mini_Show.html?id=" + h,
            i(),
            !1
        }
    }
},
document.dbankpl_ready(function() {
    create_dbankpl_fu()
});