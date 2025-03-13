// debounce関数の定義
function debounce(func, wait) {
  let timeout;
  return function () {
    const context = this,
      args = arguments;
    clearTimeout(timeout);
    timeout = setTimeout(function () {
      func.apply(context, args);
    }, wait);
  };
}

export default debounce;