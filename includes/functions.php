<?php
// Common PHP functions for the website

// Pull out YAML front-matter from a markdown file
require_once(dirname(__FILE__) . '/libraries/Spyc.php');
function parse_md_front_matter($md_full)
{
  if (substr($md_full, 0, 3) == '---') {
    $md_parts = explode('---', $md_full, 3);
    if (count($md_parts) == 3) {
      $meta = spyc_load($md_parts[1]);
      $md = $md_parts[2];
      return array(
        'meta' => $meta,
        'md' => $md
      );
    }
  }
  return array(
    'meta' => null,
    'md' => $md_full
  );
}

// Helper function for event page
function sanitise_date_meta($event)
{
  # Check that start date is set, delete if not
  if (!isset($event['start_date'])) {
    return false;
  }
  # Check end date is set
  if (!isset($event['end_date'])) {
    $event['end_date'] = $event['start_date'];
  }
  # Parse dates
  if (!isset($event['start_time'])) $event['start_time'] = '';
  if (!isset($event['end_time'])) $event['end_time'] = '';
  $event['start_ts'] = strtotime($event['start_date'] . ' ' . $event['start_time']);
  $event['end_ts'] = strtotime($event['end_date'] . ' ' . $event['end_time']);
  # Check end is after start
  if ($event['end_ts'] < $event['start_ts']) {
    $event['end_date'] = $event['start_date'];
    $event['end_ts'] = strtotime($event['end_date'] . ' ' . $event['end_time']);
  }
  return $event;
}

function prep_current_event($event){
  $d = array();
  $d['event_type_classes'] = array(
    'hackathon' => 'primary',
    'talk' => 'success',
    'poster' => 'secondary',
    'tutorial' => 'info',
    'workshop' => 'light'
  );
  $d['event_type_icons'] = array(
    'hackathon' => 'fad fa-laptop-code',
    'talk' => 'fad fa-presentation',
    'poster' => 'fad fa-image',
    'tutorial' => 'fad fa-graduation-cap',
    'workshop' => 'fad fa-chalkboard-teacher'
  );
  # Nice date strings
  $d['date_string'] = date('j<\s\u\p>S</\s\u\p> M Y', $event['start_ts']) . ' - ' . date('j<\s\u\p>S</\s\u\p> M Y', $event['end_ts']);
  if (date('mY', $event['start_ts']) == date('mY', $event['end_ts'])) {
    $d['date_string'] = date('H:i', $event['start_ts']) . '-' . date('H:i e', $event['end_ts']) . ', ' .
      date('j<\s\u\p>S</\s\u\p> ', $event['start_ts']) . ' - ' . date('j<\s\u\p>S</\s\u\p> M Y', $event['end_ts']);
  }
  if (date('dmY', $event['start_ts']) == date('dmY', $event['end_ts'])) {
    $d['date_string'] = date('H:i', $event['start_ts']) . '-' . date('H:i e, j<\s\u\p>S</\s\u\p> M Y', $event['end_ts']);
  }
  # Nice date strings
  if ($event['start_time']) {
    $d['nice_date_string'] = ['data-timestamp="'.$event['start_ts'].'"', date('H:i e, j<\s\u\p>S</\s\u\p> M Y', $event['start_ts'])];
  } else {
    $d['nice_date_string'] = ['data-timestamp="'.$event['start_ts'].'"', date('j<\s\u\p>S</\s\u\p> M Y', $event['start_ts'])];
  }
  $d['colour_class'] = $d['event_type_classes'][strtolower($event['type'])];
  $d['icon_class'] = $d['event_type_icons'][strtolower($event['type'])];
  $d['event_type_badge'] = '<span class="badge badge-'.$d['colour_class'].' small"><i class="'. $d['icon_class'].' mr-1"></i>'. ucfirst($event['type']).'</span>';
  $d['location_url_meta'] = [];
  if (array_key_exists('location_url', $event)) {
    if(!is_array($event['location_url'])) $event['location_url'] = [$event['location_url']];
    foreach ($event['location_url'] as $idx => $url) {
      $d['location_url_meta'][$idx]['base_url'] = substr($url, 8, 7);

      switch ($d['location_url_meta'][$idx]['base_url']) {
        case 'zoom.us':
          $d['location_url_meta'][$idx]['icon'] = '<i class="fas fa-video mr-1"></i>';
          $d['location_url_meta'][$idx]['print_url'] = count($event['location_url']) > 3 ? '' : $url;
          break;
        case "youtu.b":
          $d['location_url_meta'][$idx]['icon'] = '<i class="fab fa-youtube mr-1"></i>';
          $d['location_url_meta'][$idx]['print_url'] = count($event['location_url']) > 3 ? '' : $url;
          break;
        case "www.bil":
          $d['location_url_meta'][$idx]['icon'] = '<i class="fad fa-film mr-1"></i>';
          $d['location_url_meta'][$idx]['print_url'] = count($event['location_url']) > 3 ? '' : $url;
          break;
        case "doi.org":
          $d['location_url_meta'][$idx]['icon'] = '<i class="fas fa-barcode mr-1"></i>';
          $d['location_url_meta'][$idx]['print_url'] = count($event['location_url']) > 3 ? '' : $url;
          break;
        default:
          $d['location_url_meta'][$idx]['icon'] = '<i class="fas fa-external-link mr-1"></i>';
          $d['location_url_meta'][$idx]['print_url'] = $url;
      }
    }
  }
  return $d;
}

function print_current_events($events, $border){

  foreach ($events as $idx => $event) :
    $d = prep_current_event($event);
    $header_html .= '<dt>Event starts:</dt><dd '.$d['nice_date_string'][0].'>' . $d['nice_date_string'][1] . '</dd>';
?>

    <!-- Event Card -->
    <div class="card mb-3 <?php echo ($border ?  'border-top-0 border-right-0 border-bottom-0 border-' . $d['colour_class'] : 'border-0'); ?> ">
      <div class="card-body py-3 d-flex">
        <div class="pt-2"><i class="<?php echo $d['icon_class']; ?> fa-5x text-<?php echo $d['colour_class'] ?> mr-2"></i></div>
        <div class="px-2 flex-grow-1 d-flex flex-column justify-content-between">
          <div>
            <h5 class=" my-0 py-0 d-flex">
              <a class="text-success flex-grow-1" href="<?php echo $event['url']; ?>"><?php echo $event['title']; ?></a>
              <small><?php echo $d['event_type_badge']; ?></small>
            </h5>
            <?php
            if (array_key_exists('subtitle', $event)) {
              echo '<span class="mb-0 text-mute"> ' . $event['subtitle'] . '</span>';
            }
            if (array_key_exists('description', $event)) {
              echo '<p>' . nl2br($event['description']) . '</p>';
            } ?>
          </div>
          <div class="d-md-flex justify-content-between align-items-end">
            <h6 class=""><?php echo $d['date_string']; ?></h6>

            <a href="<?php echo $event['url']; ?>" class="btn btn-outline-success">
              See details
            </a>
          </div>
        </div>
      </div>
      <?php if (array_key_exists('location_url', $event) && $event['location_url'][0] != "#") {
        echo '<div class="btn-group mt-1" role="group" aria-label="External links">';
        foreach ($event['location_url'] as $idx => $url) {
          $m = $d['location_url_meta'][$idx];
          echo '<a href="' . $url . '" class="btn btn-' . $d['colour_class'] . ' rounded-0" data-toggle="tooltip" title="'.$url.'">' . $m['icon'] . $m['print_url'] . '</a>';
        }
        echo '</div>';
      }
      ?>
    </div>

<?php
  endforeach;
}

// From https://stackoverflow.com/a/18891474/713980
function time_ago($date, $ago = true)
{
  $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
  $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
  $now = time();
  if (is_numeric($date)) $unix_date = $date;
  else $unix_date = strtotime($date);
  // check validity of date
  if (empty($unix_date)) {
    return $date;
  }
  // is it future date or past date
  if ($now > $unix_date) {
    $difference = $now - $unix_date;
    $tense = "ago";
  } else {
    $difference = $unix_date - $now;
    $tense = "from now";
  }
  for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
    $difference /= $lengths[$j];
  }
  $difference = round($difference);
  if ($difference != 1) {
    $periods[$j] .= "s";
  }
  $returnstring = "$difference $periods[$j]";
  if ($ago || (!$ago && $tense != 'ago')) {
    $returnstring .= " {$tense}";
  }
  return $returnstring;
}


function rsort_releases($a, $b)
{
  $t1 = strtotime($a->published_at);
  $t2 = strtotime($b->published_at);
  return $t2 - $t1;
}
function rsort_pipelines($a, $b)
{
  $t1 = strtotime($a->last_release);
  $t2 = strtotime($b->last_release);
  return $t2 - $t1;
}

function round_nicely($num)
{
  if ($num > 1000000) {
    $num /= 1000000;
    $num = round($num, 2) . 'M';
  } else if ($num > 1000) {
    $num /= 1000;
    $num = round($num, 2) . 'K';
  }
  return $num;
}

function endswith($haystack, $needle)
{
  $length = strlen($needle);
  if (!$length) {
    return true;
  }
  return substr($haystack, -$length) === $needle;
}

function return_json($response)
{
  // Spit out a JSON response with correct headers and exit
  header('Content-type: application/json');
  echo json_encode($response, JSON_PRETTY_PRINT);
  exit;
}

function get_self_url($strip_query = true)
{
  // Build URL for this page
  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') $self_url = "https://";
  else $self_url = "http://";
  if ($strip_query) {
    $url = strtok($_SERVER["REQUEST_URI"], '?');
  } else {
    $url = $_SERVER["REQUEST_URI"];
  }
  return $self_url . $_SERVER['HTTP_HOST'] . $url;
}

function generate_toc($html_string)
{
  $toc = '';
  $is_active = true;
  $id_regex = "~<h([1-3])([^>]*)id\s*=\s*['\"]([^'\"]*)['\"]([^>]*)>(.*)</h[1-3]>~Uis";
  preg_match_all($id_regex, $html_string, $matches, PREG_SET_ORDER);
  if ($matches) {
    $counter = $curr_level =  0;
    $shift = min(array_column($matches, 1))-1; # get the highest heading level and shift levels to start from 1
    foreach ($matches as $match) {
      $whole_str = $match[0];
      $level = $match[1]-$shift;
      $before_attrs = trim($match[2]);
      $id = trim($match[3]);
      $after_attrs = trim($match[4]);
      $h_content = $match[5];
      $name = trim(str_replace(['&nbsp;','&amp;'], ['','&'], htmlentities(strip_tags($h_content, $allowed_tags= ['code']))));
      if ($level > $curr_level) {
        $toc .= "\n" . '<div class="list-group">' . "\n";
        $counter += 1;
      } else if ($level == $curr_level) {
        $toc .= "\n";
      } else {
        while ($level < $counter) {
          $toc .= "\n</div>\n\n";
          $counter -= 1;
        }
      }
      $curr_level = $level;
      if (preg_match('/<code>.*?<\/code>/', $whole_str,$code_match)) {
        $name = html_entity_decode($name);
      }
      if (preg_match('/<i.*?<\/i>/', $whole_str, $icon_match)) {
        $name = $icon_match[0] . $name;
      }
      $is_hidden = strpos($before_attrs, 'toc-hidden') !== false || strpos($after_attrs, 'toc-hidden') !== false;
      $toc_hidden = $is_hidden ? ' collapse ' : '';
      $active = $is_active ? ' active ' : '';
      $is_active = false;
      $toc .= '<a class="list-group-item list-group-item-action scroll_to_link '.$toc_hidden.$active.'" href="#'.$id.'">'.$name.'</a>';
    }
  }
  while ($counter > 0) {
    $toc .= '</div>';
    $counter -= 1;
  }
  return $toc;
}

$heading_ids = [];
function _h($level, $html, $toc_hidden = false)
{
  ////////////////
  // Build a heading tag with ID and anchor link
  ////////////////
  global $heading_ids;
  # Clean up the ID
  $hid = trim(strip_tags($html));
  $hid = strtolower(preg_replace('/[^\w\-\.]/', '', str_replace(' ', '-', $hid)));
  # Avoid duplicate IDs
  $i = 1;
  $base_hid = $hid;
  while (in_array($hid, $heading_ids)) {
    $hid = $base_hid . '-' . $i;
    $i += 1;
  }
  # Class for hiding in ToC
  $toc_hidden_class = $toc_hidden ? 'toc-hidden' : '';
  return '
    <h' . $level . ' id="' . $hid . '" class="' . $toc_hidden_class . '">
      <a href="#' . $hid . '" class="header-link"><span class="fas fa-link"></span></a>
      ' . $html . '
    </h' . $level . '>';
};
function _h1($html)
{
  return _h(1, $html);
}
function _h2($html)
{
  return _h(2, $html);
}
function _h3($html)
{
  return _h(3, $html);
}
function _h4($html)
{
  return _h(4, $html);
}
function _h5($html)
{
  return _h(5, $html);
}


function add_ids_to_headers($content_input, $is_hidden = false)
{
  //////////////////
  // Add IDs and anchor links to all headings in a block of HTML
  //////////////////
  global $heading_ids;
  $content_output = preg_replace_callback(
    '~<h([1234])>(.*?)</h([1234])>~Ui', // Ungreedy by default, case insensitive
    function ($matches) use ($heading_ids, $is_hidden) {
      $id_match = trim(strip_tags($matches[2]));
      $id_match = strtolower(preg_replace('/[^\w\-\.]+/', '', str_replace(' ', '-', $id_match)));
      $hid = $id_match;
      $i = 1;
      while (in_array($hid, $heading_ids)) {
        $hid = $id_match . '-' . $i;
        $i += 1;
      }
      $hid = preg_replace('/^[\s\-]+/', '', $hid); // remove dashes from start of string (e.g. for parameter)
      $heading_ids[] = $hid;
      $hidden_class = $is_hidden ? 'toc-hidden' : '';
      return '<h' . $matches[1] . ' id="' . $hid . '" class="' . $hidden_class . '"><a href="#' . $hid . '" class="header-link scroll_to_link"><span class="fas fa-link"></span></a>' . $matches[2] . '</h' . $matches[3] . '>';
    },
    $content_input
  );
  return $content_output;
}

function get_youtube_id($url){
  // https://stackoverflow.com/questions/3392993/php-regex-to-get-youtube-video-id#comment11552053_6121972
  preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=embed/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
  if($matches){
    return $matches[0];
  }
  return false;
}




// Load event front-matter
$md_base = dirname(dirname(__file__)) . "/markdown/";
$events = [];
$year_dirs = glob($md_base . 'events/*', GLOB_ONLYDIR);
foreach ($year_dirs as $year) {
  $event_mds = glob($year . '/*.md');
  foreach ($event_mds as $event_md) {
    // Load the file
    $md_full = file_get_contents($event_md);
    if ($md_full !== false) {
      $fm = parse_md_front_matter($md_full);
      // Add the URL
      $fm['meta']['url'] = '/events/' . basename($year) . '/' . str_replace('.md', '', basename($event_md));
      // Add to the events array
      $events[] = $fm['meta'];
    }
  }
}

# Look to see if we have an upcoming / ongoing event to show and pick one
$curr_event = false;
$additional_ongoing = 0;
$additional_upcoming = 0;
foreach ($events as $idx => $event) {
  $event = sanitise_date_meta($event);
  if (!$event) {
    unset($events[$idx]);
    continue;
  }
  if($event['end_ts'] - $event['start_ts'] > 3600 * 5){
    $time_window = 86400*7; // show announcement 7 days ahead for full day events
  } else {
    $time_window = 86400;
  }
  if ($event['start_ts'] < time() + $time_window && $event['end_ts'] > time()) {
    $current_events[$idx] = $event;

    // Ongoing event
    if ($event['start_ts'] < time() && $event['end_ts'] > time()) {
      $event['ongoing'] = true;
      if(!$curr_event) $curr_event = $event;
      // If multiple events running now, take the one with latest start time
      else if($event['start_ts'] > $curr_event['start_ts']) $curr_event = $event;
      else $additional_ongoing++;
    }
    // Upcoming event
    else {
      $event['ongoing'] = false;
      if(!$curr_event) $curr_event = $event;
      // If multiple events coming up, take the one with earliest start time
      else if($event['start_ts'] < $curr_event['start_ts']) $curr_event = $event;
      else $additional_upcoming++;
    }
  }
}
