    
    <div class="ganhos index">
        
        <div id="contentHeader">
            
            <?php   echo $this->element('ganho_menu'); ?>
            
            <div class="buscar">
                
                <?php
                    echo $form->create('Ganho',
                                        array('type' => 'get',
                                              'action' => 'search',
                                              'inputDefaults' => array('label' => false)));   
                ?>
                <span>Buscar</span>
                <p>FATURAMENTOS</p>
                
                <?php
                    /*
                    echo $form->input('observacoes',
                                        array('style' => 'float: left;width: 180px; padding: 6px; height: 16px; margin: 1px 5px 0 0;',
                                              'maxlength' => '50',
                                              'default' => isset($this->params['named']['observacoes']) ? $this->params['named']['observacoes'] : null
                                              ));   
                    */
                    echo $form->input('fonte_id',
                                        array('empty' => 'Fontes',
                                              'div' => array('class' => 'formSearchDiv'),
                                              'class' => 'formSearchSelect',
                                              'selected' => isset($this->params['named']['fonte_id']) ? $this->params['named']['fonte_id'] : null));   
                ?>
                <div class="formSearchDiv">
                <?php
                    echo $form->month(false,
                                        isset($this->params['named']['month']) ? $this->params['named']['month'] : null,
                                        array(__('monthNames',true),
                                              'empty' => 'Mês',
                                              'class' => 'formSearchSelect'));
                ?>
                </div>
                <div class="formSearchDiv">
                <?php
                    echo $form->year(false,
                                        $minYear = '2010',
                                        $maxYear = '2010',
                                        isset($this->params['named']['year']) ? $this->params['named']['year'] : null,
                                        array('empty' => 'Ano',
                                              'class' => 'formSearchSelect'));
                ?>
                </div>
                <input type="image" value="" class="botao" />

            </div>
            
        </div>
        
        <div class="balancoBotoesWraper">
            
        <div class="balancoBotoes">
            <p>
            <?php
                if(!isset($listar)){
                    echo '« '.$html->link('voltar a listagem inicial', array('action' => 'index'), array('class' => 'link_headers'));
                }
            ?>
            
            
            
            <?php
                if(isset($faturamentos)){
            ?> 
                <p>Faturamento: <b><?php echo $faturamentos; ?></b></p>
                <p>Gastos: <b><?php echo $despesas; ?></b></p> 
                <p>Saldo: <b><?php echo $saldo; ?></b></p> 
            <?php
                }else{
                
                echo $total;
            ?>
                <p>|</p>
                <?php   if( !empty($groupPorData) && isset($paginator) ){    ?>
                
                <span class="pagina">Página</span>
                <p><?php echo $paginator->counter(array('format' => __('%page%',true))); ?></p>
                <span class="pagina">de</span>
                <p><?php echo $paginator->counter(array('format' => __('%pages%',true))); ?></p>
                <p>|</p>
                <p><?php echo $paginator->counter(array('format' => __('%count%',true))); ?></p>
                <span class="pagina">Registros</span>
                <?php   }   ?>
                
                <?php   }      ?>
            </p>

            <div class="headeraddlinks">
                <?php echo $this->Html->link('INSERIR NOVA FONTE',
                                        array('controller' => 'fontes',
                                              'action' => 'add'),
                                        array('class' => 'btnadd')); ?>
            </div>
            <div class="headeraddlinks">
                <?php echo $this->Html->link('INSERIR FATURAMENTO',
                                        array('controller' => 'ganhos',
                                              'action' => 'add'),
                                        array('class' => 'btnadd')); ?>
            </div>
            
        </div>
        
        </div>
        
        <div class="relatoriosWraper">
            
            <div id="relatorioRapido">
                
                <div class="titulos">
                    <h2>Relatórios <span>RÁPIDOS</span> </h2>
                </div>
                
                <ul id="mesesRelatorio">
                    <?php foreach($objMeses as $meses): ?>
                        <li>
                            <?php
                                if(isset($this->params['pass'][0]) && $this->params['pass'][0] == $meses['numMes'])
                                    echo $meses['mes'];
                                else
                                    echo $this->Html->link($meses['mes'],
                                                    array('action' => 'index',
                                                          $meses['numMes'],
                                                          $meses['ano']),
                                                    array('class' => 'relatoriosLinks'));
                            ?>
                        </li>
                    <?php endforeach; ?>    
                </ul>
            
            </div>
        
        </div>
        
        <cake:nocache>
        <?php   echo $this->Session->flash(); ?>
        </cake:nocache>
        
        <div class="registrosWraper">
        
            <ul id="list">
                
                <?php
                        foreach($groupPorData as $data){
                        $num = count($data['registro']);
                        $count = 1;
                ?>
                
                <li class="registrosPorData">
                    <div class="groupdata">
                    <?php  echo $data['dia']; ?>
                    </div>
                    
                    <?php   foreach($data['registro'] as $registro){  ?>
                    
                    <div class="registros <?php if($count < $num) echo 'borda-inferior'; ?>" id="ganho-<?php echo $registro['Ganho']['id']; ?>">
                    
                        <div class="" style="">
                            <span class="valor">
                                R$ <?php  echo $registro['Ganho']['valor']; ?>
                            </span>
                            <?php echo $registro['Fonte']['nome']; ?>
                        </div>
                        
                        <?php echo $registro['Ganho']['observacoes']; ?>
                        
                        <div class="linksRegistros">
                        <?php   echo $html->link('',
                                                array('action' => 'edit', $registro['Ganho']['id'], time()),
                                                array('class' => 'colorbox-edit editar')
                                                ); ?> 
                        <?php   echo $html->link('',
                                                 array('action' => 'delete', $registro['Ganho']['id'], time()),
                                                 array('class' => 'colorbox-delete excluir')
                                                 ); ?>
                        </div>  
                        
                            
                    </div>
                    
                    <?php   $count++;}   ?>
                
                </li>
                
                <?php   }   ?>
                
            </ul>
            
            <?php   if( !empty($groupPorData) && isset($paginator) ){    ?>
            <div class="paging">
                <?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
             | 	<?php echo $paginator->numbers();?>
             |  <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
            </div>
            <?php   }   ?>
        
        </div>
        
    </div>
        
    <script type="text/javascript">
        // <![CDATA[
        $(document).ready(function () {
            $('.colorbox-delete').colorbox({width:"60%", height: '220', opacity: 0.5, iframe: true});
            $('.colorbox-edit').colorbox({width:"60%", height: "530", opacity: 0.5, iframe: true});
            
            $(".registros").mouseover(function() {
                $(this).css("background-color",'#F2FFE3');
            }).mouseout(function(){
                $(this).css("background-color",'#FFF');
            });
        });
        // ]]>
    </script>