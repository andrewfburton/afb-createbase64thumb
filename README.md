# afb-createbase64thumb
WordPress plugin that creates a custom field named 'base64thumb', which holds the featured image of all your WordPress posts in base64 data
## Possible Use
For hybrid apps (e.g. Cordova/Phonegap apps) that use HTML5 Local Storage to add some offline functionality. Because Local Storage does save string data only, changing your featured images to base64 data allows you to retrieve the images from localstorage. Personally, I think for one small thumbnail per post, that's an interesting concept to explore, beating the "canvas" method to save images.
## Notes
Works best with the JSON API: https://wordpress.org/plugins/json-api/ to retrieve the custom field for the base64 data. For example: http://example.com/?json=get_latest&custom_fields=base64thumb.
