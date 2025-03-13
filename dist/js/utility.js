"use strict";
(self["webpackChunkmyproject"] = self["webpackChunkmyproject"] || []).push([["utility"],{

/***/ "./src/js/utils/debounce.js":
/*!**********************************!*\
  !*** ./src/js/utils/debounce.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
// debounce関数の定義
function debounce(func, wait) {
  var timeout;
  return function () {
    var context = this,
      args = arguments;
    clearTimeout(timeout);
    timeout = setTimeout(function () {
      func.apply(context, args);
    }, wait);
  };
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (debounce);

/***/ })

}]);
//# sourceMappingURL=utility.js.map