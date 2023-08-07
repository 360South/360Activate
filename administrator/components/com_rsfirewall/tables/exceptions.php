<?php
/**
 * @package    RSFirewall!
 * @copyright  (c) 2009 - 2020 RSJoomla!
 * @link       https://www.rsjoomla.com
 * @license    GNU General Public License http://www.gnu.org/licenses/gpl-3.0.en.html
 */

defined('_JEXEC') or die('Restricted access');

class RsfirewallTableExceptions extends JTable
{
	/**
	 * Primary Key
	 *
	 * @public int
	 */
	public $id;
	public $type;
	public $regex;
	public $match;
	public $php;
	public $sql;
	public $js;
	public $uploads;
	public $reason;
	public $date;
	public $published = 1;
		
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	public function __construct(& $db)
	{
		parent::__construct('#__rsfirewall_exceptions', 'id', $db);
	}

	public function check()
	{
		try
		{
			if (!$this->id)
			{
				$this->date = JFactory::getDate()->toSql();
			}

			$db 	= $this->getDbo();
			$query 	= $db->getQuery(true);

			// See if there's already an entry in the db with the same details.
			$query->select($db->qn('id'))
				->from($this->getTableName())
				->where($db->qn('type').' = '.$db->q($this->type))
				->where($db->qn('match').' = '.$db->q($this->match))
				->where($db->qn('regex').' = '.$db->q($this->regex));
			if ($this->id)
			{
				$query->where($db->qn('id').' != '.$db->q($this->id));
			}

			if ($db->setQuery($query)->loadResult())
			{
				throw new Exception(JText::sprintf('COM_RSFIREWALL_EXCEPTION_ALREADY_IN_DB', JText::_('COM_RSFIREWALL_EXCEPTION_TYPE_' . $this->type), $this->match, $this->regex ? JText::_('JYES') : JText::_('JNO')));
			}

			return true;
		}
		catch (Exception $e)
		{
			$this->setError($e->getMessage());
			return false;
		}
	}
}