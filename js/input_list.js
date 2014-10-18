function _() {
    var ctr = 0;
    var insputLists = document.getElementsByClassName("il-cont");
    for (var contId = 0; contId < insputLists.length; contId++) {
        var cont = insputLists[contId];
        var ul = cont.getElementsByClassName("il-list")[0];
        var lastLi = ul.children[ul.children.length - 1];
        var removeButton = lastLi.getElementsByClassName("il-remove")[0];
        removeButton.onclick = function() {
            ul.removeChild(removeButton.parentNode);
        };
        removeButton.onclick();
        var addButton = cont.getElementsByClassName("il-add")[0];
        addButton.onclick = function() {
            var newLi = document.createElement('li');
            newLi.innerHTML = lastLi.innerHTML;
            var removeButton = newLi.getElementsByClassName("il-remove")[0];
            removeButton.onclick = function() {
                ul.removeChild(removeButton.parentNode);
            };
            var inputs = newLi.childNodes;
            for (var i = 0; i < inputs.length; i++) {
                var currentInput = inputs[i];
                if (currentInput.name)
                    currentInput.name = currentInput.name.replace("$", ctr);
                if (currentInput.value)
                    currentInput.value = currentInput.value.replace("$", ctr);
            }
            ctr++;
            ul.appendChild(newLi);
        };
        addButton.onclick();
    }
}
if (window.onload) {
    var l = window.onload;
    window.onload = function() {
        l();
        _();
    };
} else
    window.onload = _;