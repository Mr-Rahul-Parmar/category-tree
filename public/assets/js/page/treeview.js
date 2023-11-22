$.fn.extend({
    treed: function (o) {
        var openedClass = 'glyphicon-minus-sign';
        var closedClass = 'glyphicon-plus-sign';

        if (typeof o !== 'undefined') {
            if (typeof o.openedClass !== 'undefined') {
                openedClass = o.openedClass;
            }
            if (typeof o.closedClass !== 'undefined') {
                closedClass = o.closedClass;
            }
        }

        function saveState(node, state) {
            var key = 'treeState_' + node.attr('id');
            localStorage.setItem(key, state);
        }

        function loadState(node) {
            var key = 'treeState_' + node.attr('id');
            return localStorage.getItem(key);
        }

        function toggleBranch(branch) {
            var icon = branch.children('i:first');
            icon.toggleClass(openedClass + " " + closedClass);
            var children = branch.children().children();
            children.toggle();

            // Save the state when the user interacts with the tree view
            saveState(branch, children.is(':visible') ? 'open' : 'closed');
        }

        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");

        // Use document ready to ensure the DOM is fully loaded
        $(document).ready(function () {
            tree.find('li').has("ul").each(function () {
                var branch = $(this);
                branch.prepend("");
                branch.addClass('branch');

                // Load and apply the saved state for this node
                var savedState = loadState(branch);
                if (savedState === 'open') {
                    branch.children().children().show();
                } else {
                    branch.children().children().hide();
                }

                branch.on('click', function (e) {
                    if (this == e.target) {
                        toggleBranch($(this));
                    }
                });
            });
        });
    }
});

/* Initialization of treeviews */
$('#tree1').treed();
