# urlshortener
This is a really, really simple URL shortener I made in PHP.
It lacks most features, as I'm a relatively new learner to PHP.

# How to use
To use this, simply download all the files and place them on your web server.
Modify the code as you wish, as long as you follow the license (GNU GPL v2).
After copying the files, edit config.php to match your settings and what you'd like.
This must be done for the script to function correctly.

# "API"
This script has some form of API. To create shortened URLs without using the index page, or posting the data, use these arguments in the URL.

?nopost=true
This will tell the script that you've not put any post data in. To use the API you must have this in the URL.

?url=http://myurl.com
This is the URL to be shortened.

# Example URL that will be shortened without the form.
makeURL.php?nopost=true&url=http://google.com
This will shorten "google.com".

# What to do with this?
This has almost no use practically, it's mainly just to help other people learn PHP. Although it could be used small scale if you choose.
