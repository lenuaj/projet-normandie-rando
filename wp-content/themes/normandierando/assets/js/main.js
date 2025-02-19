

window.addEventListener('load', () => {
	//swiper media product
	let prodcutGallery = document.querySelector(".r14-gallery-media-product");
	new Swiper(prodcutGallery, {
		speed: 4000,
		slidesPerView: 4,
		loop: true,
		spaceBetween: 20,
		autoplay: {
			delay: 4000
		}
	});

	let r14Etapes = document.querySelector(".r14-itineraire-swiper");
	new Swiper(r14Etapes, {
		speed: 2000,
		slidesPerView: 1,
		direction: 'vertical',
		spaceBetween: 20,
	});


  //get header height
	let header = document.querySelector("[data-elementor-type=header]");
	let headerHeight = header.offsetHeight;

	//get admin bar height
	let adminBar = document.querySelector("#wpadminbar");
	let adminBarHeight = adminBar ? adminBar.offsetHeight : 0;

	let r14Nav = document.querySelector(".r14-nav");
	let r14NavLinks = r14Nav.querySelectorAll("a");

	//add active class to the current link if div as anchor is in view and is last active
	window.addEventListener('scroll', () => {
		r14NavLinks.forEach(link => {
			let href = link.getAttribute("href");
			let target = document.querySelector(href);
			if (target) {
				let targetTop = target.getBoundingClientRect().top;
				if (targetTop <= 0) {
					r14NavLinks.forEach(link => {
						link.classList.remove("active");
					});
					link.classList.add("active");
				}
			}
		});
	});

	let decaleheight = headerHeight + adminBarHeight;

		let r14Price = document.querySelector(".r14-price");
		let r14PriceTop = r14Price.offsetTop;
		let parent = r14Price.parentElement;
		window.addEventListener('scroll', () => {
			if (parent.getBoundingClientRect().top <= 95) {
				r14Price.classList.add("sticky");
			} else {
				r14Price.classList.remove("sticky");
			}
		});

})
