<?php

/* copyright 2014 - FO-nTTaX
 *
 * script to create the wikicode of the player crosstables */

$numberofteams = 10;

echo '&lt;includeonly&gt;&lt;table class="wikitable crosstable" style="text-align:center;margin:0;line-height:14px"&gt;&lt;!--<br>';
echo '--&gt;{{#ifeq:{{{displaystats}}}|true|&lt;th colspan="{{#expr:1';
for ($i = 1; $i <= $numberofteams; $i++) {
   echo '{{#if:{{{player'.$i.'|}}}|+1}}';
}
echo '}}"&gt;Crosstable&lt;/th&gt;&lt;th&gt;Group Record&lt;/th&gt;}}&lt;!--'."<br>";

for ($i = 1; $i <= $numberofteams; $i++) {
   echo '--&gt;{{#if:{{{player'.$i.'|}}}|&lt;tr style="height:30px"&gt;&lt;!--'."<br>";
   echo '--&gt;&lt;th style="min-width:{{{cell-width|100}}}px;"&gt;{{player|{{{player'.$i.'}}}|race={{{player'.$i.'race|}}}|flag={{{player'.$i.'flag|}}}|link={{{player'.$i.'link|}}}}}&lt;/th&gt;&lt;!--'."<br>";
   for ($j = 1; $j <= $numberofteams + 1; $j++) {
      if ($i == $j) {
         echo '--&gt;&lt;td style="background-color:#f2f2f2"&gt;&lt;/td&gt;&lt;!--'."<br>";
      } elseif ($j == $numberofteams + 1) {
         echo '--&gt;{{#ifeq:{{{displaystats}}}|true|&lt;td style="background-color:{{#switch: {{{player'.$i.'bg}}}|proceed|up = <nowiki>#cfc</nowiki>|stayup = <nowiki>#efa</nowiki>|stay = <nowiki>#ff9</nowiki>|staydown = <nowiki>#fda</nowiki>|drop|down = <nowiki>#fcc</nowiki>|#f9f9f9}};"&gt;\'\'\'{{#if:{{{player'.$i.'_w|}}}{{{player'.$i.'_l|}}}|{{{player'.$i.'_w|0}}}-{{{player'.$i.'_l|0}}}|{{#expr:0';
         for ($k = 1; $k <= $numberofteams; $k++) {
            if ($i < $k) {
               echo '+{{#ifexpr:{{{'.$i.'vs'.$k.'result|0}}}&gt;{{{'.$i.'vs'.$k.'resultvs|0}}}|1|0}}{{#ifeq:{{{doublerounded}}}|true|+{{#ifexpr:{{{'.$k.'vs'.$i.'result|0}}}&lt;{{{'.$k.'vs'.$i.'resultvs|0}}}|1|0}}}}';
            } elseif ($i > $k) {
               echo '{{#ifeq:{{{doublerounded}}}|true|+{{#ifexpr:{{{'.$i.'vs'.$k.'result|0}}}&gt;{{{'.$i.'vs'.$k.'resultvs|0}}}|1|0}}+{{#ifexpr:{{{'.$k.'vs'.$i.'result|0}}}&lt;{{{'.$k.'vs'.$i.'resultvs|0}}}|1|0}}|+{{#ifexpr:{{{'.$k.'vs'.$i.'result|0}}}&lt;{{{'.$k.'vs'.$i.'resultvs|0}}}|1|0}}}}';
            }
         }
         echo '}}-{{#expr:0';
         for ($k = 1; $k <= $numberofteams; $k++) {
            if ($i < $k) {
               echo '+{{#ifexpr:{{{'.$i.'vs'.$k.'result|0}}}&lt;{{{'.$i.'vs'.$k.'resultvs|0}}}|1|0}}{{#ifeq:{{{doublerounded}}}|true|+{{#ifexpr:{{{'.$k.'vs'.$i.'result|0}}}&gt;{{{'.$k.'vs'.$i.'resultvs|0}}}|1|0}}}}';
            } elseif ($i > $k) {
               echo '{{#ifeq:{{{doublerounded}}}|true|+{{#ifexpr:{{{'.$i.'vs'.$k.'result|0}}}&lt;{{{'.$i.'vs'.$k.'resultvs|0}}}|1|0}}+{{#ifexpr:{{{'.$k.'vs'.$i.'result|0}}}&gt;{{{'.$k.'vs'.$i.'resultvs|0}}}|1|0}}|+{{#ifexpr:{{{'.$k.'vs'.$i.'result|0}}}&gt;{{{'.$k.'vs'.$i.'resultvs|0}}}|1|0}}}}';
            }
         }
         echo '}}}}\'\'\'&lt;/td&gt;}}&lt;!--'."<br>";
      } elseif ($i < $j) {
         echo '--&gt;{{#if:{{{player'.$j.'|}}}|{{#if:{{{'.$i.'vs'.$j.'result|}}}{{{'.$i.'vs'.$j.'resultvs|}}}|&lt;td style="padding:0;background-color:#{{#ifeq:{{{'.$i.'vs'.$j.'result}}}|{{{'.$i.'vs'.$j.'resultvs}}}|f9f9f9|{{#ifeq:{{#expr:{{{'.$i.'vs'.$j.'result}}}&gt;{{{'.$i.'vs'.$j.'resultvs}}}}}|1|ccffcc|ffcccc}}}}" class="bracket-game"&gt;&lt;div&gt;\'\'\'{{{'.$i.'vs'.$j.'result}}}-{{{'.$i.'vs'.$j.'resultvs}}}\'\'\'&lt;/div&gt;{{#if:{{{'.$i.'vs'.$j.'details|}}}|&lt;div class="bracket-game-details" style="margin-left:{{#expr:5+{{{cell-width|100}}}}}px;"&gt;{{BracketMatchPlayers|{{#if:{{{player'.$i.'|}}}|{{{player'.$i.'}}}|TBD}}|{{{player'.$i.'race|}}}|{{#if:{{{player'.$j.'|}}}|{{{player'.$j.'}}}|TBD}}|{{{player'.$j.'race|}}}}} {{{'.$i.'vs'.$j.'details}}}&lt;/div&gt;}}&lt;/td&gt;|&lt;td&gt;&lt;/td&gt;}}}}&lt;!--<br>';
      } elseif ($i > $j) {
         echo '--&gt;{{#ifeq:{{{doublerounded}}}|true|{{#if:{{{'.$i.'vs'.$j.'result|}}}{{{'.$i.'vs'.$j.'resultvs|}}}|&lt;td style="padding:0;background-color:#{{#ifeq:{{{'.$i.'vs'.$j.'result}}}|{{{'.$i.'vs'.$j.'resultvs}}}|f9f9f9|{{#ifeq:{{#expr:{{{'.$i.'vs'.$j.'result}}}&gt;{{{'.$i.'vs'.$j.'resultvs}}}}}|1|ccffcc|ffcccc}}}}" class="bracket-game"&gt;&lt;div&gt;\'\'\'{{{'.$i.'vs'.$j.'result}}}-{{{'.$i.'vs'.$j.'resultvs}}}\'\'\'&lt;/div&gt;{{#if:{{{'.$i.'vs'.$j.'details|}}}|&lt;div class="bracket-game-details" style="margin-left:{{#expr:5+{{{cell-width|100}}}}}px;"&gt;{{BracketMatchPlayers|{{#if:{{{player'.$i.'|}}}|{{{player'.$i.'}}}|TBD}}|{{{player'.$i.'race|}}}|{{#if:{{{player'.$j.'|}}}|{{{player'.$j.'}}}|TBD}}|{{{player'.$j.'race|}}}}} {{{'.$i.'vs'.$j.'details}}}&lt;/div&gt;}}&lt;/td&gt;|&lt;td&gt;&lt;/td&gt;}}|{{#if:{{{'.$j.'vs'.$i.'result|}}}{{{'.$j.'vs'.$i.'resultvs|}}}|&lt;td style="padding:0;background-color:#{{#ifeq:{{{'.$j.'vs'.$i.'result}}}|{{{'.$j.'vs'.$i.'resultvs}}}|f9f9f9|{{#ifeq:{{#expr:{{{'.$j.'vs'.$i.'result}}}&lt;{{{'.$j.'vs'.$i.'resultvs}}}}}|1|ccffcc|ffcccc}}}}" class="bracket-game"&gt;&lt;div&gt;\'\'\'{{{'.$j.'vs'.$i.'resultvs}}}-{{{'.$j.'vs'.$i.'result}}}\'\'\'&lt;/div&gt;{{#if:{{{'.$j.'vs'.$i.'details|}}}|&lt;div class="bracket-game-details" style="margin-left:{{#expr:5+{{{cell-width|100}}}}}px;"&gt;{{BracketMatchPlayers|{{#if:{{{player'.$j.'|}}}|{{{player'.$j.'}}}|TBD}}|{{{player'.$j.'race|}}}|{{#if:{{{player'.$i.'|}}}|{{{player'.$i.'}}}|TBD}}|{{{player'.$i.'race|}}}}} {{{'.$j.'vs'.$i.'details}}}&lt;/div&gt;}}&lt;/td&gt;|&lt;td&gt;&lt;/td&gt;}}}}&lt;!--<br>';
      }
   }
   echo '--&gt;&lt;/tr&gt;}}&lt;!--'."<br>";
}
echo '--&gt;&lt;tr&gt;&lt;th&gt;&lt;/th&gt;&lt;!--<br>';
for ($i = 1; $i <= $numberofteams; $i++) {
   echo '--&gt;{{#if:{{{player'.$i.'|}}}|&lt;th style="min-width:{{{cell-width|100}}}px;"&gt;{{player|{{{player'.$i.'}}}|race={{{player'.$i.'race|}}}|flag={{{player'.$i.'flag|}}}|link={{{player'.$i.'link|}}}}}&lt;/th&gt;}}&lt;!--<br>';
}
echo '--&gt;{{#ifeq:{{{displaystats}}}|true|&lt;th style="min-width:{{{cell-width|100}}}px;"&gt;&lt;/th&gt;}}&lt;!--<br>';
echo '--&gt;&lt;/tr&gt;&lt;!--<br>';
echo '--&gt;&lt;/table&gt;&lt;/includeonly&gt;';

?>
