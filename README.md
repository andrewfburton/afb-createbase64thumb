# afb-createbase64thumb
WordPress plugin that creates a custom field named 'base64thumb', which holds the featured image of all your WordPress posts in base64 data
## Possible Use
I use it for hybrid apps that use HTML localstorage to create an offline feature. Because localstorage does not work with images but string only, changing your featured images to base64 data allows you to retrieve the images from localstorage.
## Notes
Works best with the JSON API: https://wordpress.org/plugins/json-api/ to retrieve the custom fields. For example: http://example.com/?json=get_latest&custom_fields=base64thumb.
