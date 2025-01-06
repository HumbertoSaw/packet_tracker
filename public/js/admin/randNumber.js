/******/ (() => { // webpackBootstrap
/*!******************************************!*\
  !*** ./resources/js/admin/randNumber.js ***!
  \******************************************/
document.addEventListener('DOMContentLoaded', function () {
  var randomTrackingNumber = Math.floor(10000000 + Math.random() * 90000000);
  document.getElementById('tracking_number').value = randomTrackingNumber;
});
/******/ })()
;