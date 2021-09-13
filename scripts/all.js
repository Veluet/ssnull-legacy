var allowAjax = true;
var ajaxLinks;

function pageLoad()
{
    ajaxLinks = $('a[data-target]');
    readyAjaxLinks();
}

function readyAjaxLinks()
{
    ajaxLinks.each(function() {

        $this = $(this);
        if ($(this).attr("href") == window.location) {
            $(this).addClass("current");
        }

        $(this).one('click', function(event) {
            //This this is not the same as the previous this!
            $this = $(this);
            var href = $this.attr("href");
            event.preventDefault(); // don't open the link yet
            if (allowAjax)
            {
                _gaq.push(["_trackPageview", href]); // create a dynamic pageview

                // Set as current link
                ajaxLinks.removeClass("current");
                $this.addClass("current");

                allowAjax = false;

                $($this.attr("data-target")).load(href + "/body", function()
                {
                    pageLoad();
                    allowAjax = true
                });
            }
        });
    });

    //
}

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-40053481-1']);
_gaq.push(['_setDomainName', 'ssnull.com']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

pageLoad();