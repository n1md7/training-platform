<?php
	/**
	* class for progress level styling
	*/
	class Progress{
		
		public function __construct($level){
			$this->level = $level;
		}

		public function level(){
			$percentageOflevels = array(
			[
				'name'    => 'easy',
				'css_name'=> 'level1',
				'percent' => 20,
				'class'   => 'progress-bar-success',
				'styled_name'=>'<span class="level-title level-easy">easy</span>'
			], 
			[
				'name'    => 'medium',
				'css_name'=> 'level2',
				'percent' => 40,
				'class'   => 'progress-bar-primary',
				'styled_name'=>'<span class="level-title level-medium">medium</span>'
			], 
			[
				'name'    => 'hard',
				'css_name'=> 'level3',
				'percent' => 60,
				'class'   => 'progress-bar-info',
				'styled_name'=>'<span class="level-title level-hard">hard</span>'
			], 
			[
				'name'    => 'super-hard',
				'css_name'=> 'level4',
				'percent' => 80,
				'class'   => 'progress-bar-warning',
				'styled_name'=>'<span class="level-title level-super-hard">super hard</span>'
			],
			[
				'name'    => 'extremely-hard',
				'css_name'=> 'level5',
				'percent' => 90,
				'class'   => 'progress-bar-danger',
				'styled_name'=>'<span class="level-title level-extremely-hard">extremely hard</span>'
			],
			[
				'name'    => 'impossible',
				'css_name'=> 'level6',
				'percent' => 100,
				'class'   => 'progress-bar-danger',
				'styled_name'=>'<span class="level-title level-impossible">impossible</span>'
			] 
		);
		$levelComponents = $percentageOflevels[0];
		if( isset($this->level) ):
			foreach ($percentageOflevels as $key => $value):
				if( $value['name'] == $this->level ):
					$levelComponents = $value;
				endif;
			endforeach;
		endif;
		return $levelComponents;
		}
	}