<?php
namespace AccessManager\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property int $group_id
 * @property int $role_id
 * @property string $password
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $active
 *
 * @property \AccessManager\Model\Entity\Group $group
 * @property \AccessManager\Model\Entity\Role $role
 */
class User extends Entity
{

	/**
	 * Fields that can be mass assigned using newEntity() or patchEntity().
	 *
	 * Note that when '*' is set to true, this allows all unspecified fields to
	 * be mass assigned. For security purposes, it is advised to set '*' to false
	 * (or remove it), and explicitly make individual fields accessible as needed.
	 *
	 * @var array
	 */
	protected $_accessible = [
		'*' => true,
		'id' => false,
	];

	/**
	 * Fields that are excluded from JSON versions of the entity.
	 *
	 * @var array
	 */
	protected $_hidden = [
		'password'
	];

	protected function _setPassword($password) {
		return (new DefaultPasswordHasher)->hash($password);
	}

	public function parentNode() {
		if (!$this->id) {
			return null;
		}
		if (isset($this->role_id)) {
			$roleId = $this->role_id;
		} else {
			$Users = TableRegistry::get('AccessManager.Users');
			$user = $Users->find('all', ['fields' => ['role_id']])->where(['id' => $this->id])->first();
			$roleId = $user->role_id;
		}
		if (!$roleId) {
			return null;
		}
		return ['AccessManager.Roles' => ['id' => $roleId]];
	}

}
