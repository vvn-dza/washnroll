<?php
// Get the current system time
$current_time = time();
echo $current_time;
// Define the menu options based on the system time
if ($current_time < strtotime('today 12:00pm')) {
  $menu_options = array('Option 1', 'Option 2', 'Option 3');
} else {
  $menu_options = array('Option 4', 'Option 5', 'Option 6');
}

// Generate the drop-down menu
echo '<select>';
foreach ($menu_options as $option) {
  echo '<option>' . $option . '</option>';
}
echo '</select>';
?>
