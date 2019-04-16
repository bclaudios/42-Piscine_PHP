#!/usr/bin/php
<?php
	function NewStudent()
	{
		return array("grade" => 0, "grade_count" => 0, "average" => 0, "m_grade" => 0, "m_offset" => 0);
	}

	function AddGrade(&$student, &$grades)
	{
		if ($grades[2] == "moulinette")
			$student["m_grade"] += $grades[1];
		else
		{
			$student["grade"] += $grades[1];
			$student["grade_count"] += 1;
			$student["average"] = $student["grade"] / $student["grade_count"]; 
		}
		$student["m_offset"] = $student["average"] - $student["m_grade"];
	}

	function DisplayGlobalAverage($data)
	{
		foreach ($data as $student)
		{
			$average += $student["grade"];
			$grade_count += $student["grade_count"];
		}
		$average /= $grade_count;
		echo $average."\n";
	}

	function CreateData()
	{
		$stdin = fopen("php://stdin", "r");
		fgetcsv($stdin, 200, ";");
		$data = array();
		while (($raw_data = fgetcsv($stdin, 200, ";")) !== FALSE)
		{
			if (!array_key_exists($raw_data[0], $data))
				$data[$raw_data[0]] = NewStudent();
			if ($raw_data[1] != "")
				AddGrade($data[$raw_data[0]], $raw_data);
		}
		ksort($data);
		return ($data);
	}

	function DisplayAverages($data)
	{
		foreach ($data as $student => $grade)
			echo $student.":".$grade["average"]."\n";
	}

	function DisplayOffsets($data)
	{
		foreach ($data as $student => $grade)
			echo $student.":".$grade["m_offset"]."\n";
	}

	if ($argc == 1)
		exit;
	$data = CreateData();
	if ($argv[1] == "moyenne")
		DisplayGlobalAverage($data);
	elseif ($argv[1] == "moyenne_user")
		DisplayAverages($data);
	elseif ($argv[1] == "ecart_moulinette")
		DisplayOffsets($data);
?>