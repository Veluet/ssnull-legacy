# ssnull-legacy
## About
This is an art portfolio site I built in 2013.  It is a single page application using jQuery, SASS and PHP.  Because the site was built to support browsers that could not handle the glory of AJAX (or search engine spiders), it is fully functional in the [Internet Archive of SSNull.com](https://web.archive.org/web/20180110001325/http://ssnull.com/).

Should you elect to clone the repository to view it locally, I provided a static view of the site via underdog.htm.  For security reasons I excluded the .php files from this repository.

## Design Choices
### SEO, Schema and Section 508
SSNull was built to be as minimalist as possible but to also be SEO and Section 508 friendly.  The site follows Schema.org to handle meta descriptors—as artwork in a traditional gallery setting is meant to stand on its own, I had to write descriptions and alt content to accompany every piece on the site.

### Single Page Application, jQuery and AJAX
Pretty simple JavaScript is in place to turn the site into a SPA.  Basically:
* Setup events on most of the site links.
* When the links are clicked, use the href to fetch HTML content from the PHP back-end using AJAX.
* When the AJAX request comes back, load the content into the main (and sub-navigation) slots.
Since this SPA as is was not web crawler or link sharing friendly, a PHP back-end also existed to replicate content in much the same was as the JavaScript front-end.  Crazy to think how modern frameworks like Vue/React/Angular eliminate this code replication.

### Responsive, Mobile Friendly
The site was also built to be mobile friendly which it accomplishes using simple responsive design.  On desktop the entire site is visible within the browser viewport save for the sub-navigation.  Sub-navigation is scrollable, but does not use CSS overflow to accomplish this.  Instead, the sub-navigation creates natural overflow on the page resulting in a scrolling experience that isn't janky or unorthodox.

### Google Page Speed
At the time, Google Page Speed was new to the scene.  The site was built to pass with flying colors—with one exception.  Because the entire site was visible within the viewport, a warning about below the fold CSS could not be resolved...as there was no below the fold content.

Scripts are deferred when possible.  All JavaScript and CSS files are also minified.  A rudimentary system for serving different sized images based on the user's viewport is also in place—though this is outdated by 2021 standards.  All images were pre-compressed by hand.

### MySQL DB, PHP and A Pretty Wicked CMS for Myself
The back-end of the site is built on PHP.  Specifically, it used a now deprecated build of Code Igniter.  Code Igniter made interfacing with the MySQL database made for a simpler development process.

The prospect of manually uploading and adding entries to the database was not conducive to my automate everything mentality.  Truth be told, if I cranked out a piece of artwork overnight, it was highly likely I would want to encounter any barriers to publishing and sharing that work at 3am.  To address this I created a custom CMS for the uploading and updating of artwork.

## Closing Thoughts
As of 2021...if I ever coded this again I would to generate a flat HTML website and use a framework like VUE.js for SPA functionality.
