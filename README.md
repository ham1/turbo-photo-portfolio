Turbo Photo Portfolio (TurboPP)
===============================

An elegant photographic portfolio website written from scratch, initially for my own photo portfolio website
(http://grussellphotography.com), released under the GPLv2 so others can contribute and share!

Written using only PHP, TurboPP will:
- be fast;
- be simple;
- be easy to install;
- make it easy to add/edit:
  - photos,
  - pages and
  - themes.
- be beautiful

Built With The Help Of...
-------------------------
- Lightbox for image display (by Lokesh Dhakar - http://lokeshdhakar.com - https://github.com/lokesh/lightbox2)
- MelodyCss for the responsive theme - http://melodycss.co/
- Contact page largely thanks to http://tangledindesign.com/how-to-create-a-contact-form-using-html5-css3-and-php/

Instructions
------------
### Pre-requisites
1. A webserver with PHP and ImageMagick
2. Some images

### Installation
1. Clone or download this git repo to the root of your web server
2. Populate the portfolio folder with one folder per album and only with jpg files, not sub-folders
3. Edit inc/variables.php and replace the defaults with your values
4. Edit about.php with your About text
5. Done.


TODO
----
- write some more requirements
- write some instructions
- implement a better code structure, maybe MVC, while trying to keep it simple
- write some unit tests
- performance test
- functionally test across a variety of configurations
  - browser
  - web server
  - operating sysytem
  - photo size, amount and structure
