document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
    function getData() {
        return [
            ["", "Kia", "Nissan", "Toyota", "Honda", "Mazda", "Ford"],
            ["2012", 10, 11, 12, 13, 15, 16],
            ["2013", 10, 11, 12, 13, 15, 16],
            ["2014", 10, 11, 12, 13, 15, 16],
            ["2015", 10, 11, 12, 13, 15, 16],
            ["2016", 10, 11, 12, 13, 15, 16]
        ]
    }

    function getCustomData() {
        return [
            ["", "Kia", "Nissan", "Toyota", "Honda", "Mazda", "Ford"],
            ["2012", 10, 11, 12, 13, 15, 16],
            ["2013", 10, 11, 12, 13, 15, 16],
            ["2014", 10, 11, 12, 13, 15, 16],
            ["2015", 10, 11, 12, 13, 15, 16],
            ["2016", 10, 11, 12, 13, 15, 16]
        ]
    }

    function getData() {
        return [
            ["", "Kia", "Nissan", "Toyota", "Honda", "Mazda", "Ford"],
            ["2012", 10, 11, 12, 13, 15, 16],
            ["2013", 10, 11, 12, 13, 15, 16],
            ["2014", 10, 11, 12, 13, 15, 16],
            ["2015", 10, 11, 12, 13, 15, 16],
            ["2016", 10, 11, 12, 13, 15, 16]
        ]
    }

    function getData() {
        return [
            ["", "Kia", "Nissan", "Toyota", "Honda", "Mazda", "Ford"],
            ["2012", 10, 11, 12, 13, 15, 16],
            ["2013", 10, 11, 12, 13, 15, 16],
            ["2014", 10, 11, 12, 13, 15, 16],
            ["2015", 10, 11, 12, 13, 15, 16],
            ["2016", 10, 11, 12, 13, 15, 16]
        ]
    }
    var settings1, hot1, example1 = document.getElementById("context");
    settings1 = {
        data: getData(),
        rowHeaders: !0,
        colHeaders: !0,
        contextMenu: !0
    }, hot1 = new Handsontable(example1, settings1);
    var settings3, hot3, example3 = document.getElementById("configuration");
    settings3 = {
        data: getCustomData(),
        rowHeaders: !0,
        colHeaders: !0
    }, hot3 = new Handsontable(example3, settings3), hot3.updateSettings({
        contextMenu: {
            callback: function(key, options) {
                "about" === key && setTimeout(function() {
                    alert("This is a context menu with default and custom options mixed")
                }, 100)
            },
            items: {
                row_above: {
                    disabled: function() {
                        return 0 === hot3.getSelected()[0]
                    }
                },
                row_below: {},
                hsep1: "---------",
                remove_row: {
                    name: "Remove this row, ok?",
                    disabled: function() {
                        return 0 === hot3.getSelected()[0]
                    }
                },
                hsep2: "---------",
                about: {
                    name: "About this menu"
                }
            }
        }
    });
    var hot4, copyPaste = document.getElementById("copyPaste");
    hot4 = new Handsontable(copyPaste, {
        data: getData(),
        rowHeaders: !0,
        colHeaders: !0,
        contextMenu: !0,
        contextMenuCopyPaste: {
            swfPath: "/bower_components/zeroclipboard/dist/ZeroClipboard.swf"
        }
    });
    var hot, data = [
            ["", "Kia", "Nissan", "Toyota", "Honda", "Mazda", "Ford"],
            ["2012", 10, 11, 12, 13, 15, 16],
            ["2013", 10, 11, 12, 13, 15, 16],
            ["2014", 10, 11, 12, 13, 15, 16],
            ["2015", 10, 11, 12, 13, 15, 16],
            ["2016", 10, 11, 12, 13, 15, 16]
        ],
        container = document.getElementById("buttons"),
        selectFirst = document.getElementById("selectFirst"),
        rowHeaders = document.getElementById("rowHeaders"),
        colHeaders = document.getElementById("colHeaders");
    hot = new Handsontable(container, {
        rowHeaders: !0,
        colHeaders: !0,
        outsideClickDeselects: !1,
        removeRowPlugin: !0
    }), hot.loadData(data), Handsontable.Dom.addEvent(selectFirst, "click", function() {
        hot.selectCell(0, 0)
    }), Handsontable.Dom.addEvent(rowHeaders, "click", function() {
        hot.updateSettings({
            rowHeaders: this.checked
        })
    }), Handsontable.Dom.addEvent(colHeaders, "click", function() {
        hot.updateSettings({
            colHeaders: this.checked
        })
    });
    var hot1, container = document.getElementById("comments");
    hot1 = new Handsontable(container, {
        data: getData(),
        rowHeaders: !0,
        colHeaders: !0,
        contextMenu: !0,
        comments: !0,
        cell: [{
            row: 1,
            col: 1,
            comment: "Some comment"
        }, {
            row: 2,
            col: 2,
            comment: "More comments"
        }]
    })

    }, 800);
});;