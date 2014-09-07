<p>Your password has been reset.</p>

<!--<p><a href="--><?php //echo $ms; ?><!--">--><?php //echo $ms; ?><!--</a></p>-->

<?php  echo $this->Html->link(__('Please CLICK HERE to log in'),Router::url('/Users/reset',true).'/'.$token);?>