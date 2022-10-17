onload = function() {

    // create the DropDownTree
    var ddTree = new wijmo.input.DropDownTree('#ddTree', {
        displayMemberPath: 'header',
        childItemsPath: 'items',
        showCheckboxes: true,
        itemsSource: getTreeData(),
        checkedItemsChanged: function (s, e) {
            console.log('dropDownTree.checkedItemsChanged:');
            s.checkedItems.forEach(function (item, index) {
                console.log(index, item[s.displayMemberPath])
            })
        }
    });

    // create the MultiSelect
    var multiSelect = new wijmo.input.MultiSelect('#multiSelect', {
        itemsSource: 'Austria,Belgium,Chile,Denmark'.split(','),
        checkedItemsChanged: function (s, e) {
            console.log('multiSelect.checkedItemsChanged:');
            s.checkedItems.forEach(function (item, index) {
                console.log(index, item)
            })
        }
    });

    // get the tree data
    function getTreeData() {
        return [
            { header: 'Electronics', img: 'resources/electronics.png', items: [
                    { header: 'Trimmers/Shavers' },
                    { header: 'Tablets' },
                    { header: 'Phones', img: 'resources/phones.png', items: [
                            { header: 'Apple' },
                            { header: 'Motorola', newItem: true },
                            { header: 'Nokia' },
                            { header: 'Samsung' }
                        ]},
                    { header: 'Speakers', newItem: true },
                    { header: 'Monitors' }
                ]},
            { header: 'Toys', img: 'resources/toys.png', items: [
                    { header: 'Shopkins' },
                    { header: 'Train Sets' },
                    { header: 'Science Kit', newItem: true },
                    { header: 'Play-Doh' },
                    { header: 'Crayola' }
                ]},
            { header: 'Home', img: 'resources/home.png', items: [
                    { header: 'Coffeee Maker' },
                    { header: 'Breadmaker', newItem: true },
                    { header: 'Solar Panel', newItem: true },
                    { header: 'Work Table' },
                    { header: 'Propane Grill' }
                ]}
        ];
    }
}

// DropDownTree: transpiled TypeScript
var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var wijmo;
(function (wijmo) {
    var input;
    (function (input) {
        var DropDownTree = /** @class */ (function (_super) {
            __extends(DropDownTree, _super);
            /**
             * Initializes a new instance of the @see:DropDownTree class.
             *
             * @param element The DOM element that hosts the control, or a CSS selector for the host element (e.g. '#theCtrl').
             * @param options The JavaScript object containing initialization data for the control.
             */
            function DropDownTree(element, options) {
                var _this = _super.call(this, element) || this;
                _this._maxHdrItems = 2;
                _this._hdrFmt = wijmo.culture.MultiSelect.itemsSelected;
                /**
                 * Occurs when the value of the @see:checkedItems property changes.
                 */
                _this.checkedItemsChanged = new wijmo.Event();
                wijmo.addClass(_this.hostElement, 'wj-dropdowntree');
                // make header element read-only
                _this._tbx.readOnly = true;
                // toggle drop-down when clicking on the header element
                // (and not on a containing label element)
                _this.addEventListener(_this.inputElement, 'click', function (e) {
                    if (document.elementFromPoint(e.clientX, e.clientY) == _this.inputElement) {
                        _this.isDroppedDown = !_this.isDroppedDown;
                    }
                });
                // update header now, when the itemsSource changes, and when items are selected
                _this._updateHeader();
                var tree = _this._tree;
                tree.checkedItemsChanged.addHandler(function () {
                    _this._updateHeader();
                    _this.onCheckedItemsChanged();
                });
                tree.selectedItemChanged.addHandler(function () {
                    if (!tree.showCheckboxes) {
                        _this._updateHeader();
                        _this.onCheckedItemsChanged();
                    }
                });
                tree.loadedItems.addHandler(function () {
                    _this._updateHeader();
                });
                // close tree on enter/escape
                tree.addEventListener(tree.hostElement, 'keydown', function (e) {
                    switch (e.keyCode) {
                        case wijmo.Key.Enter:
                        case wijmo.Key.Escape:
                            _this.isDroppedDown = false;
                            break;
                    }
                });
                // initialize control options
                _this.initialize(options);
                return _this;
            }
            Object.defineProperty(DropDownTree.prototype, "treeView", {
                /**
                 * Gets the @see:TreeView control shown in the drop-down.
                 */
                get: function () {
                    return this._tree;
                },
                enumerable: true,
                configurable: true
            });
            Object.defineProperty(DropDownTree.prototype, "itemsSource", {
                /**
                 * Gets or sets the array that contains the @see:TreeView items.
                 *
                 * @see:TreeView #see:itemsSource arrays usually have a hierarchical
                 * structure with items that contain child items. There is no fixed
                 * limit to the depth of the items.
                 *
                 * For details, see the @see:TreeView.itemsSource property.
                 */
                get: function () {
                    return this._tree.itemsSource;
                },
                set: function (value) {
                    this._tree.itemsSource = value;
                },
                enumerable: true,
                configurable: true
            });
            Object.defineProperty(DropDownTree.prototype, "displayMemberPath", {
                /**
                 * Gets or sets the name of the property (or properties) to use as
                 * the visual representation of the nodes.
                 *
                 * The default value for this property is the string 'header'.
                 *
                 * For details, see the @see:TreeView.displayMemberPath property.
                 */
                get: function () {
                    return this._tree.displayMemberPath;
                },
                set: function (value) {
                    this._tree.displayMemberPath = value;
                },
                enumerable: true,
                configurable: true
            });
            Object.defineProperty(DropDownTree.prototype, "childItemsPath", {
                /**
                 * Gets or sets the name of the property (or properties) that contains
                 * the child items for each node.
                 *
                 * The default value for this property is the string 'items'.
                 *
                 * For details, see the @see:TreeView.childItemsPath property.
                 */
                get: function () {
                    return this._tree.childItemsPath;
                },
                set: function (value) {
                    this._tree.childItemsPath = value;
                },
                enumerable: true,
                configurable: true
            });
            Object.defineProperty(DropDownTree.prototype, "showCheckboxes", {
                /**
                 * Gets or sets a value that determines whether the @see:TreeView should
                 * add checkboxes to nodes and manage their state.
                 *
                 * For details, see the @see:TreeView.showCheckboxes property.
                 */
                get: function () {
                    return this._tree.showCheckboxes;
                },
                set: function (value) {
                    this._tree.showCheckboxes = value;
                },
                enumerable: true,
                configurable: true
            });
            Object.defineProperty(DropDownTree.prototype, "checkedItems", {
                /**
                 * Gets or sets an array containing the items that are currently checked.
                 */
                get: function () {
                    var tree = this._tree;
                    if (tree.showCheckboxes) {
                        return tree.checkedItems;
                    }
                    else {
                        return tree.selectedItem ? [tree.selectedItem] : [];
                    }
                },
                set: function (value) {
                    var tree = this._tree;
                    if (tree.showCheckboxes) {
                        tree.checkedItems = wijmo.asArray(value);
                    }
                    else {
                        tree.selectedItem = wijmo.isArray(value) ? value[0] : value;
                    }
                },
                enumerable: true,
                configurable: true
            });
            Object.defineProperty(DropDownTree.prototype, "maxHeaderItems", {
                /**
                 * Gets or sets the maximum number of items to display on the control header.
                 *
                 * If no items are selected, the header displays the text specified by the
                 * @see:placeholder property.
                 *
                 * If the number of selected items is smaller than or equal to the value of the
                 * @see:maxHeaderItems property, the selected items are shown in the header.
                 *
                 * If the number of selected items is greater than @see:maxHeaderItems, the
                 * header displays the selected item count instead.
                 */
                get: function () {
                    return this._maxHdrItems;
                },
                set: function (value) {
                    if (this._maxHdrItems != value) {
                        this._maxHdrItems = wijmo.asNumber(value);
                        this._updateHeader();
                    }
                },
                enumerable: true,
                configurable: true
            });
            Object.defineProperty(DropDownTree.prototype, "headerFormat", {
                /**
                 * Gets or sets the format string used to create the header content
                 * when the control has more than @see:maxHeaderItems items checked.
                 *
                 * The format string may contain the '{count}' replacement string
                 * which gets replaced with the number of items currently checked.
                 * The default value for this property in the English culture is
                 * '{count:n0} items selected'.
                 */
                get: function () {
                    return this._hdrFmt;
                },
                set: function (value) {
                    if (value != this._hdrFmt) {
                        this._hdrFmt = wijmo.asString(value);
                        this._updateHeader();
                    }
                },
                enumerable: true,
                configurable: true
            });
            Object.defineProperty(DropDownTree.prototype, "headerFormatter", {
                /**
                 * Gets or sets a function that gets the HTML in the control header.
                 *
                 * By default, the control header content is determined based on the
                 * @see:placeholder, @see:maxHeaderItems, and on the current selection.
                 *
                 * You may customize the header content by specifying a function that
                 * returns a custom string based on whatever criteria your application
                 * requires.
                 */
                get: function () {
                    return this._hdrFormatter;
                },
                set: function (value) {
                    if (value != this._hdrFormatter) {
                        this._hdrFormatter = wijmo.asFunction(value);
                        this._updateHeader();
                    }
                },
                enumerable: true,
                configurable: true
            });
            /**
             * Raises the @see:checkedItemsChanged event.
             */
            DropDownTree.prototype.onCheckedItemsChanged = function (e) {
                this.checkedItemsChanged.raise(this, e);
            };
            //** overrides
            // switch focus to the tree when the drop-down opens
            DropDownTree.prototype.onIsDroppedDownChanged = function (e) {
                if (this.containsFocus() && this.isDroppedDown) {
                    this._tree.focus();
                }
                _super.prototype.onIsDroppedDownChanged.call(this, e);
            };
            // create the drop-down element
            DropDownTree.prototype._createDropDown = function () {
                // create child TreeView control
                var lbHost = wijmo.createElement('<div style="width:100%;border:none"></div>', this._dropDown);
                this._tree = new wijmo.nav.TreeView(lbHost, {
                    showCheckboxes: true,
                });
                // let base class do its thing
                _super.prototype._createDropDown.call(this);
            };
            Object.defineProperty(DropDownTree.prototype, "isReadOnly", {
                // override since our input is always read-only
                get: function () {
                    return this._readOnly;
                },
                set: function (value) {
                    this._readOnly = wijmo.asBoolean(value);
                    wijmo.toggleClass(this.hostElement, 'wj-state-readonly', this.isReadOnly);
                },
                enumerable: true,
                configurable: true
            });
            // update header when refreshing
            DropDownTree.prototype.refresh = function (fullUpdate) {
                if (fullUpdate === void 0) { fullUpdate = true; }
                _super.prototype.refresh.call(this, fullUpdate);
                this._updateHeader();
            };
            //** implementation
            // update the value of the control header
            DropDownTree.prototype._updateHeader = function () {
                // get selected items
                var items = this.checkedItems;
                // update the header
                if (wijmo.isFunction(this._hdrFormatter)) {
                    this.inputElement.value = this._hdrFormatter();
                }
                else {
                    var hdr = '';
                    if (items.length > 0) {
                        if (items.length <= this._maxHdrItems) {
                            if (this.displayMemberPath) {
                                var binding_1 = new wijmo.Binding(this.displayMemberPath);
                                items = items.map(function (item) {
                                    return binding_1.getValue(item);
                                });
                            }
                            hdr = items.join(', ');
                        }
                        else {
                            hdr = wijmo.format(this.headerFormat, {
                                count: items.length
                            });
                        }
                    }
                    this.inputElement.value = hdr;
                }
                // update wj-state attributes
                this._updateState();
            };
            return DropDownTree;
        }(input.DropDown));
        input.DropDownTree = DropDownTree;
    })(input = wijmo.input || (wijmo.input = {}));
})(wijmo || (wijmo = {}));
//# sourceMappingURL=DropDownTree.js.map
