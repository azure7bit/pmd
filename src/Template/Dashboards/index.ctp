<div class="applicants index large-9 medium-8 columns content">
    <h3><?= __('Dashboards') ?></h3>    
    <!-- <ul>
    	<?php foreach ($applicants as $applicant): ?>
    					
    		<li>
    			<?= $applicant->gender ?>
    		</li>
    		<?php if (!empty($applicant->applicantjoblists)): ?>
    		<li>
    			Your job lists :
    			<ul>
    				<?php foreach ($applicant->applicantjoblists as $myjob): ?>
    					<li><?= $myjob->id ?></li>
    				<?php endforeach ?>
    			</ul>
    		</li>
    	<?php endif ?>
    	<?php endforeach ?>
    </ul> -->
    Total Applicant : <?= $count_applicant ?> <br>
    Total Job : <?= $count_job ?> <br>

    
</div>