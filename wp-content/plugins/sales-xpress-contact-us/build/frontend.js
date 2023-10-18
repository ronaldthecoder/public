/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/frontend.scss":
/*!***************************!*\
  !*** ./src/frontend.scss ***!
  \***************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/***/ (function(module) {

module.exports = window["React"];

/***/ }),

/***/ "react-dom":
/*!***************************!*\
  !*** external "ReactDOM" ***!
  \***************************/
/***/ (function(module) {

module.exports = window["ReactDOM"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ (function(module) {

module.exports = window["wp"]["element"];

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
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!*************************!*\
  !*** ./src/frontend.js ***!
  \*************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _frontend_scss__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./frontend.scss */ "./src/frontend.scss");




const divsToUpdate = document.querySelectorAll(".sales-xpress-contact-us");
const ContactUs = () => {
  const [fullName, setFullName] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)("");
  const [email, setEmail] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)("");
  const [message, setMessage] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)("");
  const [buttonText, setButtonText] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)("Submit");
  const [submitMessage, setSubmitMessage] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)("hidden");
  const [error, setError] = (0,react__WEBPACK_IMPORTED_MODULE_1__.useState)(false);
  const submitHandler = event => {
    event.preventDefault();
    if (fullName == "" || email == "" || message == "") {
      setError(true);
      setSubmitMessage("");
      setTimeout(() => {
        setSubmitMessage("hidden");
      }, 3000);
      return false;
    }
    setButtonText("Submitting...");
    setTimeout(() => {
      setError(false);
      setFullName("");
      setEmail("");
      setMessage("");
      setButtonText("Submit");
      setSubmitMessage("");
      setTimeout(() => {
        setSubmitMessage("hidden");
      }, 3000);
    }, 2000);
  };
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("section", {
    class: "contact-us-section flex-center"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "container flex-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: `popup rounded ${submitMessage} ${error ? "error" : ""}`,
    id: "popup"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", null, error ? "One or more fields has not been completed" : "Your message was successfully submitted, Thank you!")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "contact-us-description"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "265",
    height: "371",
    viewBox: "0 0 265 371",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg",
    class: "contact-us-lines-pattern--1"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M257.941 72.9083L2 328.825",
    stroke: "#D4EAF7",
    "stroke-width": "3",
    "stroke-miterlimit": "10"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M197.009 2L121.672 77.3369",
    stroke: "#D4EAF7",
    "stroke-width": "3",
    "stroke-miterlimit": "10"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M263.465 233.559L128.024 369",
    stroke: "#D4EAF7",
    "stroke-width": "3",
    "stroke-miterlimit": "10"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M169.294 189.247L72.373 286.193",
    stroke: "#D4EAF7",
    "stroke-width": "3",
    "stroke-miterlimit": "10"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "265",
    height: "371",
    viewBox: "0 0 265 371",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg",
    class: "contact-us-lines-pattern--2"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M257.941 72.9083L2 328.825",
    stroke: "#D4EAF7",
    "stroke-width": "3",
    "stroke-miterlimit": "10"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M197.009 2L121.672 77.3369",
    stroke: "#D4EAF7",
    "stroke-width": "3",
    "stroke-miterlimit": "10"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M263.465 233.559L128.024 369",
    stroke: "#D4EAF7",
    "stroke-width": "3",
    "stroke-miterlimit": "10"
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M169.294 189.247L72.373 286.193",
    stroke: "#D4EAF7",
    "stroke-width": "3",
    "stroke-miterlimit": "10"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("h1", null, "Have a questions? ", (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("br", null), "Feel free to reach out!"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
    class: "contact-us-info flex-col"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    className: "address-info flex-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "45",
    height: "45",
    viewBox: "0 0 45 45",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg",
    class: "svg-icons"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M35.1562 39.375H26.4621C27.9226 38.0709 29.2999 36.6766 30.5859 35.2002C35.4111 29.6508 37.9688 23.8008 37.9688 18.2812C37.9688 14.1787 36.339 10.2441 33.4381 7.34319C30.5371 4.44224 26.6026 2.8125 22.5 2.8125C18.3974 2.8125 14.4629 4.44224 11.5619 7.34319C8.66099 10.2441 7.03125 14.1787 7.03125 18.2812C7.03125 23.8008 9.58184 29.6508 14.4141 35.2002C15.7001 36.6766 17.0774 38.0709 18.5379 39.375H9.84375C9.47079 39.375 9.1131 39.5232 8.84938 39.7869C8.58566 40.0506 8.4375 40.4083 8.4375 40.7812C8.4375 41.1542 8.58566 41.5119 8.84938 41.7756C9.1131 42.0393 9.47079 42.1875 9.84375 42.1875H35.1562C35.5292 42.1875 35.8869 42.0393 36.1506 41.7756C36.4143 41.5119 36.5625 41.1542 36.5625 40.7812C36.5625 40.4083 36.4143 40.0506 36.1506 39.7869C35.8869 39.5232 35.5292 39.375 35.1562 39.375ZM9.84375 18.2812C9.84375 14.9246 11.1772 11.7054 13.5507 9.33193C15.9242 6.95842 19.1434 5.625 22.5 5.625C25.8566 5.625 29.0758 6.95842 31.4493 9.33193C33.8228 11.7054 35.1562 14.9246 35.1562 18.2812C35.1562 28.3412 25.4057 36.7383 22.5 39.0234C19.5943 36.7383 9.84375 28.3412 9.84375 18.2812ZM29.5312 18.2812C29.5312 16.8906 29.1189 15.5312 28.3463 14.3749C27.5737 13.2186 26.4755 12.3174 25.1907 11.7852C23.906 11.253 22.4922 11.1138 21.1283 11.3851C19.7643 11.6564 18.5115 12.3261 17.5282 13.3094C16.5448 14.2927 15.8752 15.5456 15.6039 16.9095C15.3326 18.2734 15.4718 19.6872 16.004 20.972C16.5361 22.2568 17.4374 23.3549 18.5936 24.1275C19.7499 24.9001 21.1094 25.3125 22.5 25.3125C24.3648 25.3125 26.1532 24.5717 27.4718 23.2531C28.7905 21.9345 29.5312 20.1461 29.5312 18.2812ZM18.2812 18.2812C18.2812 17.4469 18.5287 16.6312 18.9922 15.9374C19.4558 15.2437 20.1147 14.7029 20.8856 14.3836C21.6564 14.0643 22.5047 13.9808 23.323 14.1436C24.1414 14.3063 24.8931 14.7081 25.4831 15.2981C26.0731 15.8881 26.4749 16.6399 26.6377 17.4582C26.8005 18.2766 26.7169 19.1248 26.3976 19.8957C26.0783 20.6666 25.5376 21.3254 24.8438 21.789C24.15 22.2526 23.3344 22.5 22.5 22.5C21.3811 22.5 20.3081 22.0555 19.5169 21.2644C18.7257 20.4732 18.2812 19.4001 18.2812 18.2812Z",
    fill: "#030712"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    class: "title--1"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    class: "streetAddress"
  }, "9339 Hanover Rd."), "\xA0", (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    class: "city"
  }, "New Kensington"), ",\xA0", (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    class: "state"
  }, "PA"), "\xA0", (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("span", {
    class: "zipCode"
  }, "15068"), "\xA0")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    class: "phone-info flex-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "45",
    height: "45",
    viewBox: "0 0 45 45",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg",
    class: "svg-icons"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M39.0885 27.8543L30.8074 24.1436L30.7846 24.133C30.3547 23.9491 29.8857 23.8754 29.4201 23.9183C28.9545 23.9613 28.507 24.1197 28.118 24.3791C28.0722 24.4094 28.0282 24.4422 27.9862 24.4776L23.7076 28.125C20.9971 26.8084 18.1987 24.0311 16.882 21.3557L20.5348 17.0121C20.5699 16.9682 20.6033 16.9242 20.635 16.8768C20.8889 16.4888 21.0429 16.0441 21.0834 15.5823C21.1239 15.1204 21.0495 14.6557 20.867 14.2295V14.2084L17.1457 5.91329C16.9044 5.35653 16.4896 4.89273 15.963 4.59113C15.4365 4.28953 14.8266 4.16631 14.2242 4.23985C11.8423 4.55328 9.656 5.72304 8.07353 7.53065C6.49107 9.33825 5.62071 11.6601 5.62502 14.0625C5.62502 28.0195 16.9805 39.375 30.9375 39.375C33.3399 39.3793 35.6618 38.509 37.4694 36.9265C39.277 35.344 40.4467 33.1577 40.7602 30.7758C40.8339 30.1737 40.7109 29.5639 40.4096 29.0374C40.1084 28.5109 39.6449 28.0959 39.0885 27.8543ZM30.9375 36.5625C24.9721 36.556 19.253 34.1834 15.0348 29.9652C10.8167 25.7471 8.44403 20.0279 8.43752 14.0625C8.4309 12.346 9.04932 10.6857 10.1773 9.39184C11.3053 8.09793 12.8656 7.25884 14.567 7.03126C14.5663 7.03827 14.5663 7.04534 14.567 7.05235L18.2584 15.3141L14.625 19.6629C14.5881 19.7053 14.5546 19.7506 14.5248 19.7983C14.2603 20.2042 14.1051 20.6715 14.0743 21.155C14.0435 21.6386 14.1382 22.1218 14.349 22.558C15.9416 25.8152 19.2235 29.0725 22.5158 30.6633C22.9552 30.8722 23.4413 30.9636 23.9266 30.9284C24.4118 30.8933 24.8797 30.7329 25.2844 30.4629C25.3295 30.4325 25.3729 30.3996 25.4145 30.3645L29.6877 26.7188L37.9494 30.419C37.9494 30.419 37.9635 30.419 37.9688 30.419C37.744 32.1227 36.9061 33.6863 35.612 34.817C34.3178 35.9478 32.6561 36.5683 30.9375 36.5625Z",
    fill: "#030712"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    class: "phone title--1"
  }, "1 (800) 888 - 8888")), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", {
    class: "email-info flex-row"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
    width: "45",
    height: "45",
    viewBox: "0 0 45 45",
    fill: "none",
    xmlns: "http://www.w3.org/2000/svg",
    class: "svg-icons"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
    d: "M39.375 8.4375H5.625C5.25204 8.4375 4.89435 8.58566 4.63063 8.84938C4.36691 9.1131 4.21875 9.47079 4.21875 9.84375V33.75C4.21875 34.4959 4.51507 35.2113 5.04251 35.7387C5.56996 36.2662 6.28533 36.5625 7.03125 36.5625H37.9688C38.7147 36.5625 39.43 36.2662 39.9575 35.7387C40.4849 35.2113 40.7812 34.4959 40.7812 33.75V9.84375C40.7812 9.47079 40.6331 9.1131 40.3694 8.84938C40.1056 8.58566 39.748 8.4375 39.375 8.4375ZM35.7592 11.25L22.5 23.4053L9.24082 11.25H35.7592ZM37.9688 33.75H7.03125V13.0412L21.549 26.3496C21.8085 26.5878 22.1478 26.7199 22.5 26.7199C22.8522 26.7199 23.1915 26.5878 23.451 26.3496L37.9688 13.0412V33.75Z",
    fill: "#030712"
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("p", {
    class: "email title--1"
  }, "startercode.dev@gmail.com")))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("form", {
    class: "contact-us-form",
    id: "contact-us-form",
    method: "post"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("img", {
    class: "contact-us-form-ending",
    src: `${salesXpressData.root_url}/wp-content/plugins/sales-xpress-contact-us/assets/images/contact-us-form-ending.svg`,
    alt: ""
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "flex-col"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    class: "title--2",
    htmlFor: "fullName"
  }, "Full Name"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "text",
    id: "fullName",
    name: "fullName",
    placeholder: "John doe",
    class: `rounded field ${fullName == "" && error ? "missing" : ""}`,
    value: fullName,
    onChange: e => {
      setFullName(e.target.value);
    }
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "flex-col"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    class: "title--2",
    htmlFor: "email"
  }, "Email"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    type: "email",
    id: "email",
    name: "email",
    placeholder: "johndoe@gmail.com",
    class: `rounded field ${email == "" && error ? "missing" : ""}`,
    value: email,
    onChange: e => {
      setEmail(e.target.value);
    }
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    class: "flex-col"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("label", {
    class: "title--2",
    htmlFor: "message"
  }, "Message"), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("textarea", {
    name: "message",
    id: "message",
    cols: "30",
    rows: "7",
    placeholder: "Tell us about yourself ...",
    class: `rounded ${message == "" && error ? "missing" : ""}`,
    value: message,
    onChange: e => {
      setMessage(e.target.value);
    }
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("input", {
    class: "submit rounded-full",
    type: "submit",
    value: buttonText,
    onClick: submitHandler
  }))));
};
divsToUpdate.forEach(element => {
  const data = JSON.parse(element.querySelector("pre").innerHTML);
  react_dom__WEBPACK_IMPORTED_MODULE_2___default().render((0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(ContactUs, null), element);
  element.classList.remove("sales-xpress-contact-us");
});
}();
/******/ })()
;
//# sourceMappingURL=frontend.js.map