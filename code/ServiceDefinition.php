<?php

class ServiceDefinition extends DataObject implements PermissionProvider {
	public static $db = array(
		'Name' => 'Varchar(255)',
		'URL' => 'Varchar(255)',
		'Order'=>'Int'
	);

	public static $searchable_fields = array(
		'Name',
		'URL'
	);

	public static $summary_fields = array(
		'Name'=>'Name',
		'URL'=>'URL'
	);

	public static $default_sort = 'Order';
	
	public function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->removeByName('Order');
		return $fields;
	}

	public function canView($member = null) {
		return true;
	}

	public function canEdit($member = null) {
		return Permission::check('DEFINITION_EDIT');
	}

	public function canDelete($member = null) {
		return Permission::check('DEFINITION_DELETE');
	}

	public function canCreate($member = null) {
		return Permission::check('DEFINITION_CREATE');
	}

	public function providePermissions() {
		return array(
			'DEFINITION_EDIT' => array(
				'name' => 'Edit a definition',
				'category' => 'Definitions',
			),
			'DEFINITION_DELETE' => array(
				'name' => 'Delete a definition',
				'category' => 'Definitions',
			),
			'DEFINITION_CREATE' => array(
				'name' => 'Create a definition',
				'category' => 'Definitions'
			)
		);
	}

}
