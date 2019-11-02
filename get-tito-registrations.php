<?php
chdir(__DIR__);
require_once('lib/rsvps.php');

$config = json_decode(trim(file_get_contents('.tito.json')));

// Find all active events
$events = get_active_events();

foreach($events as $event=>$tito_path) {
  echo $event."\n";
  process_tito_event($event, $tito_path, $config);
}


function process_tito_event($event, $tito_path, $config) {

  $registrations = get_tito('https://api.tito.io/v2/indiewebcamp/'.$tito_path.'/registrations', $config->token);

  if(!file_exists(dirname(__FILE__).'/data/'.$event)) {
    mkdir(dirname(__FILE__).'/data/'.$event, 0755);
  }

  file_put_contents(dirname(__FILE__).'/data/'.$event.'/tito.json', json_encode($registrations, JSON_PRETTY_PRINT+JSON_UNESCAPED_SLASHES));

  $ticketData = [];

  print_r($registrations);

  foreach($registrations['data'] as $reg) {
    $timestamp = $reg['attributes']['completed-at'];
    $email = $reg['attributes']['email'];

    echo "======\n";
    $hash = md5(strtolower(trim($email)));
    echo $email . "\n";
    echo $hash . "\n";

    $dir = __DIR__.'/data/'.$event.'/'.$hash;
    @mkdir($dir, 0755);


    $website = false;
    $show = false;
    $attendance = [];
    $ticket_type = [];

    if(isset($reg['relationships']['tickets']['links']['related'])) {
      $ticket = get_tito($reg['relationships']['tickets']['links']['related'], $config->token);
      if($ticket && isset($ticket['data'][0])) {


          $ticket = $ticket['data'][0];
          $name = $ticket['attributes']['name'];
          if(isset($ticket['attributes']['answers']) && is_array($ticket['attributes']['answers'])) {
            foreach($ticket['attributes']['answers'] as $question=>$answer) {
              if($question == 'your-personal-website')
                $website = normalize_url($answer);
              if($question == 'would-you-like-to-be-shown-on-the-public')
                $show = ($answer == 'Yes, show me on the guest list' ? 'yes' : 'no');
              if($question == 'would-you-like-to-be-seen-on-the-public') // for nyc
                $show = ($answer == 'Yes, show me on the guest list' ? 'yes' : 'no');
              if($question == 'event-attendance')
                $attendance = $answer;
            }
          }

          echo $name . "\n";
          echo $timestamp . "\n";
          echo $website . "\n";
          echo $show . "\n";

          file_put_contents($dir.'/ticket.json', json_encode($ticket, JSON_PRETTY_PRINT+JSON_UNESCAPED_SLASHES));

          $fn = $dir.'/photo.jpg';
          if(!file_exists($fn)) {
            // Try to download the profile photo from Gravatar
            $ch = curl_init('https://www.gravatar.com/avatar/'.$hash.'.jpg?d=404');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);
            $imgdata = curl_exec($ch);

            if($imgdata) {
              echo "found gravatar\n";
              @mkdir($dir, 0755);
              file_put_contents($fn, $imgdata);
            } else {
              echo "no gravatar\n";
            }
          }

          // Fetch "Releases" to find out what type of ticket they registered for
          if(isset($ticket['relationships']['release']['links']['related'])) {
            $release = get_tito($ticket['relationships']['release']['links']['related'], $config->token);
            file_put_contents($dir.'/release.json', json_encode($release, JSON_PRETTY_PRINT+JSON_UNESCAPED_SLASHES));

            if(isset($release['data']['attributes']['title'])) {
              $ticket_type[] = $release['data']['attributes']['title'];
            }
          }

      }

      $thisTicket = [
        'name' => $name,
        'website' => $website,
        'email' => $email,
        'timestamp' => $timestamp,
        'show' => $show,
        'attendance' => $attendance,
        'ticket_type' => $ticket_type,
      ];

      $ticketData[] = $thisTicket;

      file_put_contents($dir.'/summary.json', json_encode($thisTicket, JSON_PRETTY_PRINT+JSON_UNESCAPED_SLASHES));

    }

  }

  file_put_contents(dirname(__FILE__).'/data/'.$event.'/tickets.json', json_encode($ticketData, JSON_PRETTY_PRINT));


}





function get_tito($url, $token) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Token token=' . $token
  ]);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  return json_decode($response, true);
}

function normalize_url($url) {
  if($url == '') return $url;
  if(!preg_match('/^https?:\/\//', $url))
    return 'http://'.$url;
  return $url;
}
