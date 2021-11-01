<?php
$title = 'IndieWeb Events';
$year = 2020;
$url = 'https://2020.indieweb.org/';
$summary = 'IndieWeb upcoming events.';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?= $title ?> <?= $year ?></title>

  <link rel="webmention" href="/webmention.php">

  <link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/icomoon/style.css">
  <link rel="stylesheet" type="text/css" href="/assets/styles.css?2">
  <link rel="stylesheet" href="/assets/leaflet/leaflet.css" />
  <script src="/assets/jquery-2.2.0.min.js"></script>
  <script src="/semantic/semantic.min.js"></script>
  <script src="/assets/leaflet/leaflet.js"></script>
  <script src='https://js.tito.io/v1' async></script>

  <meta property="og:url" content="<?= $url ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $title ?> - <?= $year ?>">
  <meta property="og:description" content="<?= htmlspecialchars($summary) ?>">
</head>
<body>

  <div class="ui vertical stripe segment orange-bkg">
    <div class="ui text container">
      <div style="font-size: 2em; text-align: center; color: white" class="carrot-white">
        IndieWebCamps in <?= $year ?>
      </div>
    </div>
  </div>


<!-- Page Contents -->
<div class="pusher">
  <div class="ui vertical stripe segment h-feed" id="events">
    <div class="ui text container">

    

      <h2 style="margin-top:6em;">Past Events</h2>

      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/austin">IndieWebCamp Austin</a>
        </h3>
        <p>
          <span class="p-location location">Austin, Texas</span><br />
          <time class="dt-start dtstart" datetime="2020-02-22">February 22</time>-<time class="dt-end dtend" datetime="2020-02-23">23, 2020</time>
        </p>
      </div>



      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/london">IndieWebCamp London</a>
        </h3>
        <p>
          <span class="p-location location">Online only</span><br />
          <time class="dt-start dtstart" datetime="2020-03-14">March 14</time>-<time class="dt-end dtend" datetime="2020-03-15">15, 2020</time>
        </p>
      </div>



      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/summit"><strike>IndieWeb Summit</strike></a>
        </h3>
        <p>
          <span class="p-location location">CANCELLED</span><br />
          <time class="dt-start dtstart" datetime="2020-06-27">June 27</time>-<time class="dt-end dtend" datetime="2020-06-28">28, 2020</time>
        </p>
      </div>


      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/west">IndieWebCamp West</a>
        </h3>
        <p>
          <span class="p-location location">Online</span><br />
          <time class="dt-start dtstart" datetime="2020-06-27">June 27</time>-<time class="dt-end dtend" datetime="2020-06-28">28, 2020</time>
        </p>
      </div>


      <div class="h-event vevent">
        <h3 class="ui header p-name summary">
          <a class="u-url url" href="/east">IndieWebCamp East</a>
        </h3>
        <p>
          <span class="p-location location">Online</span><br />
          <time class="dt-start dtstart" datetime="2020-11-14">November 14</time>-<time class="dt-end dtend" datetime="2020-11-15">15, 2020</time>
        </p>
      </div>


      


      <div style="margin-top: 100px;">
        <p>See more related events at <a href="https://events.indieweb.org/">events.indieweb.org</a></p>
      </div>

    </div>
  </div>

  <div class="ui vertical stripe segment orange-bkg" id="social-media-section">
    <div class="ui text container">
      <div style="font-size: 2em; text-align: center;" class="carrot-white">
        #indiewebcamp
      </div>
      <div style="font-size: 4em; text-align: center;" class="social-media-icons">
        <a href="https://indieweb.org"><i class="ui attach icon"></i></a>
        <a href="https://twitter.com/indiewebcamp"><i class="ui twitter icon"></i></a>
        <a href="https://www.facebook.com/indiewebcamp/"><i class="ui facebook icon"></i></a>
      </div>
    </div>
  </div>

</div>

<?php include(__DIR__.'/../templates/analytics.php') ?>

</body>
</html>
