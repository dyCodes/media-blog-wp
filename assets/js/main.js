/*!
 *--------------
 * File main.js
 *---------------------------------
 */

/***
 * DOM Selector helper function
 */
const selectElem = (elem, all = false) => {
	elem = elem.trim();
	if (all) {
		return [...document.querySelectorAll(elem)];
	} else {
		return document.querySelector(elem);
	}
};

/***
 * Scrolls to an element with header offset
 */
const scrollto = (elem) => {
	let elementPos = selectElem(elem).offsetTop;
	// header offset - 60
	window.scrollTo({
		top: elementPos - 60,
		behavior: 'smooth',
	});
};

(function () {
	console.log('Main.js');

	// SHOW SEARCH FORM ON SEARCHBTN CLICK
	let searchForm = selectElem('#header .search-form');
	selectElem('#searchBtn').addEventListener('click', () => {
		searchForm.classList.add('slideUp');
		selectElem('#header .search-form form input').focus();
	});
	selectElem('#header .search-form .overlay').addEventListener('click', () => {
		searchForm.classList.remove('slideUp');
	});

	window.addEventListener('scroll', () => {
		// SHOW BACK2TOP BUTTON
		let position = window.scrollY;
		if (position > 500) {
			selectElem('#back2Top').classList.add('_show');
		} else {
			selectElem('#back2Top').classList.remove('_show');
		}
	});
	selectElem('#back2Top').addEventListener('click', () => {
		scrollto('#header');
	});
})();
