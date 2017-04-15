<?php
function showSchoolReport($select){
		$schoolreport = "";

		while($schoolresult = mysqli_fetch_array($select)){
			$schoolreport .= "<tr>";

			$schoolreport .= "<td>".$schoolresult[0]."</td>";
			$schoolreport .= "<td>".$schoolresult[1]."</td>";
			$schoolreport .= "<td>".$schoolresult[2]."</td>";
			$schoolreport .= "<td>".$schoolresult[3]."</td>";
			$schoolreport .= "<td>".$schoolresult[4]."</td>";

			$schoolreport .= "</tr>";
			}
		return $schoolreport;
	}

	?>