<?php
	if(isset($status))
	{
		if($status=='Inactive')
		{
			echo"<select id='statusOptions'><option>Active</option><option selected='selected'>Inactive</option></select></td></tr>";
		}
		else
		{
			echo"<select id='statusOptions'><option>Active</option><option>Inactive</option></select></td></tr>";									
		}
	}
	else if($vendorStatus=='Inactive')
	{
		echo"<select id='statusOptions'><option>Active</option><option selected='selected'>Inactive</option></select></td></tr>";
	}
	else
	{
		echo"<select id='statusOptions'><option>Active</option><option>Inactive</option></select>		</td></tr>";
	}
?>
