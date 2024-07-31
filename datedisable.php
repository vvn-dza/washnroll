<?php
$min_date = date('Y-m-d'); 
echo "$min_date";

// get the current date in the format required by the date picker

?>

<!-- HTML code for the date picker -->
<input type="date" name="date" min="<?php echo $min_date; ?>">
