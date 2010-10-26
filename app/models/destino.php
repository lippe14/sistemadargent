<?php
class Destino extends AppModel {

    var $displayField = 'nome';
    
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Gasto' => array(
			'className' => 'Gasto',
			'foreignKey' => 'destino_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'valor',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => true,
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'Agendamento' => array(
			'className' => 'Agendamento',
			'foreignKey' => 'destino_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => 'valor',
			'order' => '',
			'limit' => '',
			'offset' => '',
            # eclude -> does the delete with a deleteAll() call
            #, instead of deleting each entity separately.
            # This greatly improves performance, but may not be ideal for all circumstances
			'exclusive' => true, 
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
    
    var $validate = array(
	
		'nome' => array(
            'rule1' => array(
			    'rule' => 'notEmpty',
			    'required' => true,
			    'message' => 'Digite o nome'
            ),
            'rule2' => array(
                'rule' => array('between',0,30),
                'message' => 'No máximo 30 caracteres',
                'last' => true
            ),
            'usuario_id' => array(
                    'rule' => 'notEmpty',
                    'required' => true,
            ),
		)

	);
    
    function beforeSave(){
    
        App::import('Sanitize');
        Sanitize::html(&$this->data['Destino']['nome'],array('remove'=>true));
        return true;
    }

}
?>