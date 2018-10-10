<?php
/*
Template Name: Jeroens Template
*/
?>
<?
function display_instagramurl($value)
{
echo "<td><a href=https://instagram.com/".$value." target=_blank><img src='/wp-content/uploads/2018/09/if_Instagram_1298747.svg' height='40' width='40' alt='insta'>".$value."</a></td>";
}

function display_name($value)
{
echo "<td>".$value."</td>";
}

function display_nationality($value)
{
echo "<td>".$value."</td>";
}

function display_team($value)
{
global $wpdb;
$teamquery = $wpdb->get_row("SELECT * FROM teams WHERE id=$value");
//print_r($teamquery);
$team = $teamquery->name;
//print_r($team);

echo "<td>".$team."</td>";
}
?>
<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">

<?php
global $wpdb;
$competitions = $wpdb->get_results("SELECT * FROM competitions;");



 


echo "<span border='1'>";
foreach($competitions as $comp)
{
	$compid = $comp->id;
	$compname = $comp->name;
	$compcountry = $comp->country;

	echo "<p>";
	echo $compname;
	echo "</p>";
}
echo "</span>";
?>

<?php
global $wpdb;
$teams = $wpdb->get_results("SELECT * FROM teams;");

echo "<span border='1'>";
foreach($teams as $team)
	{
		$teamid = $team->id;
		$teamname = $team->name;
		$teamcity = $team->city;

		echo "<h1>".$teamname."</h1>";
		echo "<table style='width:96%;margin-left: 5px;' id=$teamid>
			 <thead>
			 <tr>
			 <th>Name</th>
			 <th>Instagram handle</th>
			 <th>Nationality</th>
			 </tr></thead>
			 <tbody>";

		 $players = $wpdb->get_results("SELECT * FROM players WHERE Club=$teamid;");

			  foreach($players as $player)
			  {
				$insta = $player->Instagram;
				$name = $player->Name;
				$nation = $player->Nat;
				$clubid = $player->Club;

				echo "<tr>";
				display_name($name);
				display_instagramurl($insta);
				display_nationality($nation);
				echo "</tr>";
			}

			echo"</tbody>
			 </table>";
	}

?>

</main><!-- .site-main -->


</div><!-- .content-area -->

<?php get_footer(); ?>
