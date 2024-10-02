# JetEngine Twig Dynamic Popup

This plugin allows to add popups with dynamic data for Timber/Twig listings.

**Instructions**

- The setup of the popup itself is similar to the same functionality for Elementor or Blocks listings - https://crocoblock.com/knowledge-base/jetpopup/jetpopup-how-to-build-a-dynamic-popup-to-work-with-jetengine-listings/#build-a-popup
- In the Timebr/Twig listing add the HTML element, which will be trigger for the popup, for exampl button - `<button class="jet-engine-listing-popup-trigger" type="button" data-object-type="user" data-object-id="{{ jet_engine_data(args={key:'post_id'}) }}" data-open-popup="436">Details</button>`

**What the button attributes mean**
- `class="jet-engine-listing-popup-trigger"` - `jet-engine-listing-popup-trigger` is a required class, which means this element will be trigger for the dynamic popup. You can add any other CSS classes you want to style the element in the way you need;
- `data-object-type="user"` - defines the type of the object, which should be set for the popup. Possible options - post, user, comment and term. **Please note** for the `term` you also need to define the taxonomy to get the term object from - `term::category`
- `data-object-id="{{ jet_engine_data(args={key:'post_id'}) }}"` - object ID. This is dynamic part. By this ID plugin sets appropriate object on the backend (or `{{ post.ID }}` or any function to get ID of required object).
- `data-open-popup="436"` - ID of the popup we need to open by click on this element
