=== Merlot ===
Author: Gaurav Tamhan
Version: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, one-column, full-width-template, custom-logo, editor-style, custom-menu, featured-images,
      sticky-post, post-formats, translation-ready, threaded-comments

== Description ==

A blog-focused theme with a design aesthetic centered around minimalism and animation. Created using
the Materialize framework, this theme utilizes big and beautiful typography which enhances readability and
automatically adjusts to take advantage of a wide variety of screen sizes. Fluid animations help bring life
to otherwise static content, giving your site a more modern appeal. Merlot was designed to be completely
responsive and to showcase your content, meaning your site always looks great whether it’s on a smartphone,
tablet, laptop, or desktop computer.


== Installation ==

1. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
2. Type in Merlot in the search form and press the 'Enter' key on your keyboard.
3. Click on the 'Activate' button to use your new theme right away.
4. For information on customization options for this theme view the 'Customization' section below.


== Copyright ==

Merlot WordPress Theme, Copyright (C) 2017 Gaurav Tamhan
Merlot is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Merlot bundles the following third-party resources:

Materialize, Copyright (C) 2014-2017 Materialize
License: MIT
Source: http://materializecss.com/

Semantic-UI, Copyright (C) 2017 Semantic-UI
License: MIT
Source: https://semantic-ui.com/

ScrollMagic, Copyright (C) 2015 Jan Paepke
Licenses: MIT/GPL2
Source: http://scrollmagic.io/


== Changelog ==

Initial release


== Notes ==

- When viewing the site in Edit mode (with the black WordPress admin bar floating up top) you might notice
  that the title animation scrolls up slightly then begins to fade. This is not the expected behavior and
  is due to the admin bar offsetting the title animation's trigger. This will only occur in Edit mode.
  The title animation will function correctly when viewing the published site (i.e. after you have logged
  out of wordpress and the admin bar disappears).

  TL;DR -> The title animation will behave differently in Edit mode, but will work fine when the site is published.


- When using this theme, the recommended size for featured images is between 800px - 1500px wide.
  Images less than that will appear left aligned and won't span the width of the content area.
  Images greater than that will take too long too load.


- Icons Explained
  * A grey lock icon will appear next to the title of a post that is password protected.
  * A purple visibility-off icon will apear next to the title of a post that is private.
  * A small person icon will appear next to the username of a comment written by the post author.


== Customization ==

------------
CUSTOM LOGO
------------
To add a custom logo, login to the Wordpress admin panel and navigate to Appearance > Customize > Site Identity.
From there click 'Select logo' and upload an image. Note: the recommended size for logos is 24px x 24px.

If you want to adjust the position of the logo navigate to Appearance > Editor and select 'Stylesheet (style.css)'.
From here you can adjust the CSS rules for the custom-logo class (margin-top and margin-left).
When finished, click 'Update File' to see the changes.


-----------------------------------------------
CHANGE THE ORDER THAT ARCHIVE PAGES ARE LISTED
-----------------------------------------------
To change the order of the Archives dropdown list from ascending to descending login to the Wordpress
admin panel and navigate to Appearance > Editor and select 'Theme Header (header.php)'. From here
scroll down to the Top Nav section and follow the instructions. It should look something like this:

                  <!-- Top Nav -->
                  <?php
                  #
                  ##
                  ###
                  ### ...
                  ### ...
                  ###
                  ##
                  #
