<?php
defined('SYSTEM_IN') or exit('Access Denied');
class addon3Addons  extends BjModule {
	public function do_index()
	{

			$this->__web(__FUNCTION__);
	}
		public function do_clear()
	{
	 mysqld_delete('bigwheel_award', array());
	  mysqld_delete('bigwheel_fans', array());
    mysqld_delete('bigwheel_reply', array());
    message('活动重置成功！', "refresh", 'success');
	}
		public function do_awardlist()
	{

			$this->__web(__FUNCTION__);
	}
}


