<style>
body{ font-family:Arial, Helvetica, sans-serif; background-color:#CCCCCC; }
div { background-color:#FFFFFF; padding:100px; margin-left:10%; margin-right:10%; }
table { border:1px solid #999; border-collapse:collapse; }
caption { font-size:2em; font-weight:bold; }
th { background-color:#CCCCCC; font-size:8pt; }
th#today { background-color:#FF9966; }
td{ border:1px solid #666; font-size:8pt; }
td.previous, td.next { background-color:#CCCCCC; }
td#today{ background-color:#FFFFCC; }
tr.dayLabel { font-size:.75em; text-align:right; }
tr.dayLabel td { border-bottom:0; }
tr.dayContent td, tr.dayContent td.previous { border-top:0; }
tr.dayContent td span { background-color:#CCCCFF; border:1px solid #9999FF; clear:both; display:block; }
span.event { background-color:#CCCCFF; display:block; }
</style>

<div>
<?php
include_once 'LeoCalendar.class.php';

$events =    array
            (
                array('2013-03-09 15:45:00', 'tech tranining'),
                array('2013-03-25 11:00:00', 'website launch'),
                array('2013-03-11 08:30:00', 'work on Calendar class'),
                array('2013-03-11 13:00:00', 'CSS tranining session'),
                array('2013-03-13 17:15:00', 'PHP tranining at KH'),
                array('2013-03-10 11:00:00', 'kronos tranining'),
                array('2013-04-20 09:30:00', 'vacations!')
            );

$calendar = new LeoCalendar($_GET['workDate'], $_GET['calendarType'], $events);
echo $calendar->displayCalendar();

?>
</div>