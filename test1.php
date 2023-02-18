<?php
    function villagers($n)
    {
        // first fibonacci
		$num1 = 0;
		$num2 = 1;

		$total = array();  
		for ($i=0; $i<$n-1; $i++) {
			$output = $num2 + $num1;

			$num1 = $num2;
			$num2 = $output; 
			$total[$i] = $num1;
			$total[$i+1] = $num2;
		}

        return array_sum($total);;
	}
?>

<p>
    <form method="post" action="test1.php">
        Person A: Age of death = <input type="text" name="age_a" value="<?php echo @$_POST['age_a'];?>">, Year of Death = <input type="text" name="year_a" value="<?php echo @$_POST['year_a'];?>"> <br><br>
        Person B: Age of death = <input type="text" name="age_b" value="<?php echo @$_POST['age_b'];?>">, Year of Death = <input type="text" name="year_b" value="<?php echo @$_POST['year_b'];?>">
        <br><br><button type="submit" value='click' name="submit">Submit</button>
    </form>
</p>
<p>
    <b>Answer:</b>
    <?php
        if((@$_POST['year_a'] < 0 || @$_POST['age_a'] < 0) || (@$_POST['year_b'] < 0 || @$_POST['age_b'] < 0))
        {
            echo 'negative age, person who born before the witch took control';
        }
        else
        {
            $person_a = @$_POST['year_a'] - @$_POST['age_a'];
            $person_b = @$_POST['year_b'] - @$_POST['age_b'];	
            ?>
                <br>

                Person A born on Year = <?php echo @$_POST['year_a'];?> – <?php echo @$_POST['age_a'];?> = <?php echo $person_a;?>, number of people killed on year <?php echo $person_a;?> is <?php echo villagers($person_a);?>. <br>
                Person B born on Year = <?php echo @$_POST['year_b'];?> – <?php echo @$_POST['age_b'];?> = <?php echo $person_b;?>, number of people killed on year <?php echo $person_b;?> is <?php echo villagers($person_b);?>.
                <br>
                So the average is (  <?php echo villagers($person_a);?> +  <?php echo  villagers($person_b);?> )/ 2 = <?php echo (villagers($person_a) + villagers($person_b)) / 2;?>
            <?php 
        }
    ?>
</p>