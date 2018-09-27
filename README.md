# Turbo Photo Portfolio (TurboPP)

A simple and elegant photographic portfolio website written from scratch.
Released under the GPLv2 so others can contribute and share!

Written using _only_ PHP (and HTML, CSS and JS).

TurboPP:

- is very fast (<~1ms to generate pages);
- is simple;
- is easy to install;
- makes it easy to add/edit:
  - photos,
  - pages and
  - themes.
- is beautiful

## Built With Help

- Lightbox for image display (by Lokesh Dhakar - http://lokeshdhakar.com - https://github.com/lokesh/lightbox2)
- MelodyCss for the responsive theme
- Contact page largely thanks to http://tangledindesign.com/how-to-create-a-contact-form-using-html5-css3-and-php/

## Instructions

### Pre-requisites

1. A web server with PHP and ImageMagick
2. Some images

### Installation

1. Clone or download this git repo to the root of your web server
2. Populate the `portfolio` folder with <strong>one folder per album and only with jpg files</strong>, not sub-folders
3. You can order both images and albums by naming them thus: `01_First_Album/01_first_image.jpg, 02_second_image.jpg` etc.
4. Edit `inc/variables.php` and replace the defaults with your values
5. Create a file `inc/tracking.html` and enter your visitor tracking code
6. Edit `about.php` with your About text
7. Go to the website and view your portfolio (N.B. the first hit will take longer while it builds the thumbnail images)
8. Done

## Future

There are no plans for any future development.
