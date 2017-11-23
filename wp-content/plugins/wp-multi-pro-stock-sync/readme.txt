##WOOCOMMERCE MULTI PRODUCT STOCK SYNCING PLUGIN
------------------------------------------------

This plugin manage stocks, if sync product key present in while add /edit a product start stock syncing and keep everything same .

##Important Remarks

This plugin requres an active woocommerce plugin.


###Version 1.0
--------------
 
- Created a custom autosuggest select box in product page for link products.
- When select a syncing product,updated the post meta table with meta_key as _inventorysync key and meta_value as the corresponding syncing product's id.
- Mange stocks, if a product is add/ edit from the admin (only if the corresponding product is synced with another).
- Mange stocks, If the customer purchase synced products from frontend, plugin Keeps stock quantity same.


###Version 1.1
--------------

Variation Sync:

- Created a custom autosuggest select box in product page to link products (for sync  product's variations stock).
- created select box in each variation's product tab for link variations.
- Manage stocks for the linked products, both from the admin and forntend.
- Provide options to unlink from products and its variations.

