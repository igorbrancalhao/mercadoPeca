<?
#################################################################
## PHP Pro Bid v6.00															##
##-------------------------------------------------------------##
## Copyright �2007 PHP Pro Software LTD. All rights reserved.	##
##-------------------------------------------------------------##
#################################################################

class session
{

	var $vars = array (NULL);

	function set($variable, $value)
	{
		$_SESSION[SESSION_PREFIX.$variable] = $value;
		$this->vars[$variable] = $value;
	}

	function unregister($variable)
	{
		if (isset($_SESSION[SESSION_PREFIX.$variable]))
		{
			unset($_SESSION[SESSION_PREFIX.$variable]);
			$this->vars[$variable] = NULL;
		}
	}

	function destroy()
	{
		session_destroy();
	}

	function value($variable)
	{
		return $_SESSION[SESSION_PREFIX.$variable];
	}

	function is_set($variable)
	{
		return (!empty($_SESSION[SESSION_PREFIX.$variable])) ? TRUE : FALSE;
	}

}
?>