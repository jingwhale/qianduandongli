(function() {
	function e(e) {
		if (!e || e == u) return;
		var t = $("#iframeContainer"),
		n = $("#playerFrame"),
		i = o[e];
		l.css("top", 260 - Math.floor(i.height / 2) + "px"),
		l.css("left", 420 - Math.floor(i.width / 2) + "px"),
		l.html(i.src),
		$("#tabs .active").removeClass("active"),
		$("#tabs ." + e).parent().addClass("active"),
		t.css("display", "block"),
		t.css("width", i.width + "px"),
		t.css("height", i.height + "px"),
		t.css("marginTop", "-" + Math.floor(i.height / 2) + "px"),
		t.css("marginLeft", "-" + Math.floor(i.width / 2) + "px"),
		n.attr("src", i.src);
		var s = a;
		do s = Math.ceil(Math.random() * 10);
		while (s === a);
		var t = $("#container");
		t.removeClass("theme-" + a),
		t.addClass("theme-" + s),
		a = s,
		r(e);
		var f = +(new Date);
		c && typeof monitor != "undefined" && monitor.log({
			player: u,
			staytime: f - c
		},
		"detail"),
		c = f,
		u = e
	}
	function t() {
		$("#tabs").delegate("a", "click",
		function(t) {
			t.preventDefault();
			var n = $(this).attr("data-tab");
			e(n)
		})
	}
	function n() {
		var e = ["theme-1.jpg", "theme-2.jpg", "theme-3.jpg", "theme-4.jpg", "theme-5.jpg", "theme-6.jpg", "theme-7.jpg", "theme-8.jpg", "theme-9.jpg", "theme-10.jpg"];
		for (var t = 0,
		n = e.length; t < n; t++)(new Image).src = e[t]
	}
	function r(e) {
		window.localStorage && (localStorage[f] = e)
	}
	function i() {
		var e = "xiami",
		t = "notset",
		n = location.href,
		r = {
			douban: 1,
			kugou: 1,
			kuwo: 1,
			yinyuetai: 1,
			xiami: 1,
			duomi: 1,
			beiwa: 1,
			duole: 1
		};
		return n.indexOf("#") != -1 && r[n.split("#")[1]] == 1 ? t = e = n.split("#")[1] : window.localStorage && localStorage[f] && (t = e = localStorage[f]),
		typeof monitor != "undefined" && monitor.log({
			defaultplayer: t
		},
		"detail"),
		e
	}
	function s() {
		t(),
		e(i()),
		setTimeout(n, 1e4)
	}
	var o = {
		douban: {
			src: "http://douban.fm/partner/player360",
			width: 640,
			height: 380
		},
		kuwo: {
			src: "http://player.kuwo.cn/webmusic/web/play?f=hao360",
			width: 741,
			height: 516
		},
		xiami: {
			src: "http://www.xiami.com/player/hao360",
			width: 740,
			height: 515
		},
		kugou: {
			src: "http://web.kugou.com/360new.html",
			width: 740,
			height: 515
		},
		yinyuetai: {
			src: "http://www.yinyuetai.com/360/yinyuetv",
			width: 745,
			height: 500
		},
		duomi: {
			src: "http://app.duomiyy.com/webradio/360/",
			width: 700,
			height: 520
		},
		beva: {
			src: "http://app.beva.com/360/navfm",
			width: 740,
			height: 515
		},
		duole: {
			src: "http://www.duole.com/application/qihu360",
			width: 740,
			height: 513
		}
	},
	u = null,
	a = 0,
	f = "playerTab",
	l = $("#url"),
	c = 0;
	s()
})();