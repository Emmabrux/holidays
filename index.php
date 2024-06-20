<?php
// Define the holidays with their corresponding images
$holidays = array(
    '02-02' => array("name" => "Brux Media Day", "image" => "brux.jpg"),
    '01-01' => array("name" => "New Year's Day", "image" => "new.jpg"),
    '03-06' => array("name" => "Independence Day", "image" => "ind.jpg"),
    '07-01' => array("name" => "Republic Day", "image" => "rep.jpg"),
    '08-04' => array("name" => "Founders' Day", "image" => "foun.jpg"),
    '09-21' => array("name" => "Kwame Nkrumah Memorial Day", "image" => "nkru.jpg"),
    '12-25' => array("name" => "Christmas Day", "image" => "chris.jpg"),
    '12-26' => array("name" => "Boxing Day", "image" => "box.jpg"),
    //'12-26' => array("name" => "Boxing Day", "image" => "farm.jpg"),
    //'12-26' => array("name" => "Boxing Day", "image" => "farm.jpg"),
    // Variable date holidays
    // 'Easter' => array("name" => "Easter", "image" => "easter.jpg"), // Example for variable date
    // 'Eid al-Fitr' => array("name" => "Eid al-Fitr", "image" => "eid_al_fitr.jpg"), // Example for variable date
    // 'Eid al-Adha' => array("name" => "Eid al-Adha", "image" => "eid_al_adha.jpg"), // Example for variable date
);

// Initialize variables
$holiday_message = "Enter a date to check if it's a holiday.";
$holiday_image = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the date entered by the user
    $entered_date = $_POST['date'];
    $formatted_date = date('m-d', strtotime($entered_date));
    
    // Check if the entered date is a holiday
    if (array_key_exists($formatted_date, $holidays)) {
        $holiday = $holidays[$formatted_date];
        $holiday_message = "The entered date is " . $holiday["name"] . "!";
        $holiday_image = "image/" . $holiday["image"];
    } else {
        $holiday_message = "The entered date is not a national holiday.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Ghanaian Holidays</title>
</head>
<body>
    <center>
    <h1>Check Ghanaian Holidays</h1>
    <form method="post" action="">
        <label for="date">Enter a date (YYYY-MM-DD):</label>
        <input type="date" id="date" name="date" required>
        <button type="submit">Check Holiday</button>
    </form>
    <p><?php echo $holiday_message; ?></p>
    <?php if ($holiday_image): ?>
        <img src="<?php echo $holiday_image; ?>" alt="<?php echo $holiday["name"]; ?>">
    <?php endif; ?>

    <p>Powered by: Emmanuel</p>

    <style>
        body{
            background-color: aqua;
        }

        img{
            width: 30%;
            height: 30%;
        }

        button{
            background-color: red;
            border-color: red;
            border-radius: 10%;

        }
    </style>
    </center>
</body>
</html>
