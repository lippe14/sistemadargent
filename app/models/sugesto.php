<?php

    class Sugesto extends AppModel {
        var $name = 'Sugesto';
        //var $useTable = 'sugestoes';
        var $displayField = 'titulo';
        
        var $validate = array(
            'titulo' => array(
                'notempty' => array('rule' => array('notempty'), 'message' => 'Campo obrigatório', 'last' => true),
                'between' => array('rule' => array('between', 3, 150), 'message' => 'O título deve ter entre 3 e 150 caracteres')
                
            ),
            'texto' => array(
                'notempty' => array('rule' => array('notempty'), 'message' => 'campo obrigatório'),
            ),
        );
        
        var $belongsTo = array(
                'Usuario' => array(
                    'className' => 'Usuario',
                    'foreignKey' => 'usuario_id',
                    'conditions' => '',
                    'fields' => 'id, nome, email',
                    'order' => ''
                ),
        );
        //The Associations below have been created with all possible keys, those that are not needed can be removed
    }
    
?>