<?php
/**
* Management interface for Definitions
*
* @package taxonomy
*/

class DefinitionAdmin extends ModelAdmin {

	public static $url_segment = 'definitions';
	public static $managed_models = array('ServiceDefinition', 'TypeDefinition');

	public static $menu_icon = "definitions/images/support.png";

	public static $menu_title = 'Definitions';

	public function getEditForm($id = null, $fields = null){
		$form = parent::getEditForm($id, $fields);
		
		$gridField = $form->Fields()->fieldByName(
			$this->sanitiseClassName($this->modelClass)
		);
		$gridField->getConfig()->addComponents(
			new GridFieldAddExistingAutocompleter('buttons-before-left'),
			$filter = new GridFieldFilterHeader(),
			new GridFieldEditButton(),
			new GridFieldDeleteAction(true),
			new GridFieldDetailForm(),
			new GridFieldSortableRows('Order')
		);

		return $form;
	}

}
