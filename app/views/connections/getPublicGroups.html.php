<?php session_start(); ?>
<div id="groupsWrapper" class="wrapper">
	<legend> <span id="groupLegend">Groups</span> 
		<form class="form-search pull-right">
  			<div class="input-append">
    				<input type="text" id="txtSearchGroup" class="span2 search-query" data-provide="typeahead" placeholder="Search Public Groups" >
    				<button class="btn" id="btnSearchGroup">Search</button>
  			</div>
  			
		</form>
	</legend>
	<div id="groupsList">
	<?php
		foreach($groups as $group)
		{
			$exists = null;
	?>
			<div class="listDiv">
	<?php
			echo "<a id='".$group['_id']."' href='' class='publicGroup' data-name='".$group['group_name']."'>".$group['group_name']."</a>";
			foreach($group['users'] as $groupUsers){			
				if($groupUsers['id'] == $_SESSION['loggedInUserId']){
					$exists = '1';					
					break;
				}				
			}
			if($exists != '1'){
				echo "<button class='btn btn-success pull-right btnJoinPublicGroup' id='".$group['_id']."'> Join </button>"; 
			}
			else{
				echo "<button class='btn btn-success pull-right btnUnjoinPublicGroup' id='".$group['_id']."'> Unjoin </button>"; 
				
			}
			?>			
			</div> <!-- end listDiv div -->
	<?php
		}
	?>
	</div> <!-- end groupsList div-->
</div> <!-- end groupsWrapper div -->
