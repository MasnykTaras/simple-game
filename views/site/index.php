<?php 

include_once(ROOT . '/views/layouts/header.php'); 

?>


<div class="custom__container">
	
	<div class="game__space" style="width: <?php echo $areaWidth; ?>px">
		<?php 		
		$i = 1; 
		while($i <= $sizeArea):
			$j = 1;
			while($j <= $sizeArea): ?>
				<div class="game__tile" data-y="<?php echo $i; ?>" data-x="<?php echo $j; ?>">
					<?php if($positionPlayer1['position']['y'] == $i &&  $positionPlayer1['position']['x'] == $j): ?>
						<div id="player__1" class="player">P1</div>
					<?php endif; ?>
					<?php if($positionPlayer2['position']['y'] == $i &&  $positionPlayer2['position']['x'] == $j): ?>
						<div id="player__2" class="player">P2</div>
					<?php endif; ?>
				</div>
			<?php 
			$j++;
			endwhile; 
		$i++;
		endwhile; ?>		
	</div>
	<div class="form-area">
		<form class="form" method="post">
			<div class="form-group">
			    <label>Go</label>
				<button type="submit" name='go' value="top" class="btn btn-default">Top</button>
				<button type="submit" name='go' value="down" class="btn btn-default">Down</button>
				<button type="submit" name='go' value="left" class="btn btn-default">Left</button>
				<button type="submit" name='go' value="right" class="btn btn-default">Right</button>
			</div>
			<div class="form-group">
				<label>Shoot</label>
				<br>
				<input class="shoot shoot-mark-x" type="text" name="shootMarkX">				
				<input class="shoot shoot-mark-y" type="text" name="shootMarkY">
				<br>
				
				<button disabled type="submit" name='shoot' value="shoot" class="btn btn-default btn-shoot">Shoot</button>
			</div>
			<div class="form-group">
				<label>Hit</label>
				<br>				
				<button disabled type="submit" name='hit' value="hit" class="btn btn-default btn-hit">Hit</button>
			</div>
			<button type="submit" name='destroy' valye="destroy" class="btn btn-default">Start new game</button>
		</form>
	</div>

</div>
<?php echo $advertisement; ?>
<?php include_once(ROOT . '/views/layouts/footer.php'); ?>