var $addLink = $('<a href="#" class="add_tag_link">Aggiungi Tag</a>');
$(document).ready(function () {
    tags = $('.tags');
    tags.find('div').each(function() {
        addTagFormDeleteLink($(this));
    });
    tags.append($addLink);
    tags.data('index', tags.find(':input').length);
    $addLink.on('click', function (e) {
        e.preventDefault();
        addTagForm(tags, $addLink);
    });
});
function addTagForm($collectionHolder, $newLinkLi) {
    prototype = $collectionHolder.data('prototype');
    index = $collectionHolder.data('index');
    newForm = prototype.replace(/__name__/g, index);
    $collectionHolder.data('index', index + 1);
    div = $('<div class="inline"></div>').append(newForm);
    $newLinkLi.before(div);
    addTagFormDeleteLink(div);
}
function addTagFormDeleteLink(newFormDiv) {
    aRemoveForm = $('<a class="aRemoveTag" href="#">x</a>');
    newFormDiv.append(aRemoveForm);
    aRemoveForm.on('click', function(e) {
        e.preventDefault();
        newFormDiv.remove();
    });
}