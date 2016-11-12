<!DOCTYPE html>
<html>


<?php
	echo "Hello World!"; // Echo
	echo "<br>";

	function breaktype()
	{
		echo "<br>";
	}

	// This is a comment

	/* A multiple line
	comment. This sholuld come in handy
	*/

	$mycounter = 1;
	$myString = "Hello";
	$myArray = array("one", "Two", "Three");

	echo $myString;
	echo "<br>";

	$username = "Fred Smith";
	echo $username;
	echo "<br>";
	$current_user = $username;
	echo $current_user;
	echo "<br>";

	$count = 17;
	$count = 17.5;

	$team = array("Bill", "Mary", "Mike", "Chris", "Anne");
	echo $team[3];
	echo "<br>";

	$oxo = array(array("x", "o", "x"),
				 array("x", " ", "o"),
				 array("o", " ", "x"));

	echo $oxo[1][2];
	echo "<br>";

	echo 6 + 2;
	echo "<br>";
	$count = 1;
	$count = $count + 1;
	$count += 1;
	if ($count <= 3)
		echo "Lunch!";

	echo "<br>";
	echo $count;
	echo "<br>";

	echo "You have " . $count . " bananas";
	echo "<br>";

	$lunch = "Lunch";
	$now = " Now!";
	$lunch .= $now;

	$info = 'Preface variables with a $ like this: $variable';
	$notinfo = "This week $count people have viewed your profile";

	$text = "Measuring Programming progress by lines of code is like
	measuring aircraft building process by weight";
	echo $text;
	echo "<br>";

	echo <<<_END
	Debugging is twice as hard as writing the code in the first place. Therefore, if
	you write the code as cleverly as possible, you are, by definition, not smart enough to debug it.
_END;
	echo "<br>";

	$number = 123 * 2;
	echo substr($number, 1, 1);
	echo "<br>";

	function printout($string)
	{
		echo $string;
	}

	printout("Sathya");
	echo "<br>";
	// Variable Scope: Variables outside of the function can't be referred in the function itself (unlike Java)

	// CHAPTER FOUR! Expressions and Control Flow in PHP

	echo "a: [" . (20 > 9) . "]<br>";
	echo "b: [" . (5 == 6) . "]<br>";
	echo "c: [" . (1 == 0) . "]<br>";
	echo "d: [" . (7 == 7) . "]<br>";

	echo "a: [" . TRUE . "]<br>";
	echo "b: [" . FALSE . "]<br>";

	// Literals
	echo "Hello<br>";
	// Variables
	echo $count . "<br>";

	// More on Operators
	// Operator Types: Arithmetic, Array, Assignment, Bitwise, Comparison, Execution, In(De)crement, Logical, String
	// Unary Operators - Takes one operand --> Binary, Ternary (?)

	//Operator Precedence - PEMDAS on a higher scale
	/*
		Parentheses
		Increment/Decrement
		Logical - !
		Multiplication/Division
		Add/Subtract/Concatenate
		>> << (Bitwise)
		< <= > >= <> (Comparison)
		== != === !== (Comparison)
		& (Bitwise and References)
		^ (Bitwise)
		| (Bitwise)
		&& (Logical)
		|| (Logical)
		? : (Ternary)
		= += -= *= /= etc. Assignment
		and
		xor
		or
	*/

	/* Associativity
		What an operator actually take into account! (In other words
		sometimes the operations don't go from left to right it can go right to left)

		Arithmetic, Logical, and Bitwise (<< >> & ^ |) have associativity: left!
		Meaning it goes in the left to right order (the operator "operates" on what is left of the operator)

		Logical and Bitwise NOTS (! and ~) have associativity: right!
		Casting has associativity: right!
		Error Reporting: Right!
		Most importantly .... Assignment operators have associativity: right!
	*/

	$level = $score = $time = 0;

	//Relational Operators

	// Equality
	$month = "March";
	if ($month == "March")
		echo "It's time to Spring!<br>";

	$a = 1000;
	$b = 1000;

	if ($a == $b)
		echo "Awesome!<br>";

	if ($a === $b)
		echo "Super Awesome!<br>";

	// Comparison
	$a = 2;
	$b = 3;

	if ($a < $b)
		echo "Life sucks!<br>";

	if ($a <= $b)
		echo "Life doesn't suck as much!<br>";

	// Logical - AND, OR, XOR, NOT, &&, ||,
	$a = 1; $b = 0;
	echo ($a AND $b) . "<br>";
	echo ($a or $b) . "<br>";
	echo ($a xor $b) . "<br>";
	echo !$b . "<br>";

	echo "Whoa this is so cool! Kinda<br>";

	/* OR OPERATOR NOTE: If the first expression evaluates to true
	(before the OR and || operands) it will keep going without evaluating the second expression.
	This will be a problem if you have a function that needs to be evaluated and is in the second expression.
	The fix - run the program before the conditional and assign variables earlier and put the variable in the conditional.
	*/
	// Example
	// Faulty Code
	function getNext()
	{
		echo "Awesome!";
		return 5;
	}
	$finished = 1;

	if ($finished == 1 OR getNext() == 5)
		echo "That's what Sathya is!<br>";

	// Run it and you'll see that getNext() won't run!
	// Fixed Code

	$gn = getNext();

	if ($finished == 1 OR getNext() == 5)
		echo "I said that's what Sathya is!<br>";

	// Now getNext() has run!

	// Conditionals! If statements are easy - going straight to Switches!

	$flavor = "Banana";

	switch ($flavor)
	{
		case "Apple":
		echo "Really?! Apple-flavored ice cream?!<br>";
		break;

		case "Banana":
		echo "Nice Choice!<br>";
		break;

		case "Pomegranate";
		echo "Now that's Royal!<br>";
		break;

		default;
		echo "Ummm ... That's a weird flavor!";
		break;
	}

	switch ($flavor):

		case "Apple":
		echo "Really?! Apple-flavored ice cream?!<br>";
		break;

		case "Banana":
		echo "Nice Choice!<br>";
		break;

		case "Pomegranate";
		echo "Now that's Royal!<br>";
		break;

		default;
		echo "Ummm ... That's a weird flavor!<br>";
		break;

	endswitch;

	$fuel = .75;
	echo $fuel <= 1 ? "Fill tank now!<br>" : "There's enough fuel!<br>";

	$enough = $fuel <= 1 ? "FALSE" : "TRUE";
	echo $enough . "<br>";

	// Looping

	$fuel = 10;
	while ($fuel > 1)
	{
		echo "There's enough fuel. We got " . $fuel . " gallons left!<br>";
		--$fuel;
	}

	$count = 1;
	while ($count <= 100)
	{
		echo $count . "<br>";
		++$count;
	}

	$count = 0;
	do
		echo "This is awesome<br>";
	while (++$count <= 12);

	for ($count = 0; $count < 5; ++$count)
	{
		echo "My name is Naruto! Believe IT!<br>";
	}

	// Chapter 5 - Functions and Objects
	// Functions!

	function MynamePrint ($name)
	{
		echo $name . "<br>";
		return 5;
	}

	echo MynamePrint ("Sathya") . "<br>";
	echo MynamePrint ("Austin") . "<br>";

	function fix_names($n1, $n2, $n3)
	{
		$n1 = ucfirst(strtolower($n1));
		$n2 = ucfirst(strtolower($n2));
		$n3 = ucfirst(strtolower($n3));

		return array($n1, $n2, $n3);
	}

	$names = fix_names("WIlliam", "HENry", "gATes");
	for ($i = 0; $i < 3; ++$i)
	{
		echo $names[$i] . "<br>";
	}

	// Passing by References
	function fix_names_by_refs (&$n1, &$n2, &$n3)
	{
		$n1 = ucfirst(strtolower($n1));
		$n2 = ucfirst(strtolower($n2));
		$n3 = ucfirst(strtolower($n3));
	}

	$a1 = "KEShav";
	$a2 = "NarayANAn";
	$a3 = "GoVIND";

	echo $a1 . " " . $a2 . " " . $a3 . "<br>";
	fix_names_by_refs($a1, $a2, $a3);
	echo $a1 . " " . $a2 . " " . $a3 . "<br>";

	// include_once and require_once - to add PHP files into your code
	// function_exists will see if a function can be used when dealing with different versions of PHP.
	// phpversion will check the version of PHP.

	$version = phpversion();
	echo $version . "<br>";

	class User
	{
		public $name, $password;
		function save_user()
		{
			echo "Save User code goes here <br>";
		}

	}

	$object  = new User;
	print_r($object);
	echo "<br>";

	/* Accessing an object's property: $obejct->property (DO NOT USE DOLLAR SIGN of the property
	despite there being a dollar sign in the class itself

	 Accessing an object's method: $object->method */

	$temp = new User();
	$temp->name = "Joe";
	$temp->password = "mypass";
	print_r($temp);
	echo "<br>";

	$temp->save_user();

	// Objects passed by reference! - Not copied
	$object1 = new User();
	$object1 -> name = "Alice";
	$object2 = $object1;
	$object2 -> name = "Amy";

	echo "Object 1 Name: " . $object1 -> name . "<br>";
	echo "Object 2 Name: " . $object2 -> name . "<br>";

	// Cloning Objects
	$object3 = new User();
	$object3 -> name = "Alice";
	$object4 = clone $object3;
	$object4 -> name = "Amy";

	echo "Object 3 Name: " . $object4 -> name . "<br>";
	echo "Object 4 Name: " . $object3 -> name . "<br>";

	// Constructors
	class RealUser
	{
		public $name, $age;
		function RealUser($pName, $pAge)
		{
			$name = $pName;
			$age = $pAge;
		}
	}
	$object5 = new RealUser("Sathya", 5);
	
	// PHP5 Constructors
	class RealUser2
	{
		public $age, $password;
		// PHP5 Destructors
		public $name = 2 * 3;

		// Writing Methods
		function get_password()
		{
			return $this -> password;
		}

		// Static Methods are methods that are not specific to any instance of a class
		// This means that it can't take any parameters and can't modify any properties
		// Calling a static method - User::pwd_string
		static function pwd_string()
		{
			echo "Please enter your password<br>";
		}
	}

	$object5 = new RealUser2();

	$object5->password = "secret";
	echo $object5->get_password() . "<br>";
	RealUser2::pwd_string();

	/* When you declare a property explicity within a class
	the value has to be a constant and not the result of a function or expression(?)
	*/
	echo $object5 -> name . "<br>";

	// Defining Constants within a class
	class Translate
	{
		const ENGLISH = 0;
		const SPANISH = 1;
		const FRENCH = 2;
		const GERMAN = 3;
		const RUSSIAN = 4;

		static function lookup()
		{
			echo self::SPANISH . "<br>";
		}
	}

	Translate::lookup();

	// Property and Method Scope - public, protected, private
	// keep protected or private!

	class Subscriber extends RealUser2
	{
		public $phone, $email;

		function display()
		{
			echo "Name: " . $this->name . "<br>";
			echo "Pass: " . $this->password . "<br>";
			echo "Phone: " . $this->phone . "<br>";
			echo "Email: " . $this->email . "<br>";
		}
	}

	$object = new Subscriber();
	$object->name = "Fred";
	$object->password = "soft";
	$object->phone = "6519864532";
	$object->email = "softyfred@gmail.com";
	$object->display();

	// Use Parent operator followed by two semicolons to use the parent's methods!
	// Use Self operator followed by two semicolons to use the current class's methods!

	// SubClass Constructors
	class Admin extends RealUser2
	{
		private $adminkey = "banana";

		function __construct($key)
		{
			echo "What's going on!<br>";
			$this->adminkey = $key;
		}

		function returnkey()
		{
			return $this->adminkey;
		}

		function printkey()
		{
			echo $adminkey;
		}
	}

	$Admin1 = new Admin("Taco");
	echo $Admin1 -> returnkey();

	// Array Time! Chapter 6!
	$paper[] = "Copier";
	$paper[] = "Inkjet";
	$paper[] = "Laser";
	$paper[] = "Photo";

	print_r($paper);
	echo "<br>";
	for ($j = 0; $j < 4; ++$j)
		echo "$j: $paper[$j]<br>";

	$paper['copier'] = "Copier and Multipurpose";
	$paper['inkjet'] = "Inkjet Printer";
	$paper['laser'] = "Laser Printer";
	$paper['photo'] = "Photographer Paper";

	echo $paper['laser'] . "<br>";
	$p1 = array("Copier", "Inkjet", "Laser", "Photo");
	echo "p1 element: " . $p1[2] . "<br>";
	$p2 = array('copier' => "Copier and Multipurpose",
				'inkjet' => "Inkjet Printer",
				'laser' => "Laser Printer",
				'photo' => "Photographic Paper");
	echo "p2 element: " . $p2['inkjet'] . "<br>";

	$j = 0;

	foreach($p1 as $description)
	{
		echo "$j: $description<br>";
		++$j;
	}

	foreach ($p2 as $item => $description)
	{
		echo "$item: $description<br>";
	}

	// Use list and each functions in conjunction with a while loop

	// Multidimensional Arrays

	$products = array(
	 // $section => $item
		'paper' => array(
			// $key => $description
			'copier' => "Copier & Multipurpose",
			'inkjet' => "Inkjet Printer",
			'laser' => "Laser Printer",
			'photo' => "Photographic Paper"),

		'pens' => array(
			'ball' => "Ball Point",
			'hilite' => "Highlighter",
			'marker' => "Markers"),

		'misc' => array(
			'tape' => "Sticky Tape",
			'glue' => "Adhesives",
			'clips' => "Paperclips")
	);
	/* $section and $key refers to the name of the 'index' formally known as an offset/association
	$item and $description refers to the 'things' in the index/offset: some being arrays other actual values!
	*/
	foreach ($products as $section => $item)
		foreach ($item as $key => $description)
			echo "$section:\t$key\t$description<br>";

	// Using Array Functions
	// Full list at http://php.net/manual/en/ref.array.php

	// is_array takes a variable/array as a parameter and returns true if it is an array, false if otherwise.
	echo (is_array($p1)) ? "Is an array<br>" : "Is not an array<br>";

	// count takes an array as a parameter and returns the number of elements in the array.
	echo count($p1)."<br>";
	// the count function works for multidimensional arrays but includes an optional second parameter - 0 or 1
	echo count($products) . "<br>";
	echo count($products, 0) . "<br>"; // Counts only the first level(dimension)
	echo count ($products, 1) . "<br>"; // Counts all the elements

	// the sort function is self-explanatory (but also returns TRUE on success or FALSE on error)
	// The first parameter is the array, the second parameter is the way to sort the array.
	// Second Parameter Options - SORT_NUMERIC - SORT_STRING
	// there is also rsort that reverses the sort

	// Shuffle function - takes an array as a  parameter and shuffles the array
	// Returns TRUE on success and FALSE on error

	// Explode function - splits a string into an array
	// First parameter - character where the string should be split up - DELIMITER!
	// Second parameter - the string that has to be split.

	$temp = explode(' ', "This is a sentence with eleven words which means eleven elements<br>");
	print_r($temp);
	echo "<br>";
	$temp2 = explode (" ","The greatness");
	echo count($temp2) . "<br>";

	// Extract and Compact
	// Extract takes array values and assigns them to variables
	// Compact takea variable and assigns them to indices in an array

	// reset and end functions
	// reset - Moves the pointer to the beginning of an array in a loop and returns the first value of that array.
	// end - Moves the pointer to the end of an array and returns the last value of that array.

	// Practical PHP!!!! - Chapter 7

	// Using printf

	printf("There are %d items in your basket" , 3); // Decimal
	breaktype();
	printf("There are %b items in your basket" , 3); // Binary
	breaktype();
	printf("Battery Level: 50%%"); // Percent Symbol
	breaktype();
	printf("There are %e items in your basket" , 12453000); // Sci Notation
	breaktype();
	printf("There is gonna be some ASCII here: %d" , 123); // ASCII
	breaktype();
	printf("There are %f items in your basket" , 123); // Floating-point
	breaktype();

	/*  %o - Octal
		%s - String
		%u - Unsigned decimal
		%x - Lowercase hexadecimal
		%X - Uppercase hexadecimal
	*/

	// All the args have to match - specifiers = arguments!

	printf("My name is %s. I'm %d years old, which is %X in hexadecimal", 'Simon', 33, 33);
	breaktype();

	printf("<span style = 'color: #%X%X%X'>Hello</span>", 65, 127, 245);
	breaktype();

	printf("The result is %.2f", 67 / 34);
	breaktype();

	/*
		-Rightmost Character - conversion specifiers
		-Before conversion specifier - period + number --> precision of result
		-Before Precision - Padding value
		-If there's a 0 before padding value - then the padded space will be replaced with zeros
	*/

	$h = "Rasmus";
	// String Padding
	printf("[%s]", $h);
	breaktype();
	printf("[%12s]", $h);
	breaktype();
	printf("[%-12s]", $h);
	breaktype();
	printf("[%012s]", $h);
	breaktype();
	printf("[%'#12s]", $h);
	breaktype();
	printf("[%12.3s]", $h);
	breaktype();
	printf("[%-12.4s]", $h);
	breaktype();
	printf("[%-'@12.5s]", $h);
	breaktype();

	$hexstring = sprintf("%X%X%X", 65, 127, 245);

	// Date and Time Functions
	echo time();
	breaktype();

	echo mktime(0, 0, 0, 1, 1, 2000);
	// First second of the year 2000.

	/*
	Parameters from left to right
	1 - The number of the hour (0 - 23)
	2 - The number of the minute (0 - 59)
	3 - The number of seconds (0 - 59)
	4 - The number of the month (1 - 12)
	5 - The number of the day (1 - 31)
	6 - The Year (1970 - 2038, or 1901 - 2038 with PHP 5.1.0+ on 32-bit signed systems)
	*/


	// Date Functions

	// date() - uses certain specifiers
	// http://php.net/manual/en/function.date.php

	echo DATE_ATOM;
	breaktype();
	echo DATE_COOKIE;
	breaktype();
	echo DATE_RSS;
	breaktype();
	echo DATE_W3C;
	breaktype();

	// Use checkdate function to check if a certain date is valid (Boolean is returned)

	// File Handling

	// Checking if a file exists and creating a file

	$fh = fopen("textfile.txt", 'w') or die("Failed to write file");

	$text = <<<_END
Line 1
Line 2
Line 3
_END;

	if (file_exists("textfile.txt"))
	{
		echo "File exists";
		breaktype();
	}
	// Else {
	fwrite($fh, $text) or die("Unable to write file");
	fclose($fh);
	echo "File 'testfile.txt' written successfully"; breaktype();

	// Reading from files - Fgets & fread
	$fh = fopen("textfile.txt", 'r') or die("File does not exist or you lack permission");
	$line = fgets($fh);
	echo $line;
	breaktype();

	$line3 = fread($fh , 9);
	echo $line3;
	breaktype();

	// Copying files
	include_once "copyfile.php";
	include_once "movefile.php";

// Querying MySQL from PHP!

  // login.php
	$db_hostname = 'localhost';
	$db_username = 'sathya';
	$db_password = 'Rhamses2899!';
	$db_database = 'publications';

	// Connecting to MySQL
	$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
	if ($connection->connect_error) die ($connection->connect_error);

	// Deleting something if they pressed DELETE RECORD
	if (isset($_POST['delete']) && isset($_POST['isbn']))
	{
		$isbn = get_post($connection, 'isbn');
		$query = "DELETE FROM classics WHERE isbn = '$isbn'";
		$result = $connection->query($query);

		if (!$result) echo "DELETE failed: $query<br>" . $connection->error . "<br><br>";
	}

	// Inserting values if they entered something
	if (
			(isset($_POST['author'])) &&
			(isset($_POST['title'])) &&
			(isset($_POST['category'])) &&
			(isset($_POST['year'])) &&
			(isset($_POST['isbn']))
		)
	{
		$author = get_post($connection, 'author');
		$title = get_post($connection, 'title');
		$category = get_post($connection, 'category');
		$year = get_post($connection, 'year');
		$isbn = get_post($connection, 'isbn');
		$query = "INSERT INTO classics VALUES" . "('$author', '$title', '$category','$year','$isbn')";
		$result = $connection->query($query);

		if (!$result) echo "INSERT failed: $query<br>" . $connection->error . "<br><br>";
	}

	// The Form to add data to the publications database
	echo <<<_END
	<form action="tester.php" method="post"><pre>
	Author <input type = "text" name = "author">
	Title <input type = "text" name = "title">
	Category <input type = "text" name = "category">
	Year <input type = "text" name = "year">
	ISBN <input type = "text" name = "isbn">
	<input type = "submit" value = "ADD RECORD">
	</pre></form>
_END;

	// Print out the current table in the database
	$query = "SELECT * FROM classics";
	$result = $connection->query($query);

	if(!$result) die ("Database access failed: " . $connection->error);

	$rows = $result->num_rows;

	for($j = 0; $j < $rows; ++$j)
	{
		$result->data_seek($j);
		$row = $result->fetch_array(MYSQLI_NUM);

		echo <<<_END
		<pre>
		Author $row[0];
		Title $row[1];
		Category $row[2];
		Year $row[3];
		ISBN $row[4];
		</pre>

		<form action="tester.php" method = "post">
		<input type = "hidden" name = "delete" value = "yes">
		<input type = "hidden" name = "isbn" value = "$row[4]">
		<input type = "submit" value = "DELETE RECORD">
		</form>
_END;


	}
	$result->close();
	$connection->close();

	// get_post function!
	function get_post($connection, $var)
	{
		return $connection->real_escape_string($_POST[$var]);
	}
?>




</html>
