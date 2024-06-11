jQuery(document).on('click', '.jet-engine-user-popup-trigger', function(event) {
    event.preventDefault();
    const $button = jQuery(this);
    const objectType = $button.data('object-type');
    const data = {
        popupId: 'jet-popup-' + $button.data('open-popup'),
        objectType: objectType,
        objectId: $button.data('object-id'),
    }
    if (objectType.includes('::')) {
        const objectTypeData = objectType.split('::');
        data.objectType = objectTypeData[0];
        data.taxonomy = objectTypeData[1];
    }
    jQuery(window).trigger({
        type: 'jet-popup-open-trigger',
        popupData: data
    });
});