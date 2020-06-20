<?php
$event = 'west';
$title = 'IndieWebCamp West';
$date = 'Jun 27-28, 2020';
$year = 2020;
$city = 'Online only';
$url = 'https://2020.indieweb.org/west';
$summary = 'IndieWebCamp West 2020 is an online gathering for independent web creators of all kinds, from graphic artists, to designers, UX engineers, coders, hackers, to share ideas, actively work on creating for their own personal websites, and build upon each others creations.';
include(dirname(__FILE__).'/../lib/rsvps.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title><?= $title ?> <?= $year ?> - <?= $city ?></title>

  <link rel="webmention" href="/webmention.php">

  <link rel="stylesheet" type="text/css" href="/semantic/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/icomoon/style.css">
  <link rel="stylesheet" type="text/css" href="/assets/styles.css">
  <link rel="stylesheet" href="/assets/leaflet/leaflet.css" />
  <script src="/assets/jquery-2.2.0.min.js"></script>
  <script src="/semantic/semantic.min.js"></script>
  <script src="/assets/leaflet/leaflet.js"></script>
  <script src='https://js.tito.io/v1' async></script>

  <meta property="og:url" content="<?= $url ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $title ?> - <?= $date ?> - <?= $city ?>">
  <meta property="og:description" content="<?= htmlspecialchars($summary) ?>">

  <script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    })
  ;
  </script>
</head>
<body class="h-event">

<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
  <div class="ui container">
    <?php include('../templates/'.$event.'/nav.php'); ?>
<!--
    <div class="right menu">
      <div class="item">
        <a class="ui primary button">Sign Up</a>
      </div>
    </div>
 -->
  </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
  <?php include('../templates/'.$event.'/nav.php'); ?>
</div>


<!-- Page Contents -->
<div class="pusher">
  <div class="ui inverted vertical masthead center aligned segment gold-bkg">

    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
        <?php include('../templates/'.$event.'/nav.php'); ?>
      </div>
    </div>

    <div class="ui text container event-header">

      <h1 class="ui inverted header p-name">
        <?= $title ?>
      </h1>

      <h2><?= $date ?></h2>

      <div class="alert">
        <h2>Online only</h2>
        <p>IndieWebcamp West is 100% online during Pacific Daylight Time hours on the 27th and 28th June 2020.</p>
      </div>
      <p class="summary p-summary"><?= htmlspecialchars($summary) ?></p>

    </div>

  </div>


   <div class="ui vertical stripe segment" id="register">
    <div class="ui text container">
      <h3 class="ui header">Register</h3>
      <tito-widget event="indiewebcamp/iwc-west-2020"><a href="https://ti.to/indiewebcamp/iwc-west-2020">Get Tickets</a></tito-widget>
    </div>
  </div>

  <div class="ui vertical stripe segment" id="rsvps">
    <div class="ui text container">

      <?php
      $ticket_types[] = [
        'title' => 'Registrations',
        'filter' => 'Participant',
      ];
      include('../templates/show-tito-tickets.php');
      ?>

      <h3 class="ui header" id="indie-rsvps">Indie RSVPs</h3>

      <p>See <a href="https://indieweb.org/RSVP">indieweb.org/RSVP</a> for instructions on how to create an RSVP post. Once you've created the RSVP post which links to this page, send a Webmention and you'll appear below!</p>

      <?php include('../templates/show-rsvps.php'); ?>

    </div>
  </div>



  <div class="ui vertical stripe segment" id="schedule">
    <div class="ui text container">
      <h3 class="ui header">Schedule</h3>
      <?php include('../templates/'.$event.'/schedule.php'); ?>
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


  <!--<div class="ui vertical stripe segment nopadding" style="border-bottom: 0;" id="location">
    <div id="map"></div>
  </div>-->



  <div class="ui vertical stripe segment" id="add-info">
    <div class="ui text container">
      <h3 class="ui header">Addtional Information</h3>
      <?php include('../templates/'.$event.'/add-info.php'); ?>
    </div>
  </div>



  <div class="ui vertical stripe segment" id="sponsors">
    <div class="ui text container">
      <h3 class="ui header">Sponsors</h3>
      <?php include('../templates/'.$event.'/sponsors.php'); ?>
    </div>
  </div>



  <div class="ui inverted vertical footer segment gold-bkg">
    <div class="ui container">
      <p><?= $title ?> &bull; <?= $date ?> &bull; <?= $city ?></p>
      <ul>
        <li><a href="https://indieweb.org/2020/West">IndieWebCamp West wiki page</a></li>
        <li><a href="https://indieweb.org/code-of-conduct">Code of Conduct</a></li>
        <li><a href="https://indieweb.org/images/2/2d/indiewebcamp-sponsorship-prospectus.pdf">Sponsorship Prospectus</a> (PDF)</li>
      </ul>
    </div>
  </div>
</div>

<?php include(__DIR__.'/../templates/analytics.php') ?>
</body>
</html>
