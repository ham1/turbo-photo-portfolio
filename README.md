Turbo Photo Portfolio (TurboPP)
===============================

A simple and elegant photographic portfolio website written from scratch.
Real life usage on my photo portfolio: (https://grussellphotography.com).
Released under the GPLv2 so others can contribute and share!

Written using _only_ PHP (HTML, CSS and JS), TurboPP:
- is very fast;
- is simple;
- is easy to install;
- makes it easy to add/edit:
  - photos,
  - pages and
  - themes.
- is beautiful

Built With The Help Of
-----------------------
- Lightbox for image display (by Lokesh Dhakar - http://lokeshdhakar.com - https://github.com/lokesh/lightbox2)
- MelodyCss for the responsive theme - http://melodycss.co/
- Contact page largely thanks to http://tangledindesign.com/how-to-create-a-contact-form-using-html5-css3-and-php/

Instructions
------------
### Pre-requisites
1. A web server with PHP and ImageMagick
2. Some images

### Installation
1. Clone or download this git repo to the root of your web server
2. Populate the <tt>portfolio</tt> folder with <strong>one folder per album and only with jpg files</strong>, not sub-folders
3. You can order both images and albums by naming them thus: <tt>01_First_Album/01_first_image.jpg, 02_second_image.jpg</tt> etc.
4. Edit <tt>inc/variables.php</tt> and replace the defaults with your values
5. Create a file <tt>inc/tracking.html</tt> and enter your visitor tracking code
6. Edit <tt>about.php</tt> with your About text
7. Go to the website and view your portfolio (NB it will take longer the first time you go to the page while it caches the images)
8. Done

TODO
----
- write better instructions
- improve code structure, while trying to keep it simple
- write some unit tests
- performance test
- functionally test across a variety of configurations
  - browser
  - web server
  - operating system
  - photo size, amount and structure
