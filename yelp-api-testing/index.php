<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Take Your Pick</title>
        <style type="text/css">
            * {box-sizing:content-border;}
            body {
                font-family:calibri;
            }

            input[type=radio],
            input[type=checkbox] {
                display:none;
            }

            input[type=radio] + label,
            input[type=checkbox] + label {
                width:calc(33% - 24px);
                display:inline-block;
                margin:-2px;
                padding:4px 12px;
                margin-bottom:0;
                font-size:14px;
                line-height:20px;
                color:#333;
                text-align:center;
                text-shadow:0 1px 1px rgba(255,255,255,0.75);
                vertical-align:middle;
                cursor:pointer;
                background-color:#f5f5f5;
                background-image:-moz-linear-gradient(top,#fff,#e6e6e6);
                background-image:-webkit-gradient(linear,0 0,0 100%,from(#fff),to(#e6e6e6));
                background-image:-webkit-linear-gradient(top,#fff,#e6e6e6);
                background-image:-o-linear-gradient(top,#fff,#e6e6e6);
                background-image:linear-gradient(to bottom,#fff,#e6e6e6);
                background-repeat:repeat-x;
                border:1px solid #ccc;
                border-color:#e6e6e6 #e6e6e6 #bfbfbf;
                border-color:rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
                border-bottom-color:#b3b3b3;
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#ffe6e6e6',GradientType=0);
                filter:progid:DXImageTransform.Microsoft.gradient(enabled=false);
                -webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
                -moz-box-shadow:inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
                box-shadow:inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
            }

            input[type=radio]:checked + label,
            input[type=checkbox]:checked + label {
                background-image:none;
                outline:0;
                -webkit-box-shadow:inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
                -moz-box-shadow:inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
                box-shadow:inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
                background-color:#e0e0e0;
            }
            body {color:#333; margin:0; padding:0;}
            h1, h2 {margin:0; padding:0;}
            h1 {text-align: center; padding:10px;}
            h1 a {color:#000; text-decoration: none;}
            .title, h2 {font-size:24px;}
            #location {font-size:22px; color:#666;width:calc(100% - 15px); border:3px solid #eaeaea; border-radius:8px; padding:4px;}
            #location:focus {color:#000; border-color:#999; }
            #error, #nope {font-size:13px; margin-left:5px; height:15px;}

            #nope {
                color: #333;
                display: block;
                margin: 2px auto 0;
                text-align: center;
            }

            .more {
                padding: 10px 0 20px;
            }
            .category, #afterwords {border-radius:8px; background-color:rgba(255,255,255,.95); padding:10px; margin-bottom:20px;}
            .subcategory, .do-this-place {padding:10px; background-color:rgba(255,255,255,.5); border-radius:8px; margin-bottom:10px;}
            .subcategory .title {text-align: center; margin-bottom:5px;}
            .selection label {font-size:18px!important; }
            #choose, #reroll {border-radius:8px; border:2px outset #000; display:block; font-weight:bold; background-color:#55f; color:#fff; font-size:26px; padding:10px 20px; margin:0 auto;}
            .disclaimer {text-align: center; font-size:12px; margin-top:20px; padding-bottom: 20px; background:#eaeaea; padding-top:20px;}
            .disclaimer .text {margin-bottom: 10px;}
            h2 {margin-bottom:5px;}
            .do-this-place img {float:left; margin-right:10px;}
            .do-this-place {clear:both; height:135px;}
            #afterwords, #choices {margin: 0 auto; max-width: 500px; padding: 0 20px;}
            .address {font-size:20px;}


            body {
                background-image: url('data:image/png;base64,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');
            }
        </style>

    </style>
</head>

<body>

    <h1><a href="index.php">Take Your Pick</a></h1>

    <form id="choices">

        <div class="category">
            <div class="title">Where do you want to look?</div>
            <input type="text" id="location" value="Springfield, IL" />
            <div id="error"></div>
        </div>

        <div class="category">
            <div class="subcategory">
                <div class="title">Something to Do</div>
                <div class="selection">
                    <input type="radio" id="bowling" name="something" value="Bowling"> 
                    <label for="bowling"> 
                        Bowling 
                    </label> 
                    <input type="radio" id="ice" name="something" value="ice cream" checked> 
                    <label for="ice"> 
                        Dessert
                    </label>    
                    <input type="radio" id="movie" name="something" value="Movie"> 
                    <label for="movie"> 
                        Movie
                    </label>          
                </div>
            </div>
            <div class="subcategory">
                <div class="title">Something to Eat</div>
                <div class="selection">
                    <input type="radio" id="diners" name="eat" value="diner"> 
                    <label for="diners"> 
                        Diners 
                    </label> 
                    <input type="radio" id="casual" name="eat" value="restaurant" checked> 
                    <label for="casual">
                        Anything
                    </label> 
                    <input type="radio" id="dinner" name="eat" value="dinner"> 
                    <label for="dinner"> 
                        Dinner 
                    </label>             
                </div>
            </div>
            <div class="subcategory">
                <div class="title">Somewhere to Unwind</div>
                <div class="selection">
                    <input type="radio" id="bar" name="unwind" value="Bar"> 
                    <label for="bar"> 
                        Bar 
                    </label> 
                    <input type="radio" id="coffee" name="unwind" value="coffee" checked> 
                    <label for="coffee"> 
                        Coffee
                    </label> 
                    <input type="radio" id="park" name="unwind" value="forest preserve or state park"> 
                    <label for="park"> 
                        Park 
                    </label>             
                </div>
            </div>
        </div>

        <div class="submit">
            <button id="choose">Find something!</button>
        </div>

    </form>

    <div id="afterwords" style="display:none;">

        <div id="results" class="results">

        </div>

        <div class="more">
            <input type="hidden" id="offset" value="0" />
            <button id="reroll">Reroll!</button>
            <a id="nope" href="index.php" style="display:none">No, I give up.</a>
        </div>

    </div>

    <div class="disclaimer">
        <div class="text">For privacy reasons entries are not recorded. Search results courtesy Yelp.</div>
        <img width="115" height="25" alt="Powered by Yelp, red" src="http://s3-media3.fl.yelpcdn.com/assets/2/www/img/65526d1a519b/developers/Powered_By_Yelp_Red.png">
    </div>



    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript">
        window.jQuery || document.write('<script src="/scripts/jquery.min.js"><\/script>');
    </script>
    <script type="text/javascript">
        var choose = $("#choose"),
                choices = $("#choices"),
                validate = false,
                localInput = $("#location"),
                results = $("#results"),
                offset = $("#offset"),
                reroll = $("#reroll");

        var pattern1 = new RegExp(/(^[ A-Za-z \.\#\,0-9]+, ?[A-Za-z]+$)/);
        var pattern2 = new RegExp(/(^\d{5}(?:[-\s]\d{4})?$)/);

        $(document).ready(function () {

            localInput.on("keyup change keypress ", function () {
                if (validate) {
                    $("#error").text("");
                    local = localInput.val();
                    if ((pattern1.test(local) || pattern2.test(local))) {
                        localInput.attr("style", "");
                    } else {
                        localInput.css("border-color", "red");
                    }
                }
            });

            reroll.click(function (e) {
                e.preventDefault();
                getResults(false);
            });

            choose.click(function (e) {
                e.preventDefault();
                getResults(true);
            });

            function getResults(firstRun) {
                var something = $("input[name='something']:checked").val(),
                        eat = $("input[name='eat']:checked").val(),
                        unwind = $("input[name='unwind']:checked").val(),
                        local = localInput.val();

                if (firstRun) {

                    if (!(pattern1.test(local) || pattern2.test(local))) {
                        validate = true;
                        $("#error").text("You need specify a like an address or zip code.  You can use a full address or just a city and state.");
                        localInput.css("border-color", "red").focus();
                        return;
                    }

                    choices.hide();


                }
                var url = "yelp-api.php?";
                url = url + "location=" + local;

                if (!firstRun) {
                    offset.val(parseInt(offset.val()) + 1);
                    url = url + "&offset=" + offset.val();
                    if (parseInt(offset.val()) >= 1) {
                        $("#nope").show();
                    }
                }

                $("#afterwords").show();

                results.empty().append(loadContent(url, something)).append(loadContent(url, eat)).append(loadContent(url, unwind));
            }

            function loadContent(url, variable) {
                var content = $("<div class='" + variable + "'>");
                url = url + "&term=" + variable;
                url = encodeURI(url);
                return content.load(url);
            }
        });
    </script>
</body>

</html>
<!--http://localhost/ssnull/code/yelp-api.php?term=restaurant&offset=1&location=9%20cedar%20ct%20apt%207%20vernon%20hills,%20il-->