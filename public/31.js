(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[31],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Xamxam/Display.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Pages/Xamxam/Display.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "Xamxam",
  props: ['xamxams']
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Xamxam/Display.vue?vue&type=template&id=287fa108&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Pages/Xamxam/Display.vue?vue&type=template&id=287fa108& ***!
  \************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("div", { staticClass: "container" }, [
      _c(
        "div",
        { staticClass: "row" },
        [
          _c(
            "inertia-link",
            { staticClass: "m-5", attrs: { href: "/xamxam/create" } },
            [_c("button", { staticClass: "btn btn-dark" }, [_vm._v("Creer")])]
          ),
          _vm._v(" "),
          _c(
            "inertia-link",
            { staticClass: "m-5", attrs: { href: "/xamxam" } },
            [_c("button", { staticClass: "btn btn-primary" }, [_vm._v("Voir")])]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "col-md-12" }, [
            _c(
              "table",
              { staticClass: "table table-dark" },
              [
                _vm._m(0),
                _vm._v(" "),
                _vm._l(_vm.xamxams, function(xamxam) {
                  return _c("tr", { key: xamxam.id }, [
                    _c("td", [_vm._v(_vm._s(xamxam.id))]),
                    _vm._v(" "),
                    _c("td", [_vm._v(_vm._s(xamxam.titre))]),
                    _vm._v(" "),
                    _c("td", [
                      _vm._v(_vm._s(_vm._f("truncate")(xamxam.tags, 20)))
                    ]),
                    _vm._v(" "),
                    _c("td", [
                      _c("img", {
                        attrs: {
                          src:
                            "http://mkeita.defarsci.com/fessef/public/uploads/" +
                            xamxam.image,
                          height: "200px",
                          width: "255px"
                        }
                      })
                    ]),
                    _vm._v(" "),
                    _c("td", [
                      _vm._v(_vm._s(_vm._f("truncate")(xamxam.contenu, 27)))
                    ]),
                    _vm._v(" "),
                    _c(
                      "td",
                      [
                        _c(
                          "inertia-link",
                          {
                            attrs: {
                              href:
                                "http://mkeita.defarsci.com/fessef/public/xamxam/show/" +
                                xamxam.id
                            }
                          },
                          [
                            _c(
                              "button",
                              { staticClass: "btn btn-info btn-sm btn-round" },
                              [_vm._v("Afficher")]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "inertia-link",
                          {
                            attrs: {
                              href:
                                "http://mkeita.defarsci.com/fessef/public/xamxam/edit/" +
                                xamxam.id
                            }
                          },
                          [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-sm btn-warning btn-round"
                              },
                              [_vm._v("Editer")]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "inertia-link",
                          {
                            attrs: {
                              href:
                                "http://mkeita.defarsci.com/fessef/public/xamxam/destroy/" +
                                xamxam.id
                            }
                          },
                          [
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-sm btn-danger btn-round"
                              },
                              [_vm._v("Supprimer")]
                            )
                          ]
                        )
                      ],
                      1
                    )
                  ])
                })
              ],
              2
            )
          ])
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("tr", [
      _c("td", [_vm._v("ID")]),
      _vm._v(" "),
      _c("td", [_vm._v("TITRE")]),
      _vm._v(" "),
      _c("td", [_vm._v("TAGS")]),
      _vm._v(" "),
      _c("td", [_vm._v("IMAGE")]),
      _vm._v(" "),
      _c("td", [_vm._v("CONTENU")]),
      _vm._v(" "),
      _c("td", [_vm._v("ACTIONS")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Pages/Xamxam/Display.vue":
/*!***********************************************!*\
  !*** ./resources/js/Pages/Xamxam/Display.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Display_vue_vue_type_template_id_287fa108___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Display.vue?vue&type=template&id=287fa108& */ "./resources/js/Pages/Xamxam/Display.vue?vue&type=template&id=287fa108&");
/* harmony import */ var _Display_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Display.vue?vue&type=script&lang=js& */ "./resources/js/Pages/Xamxam/Display.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Display_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Display_vue_vue_type_template_id_287fa108___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Display_vue_vue_type_template_id_287fa108___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Pages/Xamxam/Display.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Pages/Xamxam/Display.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/Pages/Xamxam/Display.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Display_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Display.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Xamxam/Display.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Display_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Pages/Xamxam/Display.vue?vue&type=template&id=287fa108&":
/*!******************************************************************************!*\
  !*** ./resources/js/Pages/Xamxam/Display.vue?vue&type=template&id=287fa108& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Display_vue_vue_type_template_id_287fa108___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Display.vue?vue&type=template&id=287fa108& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Pages/Xamxam/Display.vue?vue&type=template&id=287fa108&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Display_vue_vue_type_template_id_287fa108___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Display_vue_vue_type_template_id_287fa108___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);