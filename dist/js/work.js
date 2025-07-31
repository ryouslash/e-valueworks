/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ ((module) => {

module.exports = jQuery;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!************************!*\
  !*** ./src/js/work.js ***!
  \************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

jquery__WEBPACK_IMPORTED_MODULE_0___default()(function () {
  initAjaxFormSubmit();
  initAjaxLoadMore();
});

/**
 * 現在の言語スラッグを取得（htmlのlang属性から）
 */
function getCurrentLang() {
  return document.documentElement.lang;
}

/**
 * AJAX フィルターフォーム送信処理
 */
function initAjaxFormSubmit() {
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(".js-ajax-form").on("submit", function (e) {
    e.preventDefault();
    // ページ情報をリセット
    var page = 1;
    var formData = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this).serialize();
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      url: my_ajax.url,
      type: "POST",
      data: formData + "&action=filter_work_posts&nonce=" + my_ajax.nonce + "&page=" + page + "&lang=" + getCurrentLang() // ← 言語情報を追加
    }).done(function (res) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(".p-archive-work__result").html(res);
    });
  });
}

/**
 * AJAX 「もっと見る」処理
 */
function initAjaxLoadMore() {
  jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).on("click", ".js-load-more button", function () {
    var $btn = jquery__WEBPACK_IMPORTED_MODULE_0___default()(this);
    var page = parseInt($btn.data("page"));
    page++;
    $btn.data("page", page);
    var max = parseInt($btn.data("max"));
    var formData = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".js-ajax-form").serialize();
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      url: my_ajax.url,
      type: "POST",
      data: formData + "&action=see_more_work&nonce=" + my_ajax.nonce + "&page=" + page + "&lang=" + getCurrentLang()
    }).done(function (res) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(".p-archive-work__items").append(res);
      if (page >= max) {
        $btn.closest(".js-load-more").remove();
      }
    });
  });
}
})();

/******/ })()
;
//# sourceMappingURL=work.js.map