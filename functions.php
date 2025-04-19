<?php
    // Check date
    function extract_time($timestamp) {
        // $time = date("H:i", strtotime($timestamp));
        // return $time;
        date_default_timezone_set('Asia/Kolkata');
        
        $time = date("H:i", strtotime($timestamp));
        $date = date("Y-m-d", strtotime($timestamp));
        
        $today = date("Y-m-d");
        $tomorrow = date("Y-m-d", strtotime('+1 day'));

        if ($date === $today) {
            $label = "Today";
        } elseif ($date === $tomorrow) {
            $label = "Tomorrow";
        } else {
            $label = date("l, d M Y", strtotime($timestamp));
        }

        return "$time - $label";
    }

    // Status chip
    function create_chip($value) {
        $output = "";
        if ($value == "on_time") {
            $output = '<span class="chip green">On Time</span>';
        }
        if ($value == "delayed") {
            $output = '<span class="chip yellow">Delayed</span>';
        }
        if ($value == "cancelled") {
            $output = '<span class="chip red">Cancelled</span>';
        }
        if ($value == "reached") {
            $output = '<span class="chip gray">Reached</span>';
        }
        if ($value == "departed") {
            $output = '<span class="chip blue">Departed</span>';
        }
        return $output;
    }
?>