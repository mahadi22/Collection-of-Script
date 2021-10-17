<?php
// module title
$title="Hijri 1.0.1";

// file name
define("MODULE_FILE",basename($_SERVER['PHP_SELF']));

// calendar parameter definitions
define("ISLAMIC_EPOCH",1948439.5);
$ISLAMIC_WEEKDAYS = array("Al-Ahad", "Al-Ithnayn","Ath-Thalatha", "Al-Arbi`a","Al-Khamis", "Al-Jum`a", "As-Sabt");
$ISLAMIC_MONTHS = array("Muharram","Safar","Rabi`al-Awwal","Rabi`ath-Thani","Jumada l-Ula","Jumada t-Tania","Rajab","Sha`ban","Ramadhan","Shawwal","Dhu l-Qa`da","Dhu l-Hijja");
define("GREGORIAN_EPOCH",1721425.5);
$GREGORIAN_WEEKDAYS = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$GREGORIAN_MONTHS=array("","1 Jan","2 Feb","3 Mar","4 Apr","5 May","6 Jun","7 Jul","8 Aug","9 Sep","10 Oct","11 Nov","12 Dec");

// color paramaters
define("BG_TABLE","#666666");
define("BG_CELL","#FFFFFF");
define("BG_DAY","#FFFFEE");
define("BG_SUN","#FFCCCC");
define("BG_FRI","#99FF99");

/*  MOD  --  Modulus function which works for non-integers.  */
function mod($a, $b){
  $m=$a - ($b * floor($a / $b));
  return $m;
}

//  JWDAY  --  Calculate day of week from Julian day
function jwday($j){
  $jwd=mod(floor(($j + 1.5)), 7);
  return $jwd; 
}

//  LEAP_GREGORIAN  --  Is a given year in the Gregorian calendar a leap year ?
function leap_gregorian($year){
  $leap=(($year % 4) == 0) && (!((($year % 100) == 0) && (($year % 400) != 0)));
  return $leap;
}

//  GREGORIAN_TO_JD  --  Determine Julian day number from Gregorian calendar date
function gregorian_to_jd($year, $month, $day){
    $jd=(GREGORIAN_EPOCH - 1) 
        +(365 * ($year - 1)) 
        +floor(($year - 1) / 4) 
        +(-floor(($year - 1) / 100)) 
        +floor(($year - 1) / 400) 
        +floor((((367 * $month) - 362) / 12) 
        +(($month <= 2) ? 0 :(leap_gregorian($year) ? -1 : -2)) 
        +$day);
  return $jd;
}

//  JD_TO_GREGORIAN  --  Calculate Gregorian calendar date from Julian day
function jd_to_gregorian($jd) {
    $wjd = floor($jd - 0.5) + 0.5;
    $depoch = $wjd - GREGORIAN_EPOCH;
    $quadricent = floor($depoch / 146097);
    $dqc = mod($depoch, 146097);
    $cent = floor(dqc / 36524);
    $dcent = mod($dqc, 36524);
    $quad = floor($dcent / 1461);
    $dquad = mod($dcent, 1461);
    $yindex = floor($dquad / 365);
    $year = ($quadricent * 400) + ($cent * 100) + ($quad * 4) + $yindex;
    if (!(($cent == 4) || ($yindex == 4))) {$year++;}
    $yearday = $wjd - gregorian_to_jd($year, 1, 1);
    $leapadj = (($wjd < gregorian_to_jd($year, 3, 1)) ? 0:(leap_gregorian($year) ? 1 : 2));
    $month = floor(((($yearday + $leapadj) * 12) + 373) / 367);
    $day = ($wjd - gregorian_to_jd($year, $month, 1)) + 1;
    return array($year, $month, $day);
}

//  LEAP_ISLAMIC  --  Is a given year a leap year in the Islamic calendar ?
function leap_islamic($year){
    return ((($year * 11) + 14) % 30) < 11;
}

//  ISLAMIC_TO_JD  --  Determine Julian day from Islamic date
function islamic_to_jd($year, $month, $day){
    return ($day + ceil(29.5 * ($month - 1)) + ($year - 1) * 354 + floor((3 + (11 * $year)) / 30) + ISLAMIC_EPOCH) - 1;
}

//  JD_TO_ISLAMIC  --  Calculate Islamic date from Julian day
function jd_to_islamic($jd){
    $jd = floor($jd) + 0.5;
    $year = floor(((30 * ($jd - ISLAMIC_EPOCH)) + 10646) / 10631);
    $month = min(12,ceil(($jd - (29 + islamic_to_jd($year, 1, 1))) / 29.5) + 1);
    $day = ($jd - islamic_to_jd($year, $month, 1)) + 1;
    return array($year, $month, $day);
}

// SHOW_MONTH -- show select month options 
function show_month($m){
global $GREGORIAN_MONTHS;
  $rst='';
  for($i=1;$i<13;$i++){
    $rst.="<option value=\"$i\"".($m==$i?" selected":"").">$GREGORIAN_MONTHS[$i]</option>\n";
  }  
  return $rst;
}
// SHOW_HEADER -- show calendar header 
function show_header($pyear2,$pyear,$pmon,$mon,$year,$nmon,$nyear,$nyear2,$islcal1,$islcal2){
global $GREGORIAN_WEEKDAYS,$GREGORIAN_MONTHS,$ISLAMIC_WEEKDAYS,$ISLAMIC_MONTHS;  
  $rst= "<tr bgcolor=\"#3333cc\" align=center>"
       ."<td><a href=\"".MODULE_FILE."?p=hij&year=$pyear2&mon=$mon\" class=ah title='prev year'>$pyear2</a></td>"
       ."<td><a href=\"".MODULE_FILE."?p=hij&year=$pyear&mon=$pmon\" class=ah title='prev month'>$pmon</a></td>"
       ."<td colspan=3><span style=\"color:white;font-size:12pt;font-weight:bold;\">".$GREGORIAN_MONTHS[$mon]." $year</span></td>"
       ."<td><a href=\"".MODULE_FILE."?p=hij&year=$nyear&mon=$nmon\" class=ah title='next month'>$nmon</a></td>"
       ."<td><a href=\"".MODULE_FILE."?p=hij&year=$nyear2&mon=$mon\" class=ah title='next year'>$nyear2</a></td>"
       ."</tr>\n"
       ."<tr bgcolor=\"#ccccff\"><td colspan=\"3\" class=prevHijri><b>".$ISLAMIC_MONTHS[$islcal1[1]-1]." $islcal1[0]</b></td><td></td><td colspan=\"3\" align=\"right\" class=nextHijri><b>".$ISLAMIC_MONTHS[$islcal2[1]-1]." $islcal2[0]</b></td></tr>\n"    
       ."<tr bgcolor=\"#9999ee\">";
   for($i=0;$i<7;$i++) $rst.="<th>$ISLAMIC_WEEKDAYS[$i] $GREGORIAN_WEEKDAYS[$i]</th>";
   $rst.="</tr>\n";
  return $rst;
}

// SHOW_FOOTER -- show calendar footer 
function show_footer($mon,$year){
global $title;
  $rst="<tr bgcolor=\"#6666EE\"><td colspan=7 align=right>"
      ."<select name=mon>"
      .show_month($mon)
      ."</select>"
      ."&nbsp;<input type=text name=year size=4 maxlength=4 value=$year>&nbsp;<input type=submit value=\"show\"></td></tr>\n"
      ."<tr bgcolor=\"#3333cc\"><td colspan=7 align=center><small class=t7>adi_a12 | $title | 2004".(date("Y")>2004?"-".date("Y"):"")."</small></td></tr>\n";
   return $rst;   
} 

// VIEW_CALENDAR -- view monthly calendar (main function)
function view_calendar(){
  $year=(isset($_GET["year"])?$_GET["year"]:(isset($_POST["year"])?$_POST["year"]:date("Y")));
  $mon=(isset($_GET["mon"])?$_GET["mon"]:(isset($_POST["mon"])?$_POST["mon"]:date("n")));
  $date=(isset($_GET["date"])?$_GET["date"]:(isset($_POST["date"])?$_POST["date"]:date("d")));
  $mday=($date)?$date:date("d");
  $hour=date("G");
  $min=date("i");
  $sec=date("s");
  $adjust = (floor($sec + 60 * ($min + 60 * $hour) + 0.5) / 86400.0);
  $thisTime=mktime(0,0,0,$mon, 1, $year);
  $s1=date("w",$thisTime);
  $s2=date("t",$thisTime);
  $s3=date("w",mktime(0,0,0,$mon,$s2,$year));
  $pmon=($mon-1==0)?12:$mon-1;
  $pyear=($mon-1==0)?$year-1:$year;
  $nmon=($mon+1==13)?1:$mon+1;
  $nyear=($mon+1==13)?$year+1:$year;
  $nyear2=$year+1;
  $pyear2=$year-1;
  $jd = gregorian_to_jd($year, $mon, 1) + $adjust;
  $islcal1 = jd_to_islamic($jd);
  $jd = gregorian_to_jd($year, $mon, $s2) + $adjust;
  $islcal2 = jd_to_islamic($jd);
  $tgl=$islcal1[2];
  $w=0;
  $j=0;
  echo "<table border=0 bgcolor=\"".BG_TABLE."\" cellpadding=\"2\" cellspacing=\"1\" align=\"center\">\n"
      .show_header($pyear2,$pyear,$pmon,$mon,$year,$nmon,$nyear,$nyear2,$islcal1,$islcal2)
      ."<tr>";
  for($i=0;$i<$s1;$i++){
    echo "<td".($i==0?" bgcolor=\"".BG_SUN."\"":" bgcolor=\"".BG_CELL."\"").">&nbsp;</td>";
    $j++;
  }  
  for($i=$s1;$i<$s2+$s1;$i++){
    if($tgl>29){
      $jd=gregorian_to_jd($year,$mon,($i-$s1+1)) + $adjust;
      $isl=jd_to_islamic($jd);
      if($isl[2]==1){$tgl=1;$w=1;}
    }   
    echo "<td".($j%7==0?" bgcolor=\"".BG_SUN."\"":($j%7==5?" bgcolor=\"".BG_FRI."\"":" bgcolor=\"".BG_DAY."\""))." class=\"regGreg\">"
        .($i-$s1+1)."<small".($w?" class=nextHijri":" class=prevHijri").">$tgl</small></td>"
        .((($i+1)%7==0)&&(($i+1)>0)?"</tr>\n<tr>":"");
    $j++;
    $tgl++;
  }
  if($s3<6){
    if($s3!=0){
      for($i=0;$i<(6-$s3);$i++){
        echo "<td".($j%7==5?" bgcolor=\"".BG_FRI."\"":" bgcolor=\"".BG_CELL."\"").">&nbsp;</td>";
        $j++;      
      }  
    }else{
      for($i=0;$i<6;$i++){
        echo "<td".($j%7==5?" bgcolor=\"".BG_FRI."\"":" bgcolor=\"".BG_CELL."\"").">&nbsp;</td>";
        $j++;
      }  
    }
  }
  echo "</tr>\n"
      .show_footer($mon,$year)
      ."</table>\n";
  }
?>
<h2>Hijri Calendar</h2>
<form method="post" action="<?php echo MODULE_FILE."?p=hij"?>">
<?php view_calendar();?>
</form>
<style>
body,table{font-family:verdana;font-size:10pt;}
.regGreg{font-size:14pt;color:#000099;}
.prevHijri{font-size:8pt;color:#ee0000;}
.nextHijri{font-size:8pt;color:#006600;}
.t7 {font-size:7pt;color:#ffffff;}
.t10 {font-size:9pt;color:#ffffff;font-weight:bold;}
.ah{text-decoration:none;color:gold;font-weight:bold;}
.ah:hover{text-decoration:none;color:#FFFFEE;}
</style>
