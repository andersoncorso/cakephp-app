<?php
namespace AccessManager\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \AccessManager\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsTo $Groups
 * @property \AccessManager\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \AccessManager\Model\Entity\User get($primaryKey, $options = [])
 * @method \AccessManager\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \AccessManager\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \AccessManager\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \AccessManager\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \AccessManager\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \AccessManager\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize(array $config)
	{
		parent::initialize($config);

		$this->setTable('users');
		$this->setDisplayField('id');
		$this->setPrimaryKey('id');

		$this->addBehavior('Acl.Acl', ['type' => 'requester']);
		$this->addBehavior('Timestamp');

		$this->belongsTo('Groups', [
			'foreignKey' => 'group_id',
			'joinType' => 'INNER',
			'className' => 'AccessManager.Groups'
		]);
		$this->belongsTo('Roles', [
			'foreignKey' => 'role_id',
			'joinType' => 'INNER',
			'className' => 'AccessManager.Roles'
		]);
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault(Validator $validator)
	{
		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->scalar('password')
			->requirePresence('password', 'create')
			->notEmpty('password', 'Insira uma senha válida.');

		$validator
				->email('email')
				->requirePresence('email', 'create')
				->notEmpty('email', 'Insira um e-mail válido.')
				->add('email', 'unique', [
						'rule'=>'validateUnique',
						'provider'=>'table',
						'message'=>'Este e-mail já está em uso por outro usuário.'
					]
				);

		$validator
			->boolean('active')
			->requirePresence('active', 'create')
			->notEmpty('active');

		return $validator;
	}

	/**
	 * Returns a rules checker object that will be used for validating
	 * application integrity.
	 *
	 * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
	 * @return \Cake\ORM\RulesChecker
	 */
	public function buildRules(RulesChecker $rules)
	{
		$rules->add($rules->isUnique(['email']));
		$rules->add($rules->existsIn(['group_id'], 'Groups'));
		$rules->add($rules->existsIn(['role_id'], 'Roles'));

		return $rules;
	}

	/**
	 * Adiciona os dados associados de profile na sessão de usuário ao logar
	 *
	 * @link https://stackoverflow.com/questions/32661318/how-to-retrieve-associations-together-with-authenticated-user-data
	 */
	public function findAuth(\Cake\ORM\Query $query, array $options){
		return $query->contain(['Roles']);
	}

}
