/******/ (() => { // webpackBootstrap
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
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
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other entry modules.
(() => {
/*!*************************!*\
  !*** ./src/js/admin.js ***!
  \*************************/
jQuery(function ($) {
  $('.term-thumbnail-upload').on('click', function (e) {
    e.preventDefault(); // デフォルトの動作を防ぐ
    var button = $(this);
    var custom_uploader = wp.media({
      title: '画像を選択',
      button: {
        text: 'この画像を使用'
      },
      multiple: false
    }).on('select', function () {
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      button.prev('input').val(attachment.url);
    }).open();
  });
});
})();

// This entry needs to be wrapped in an IIFE because it needs to be in strict mode.
(() => {
"use strict";
/*!*****************************!*\
  !*** ./src/scss/admin.scss ***!
  \*****************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

})();

/******/ })()
;
//# sourceMappingURL=admin.js.map