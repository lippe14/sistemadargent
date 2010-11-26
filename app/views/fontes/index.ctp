    
    
    <div class="fontes index">
        
        <div id="contentHeader">    
            <?php   echo $this->element('fonte_menu'); ?>
            <?php   echo $this->Session->flash(); ?>
        </div>
        
        
        <div class="balancoBotoesWraper">

            <div class="balancoBotoes">
                <?php if(isset($numRegistros)){ ?>
                    <?php echo $numRegistros; ?> Categorias listadas
                <?php }   ?>
                
                <div class="headeraddlinks">
                    <?php echo $this->Html->link('INSERIR FATURAMENTO',
                                        array('controller' => 'ganhos',
                                              'action' => 'add'),
                                        array('class' => 'btnadd')); ?>
                </div>
                <div class="headeraddlinks">
                    <?php echo $this->Html->link('INSERIR NOVA FONTE',
                                        array('controller' => 'fontes',
                                              'action' => 'add'),
                                        array('class' => 'btnaddcategoria')); ?>
                </div>
                
            </div>
            
        </div>
        
        <div class="relatoriosWraper">
            <div id="relatorioRapido">
                <p class="painelHelp">
                    - Lista de categorias habilitadas dos faturamentos com a porcentagem de participação da categoria e o último faturamento associado a mesma.<br />
                    - Só podem ser excluídas as Fontes que não possuem relação com qualquer registro
                </p>
            </div>
        
        </div>
        
        <div class="categoriasWraper">
            <div class="categorias">
            
                <ul id="list-categorias">
                <?php
                foreach ($porcentagens as $key => $porcentagem):
        
                ?>
                    <li id="fonte-<?php echo $fontes[$key]['Fonte']['id']; ?>" class="registros">
                        <div style="height: auto; overflow: hidden;">
                            
                            <div class="" style="height:auto; overflow:hidden;	padding: 5px 0;">
                                
                                <span class="categoria_nome" id="nome-<?php echo $fontes[$key]['Fonte']['id']; ?>">
                                    <?php echo $fontes[$key]['Fonte']['nome']; ?>
                                </span>
                                
                                <span class="valor">
                                    <?php echo $fontes[$key]['Fonte']['porcentagem']; ?> %
                                </span>
                            </div>
        
                            <div style="float: right;margin-top:-23px;">
                                <?php echo $fontes[$key]['Fonte']['modified']; ?>
                            </div>
                            
                            <div style="clear: both;">
                                <?php if( isset($fontes[$key]['Ganho']) ){   ?>
                                Última interação: R$ <?php echo $fontes[$key]['Ganho']['valor']; ?> em <?php echo $fontes[$key]['Ganho']['datadabaixa']; ?>
                                <?php }else{   ?>
                                Não há registros relacionados a essa categoria
                                <?php } ?>
                            </div>                            
                            
                        </div>
                        <div class="categ-actions">
                            
                            <?= $this->Html->link('EDITAR',
                                            array('action' => 'edit', $fontes[$key]['Fonte']['id'], time()),
                                            array('class' => 'colorbox-edit btneditar')
                                            );
                            ?>
                            
                            <?php if( !isset($fontes[$key]['Ganho']) ){   ?>
                                <?= $this->Html->link('EXCLUIR',
                                                array('action' => 'delete', $fontes[$key]['Fonte']['id'], time()),
                                                array('class' => 'colorbox-delete btnexcluir')
                                                );
                                ?>
                            <?php } ?>
                        </div>
                    </li>
        
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
        
        <!--
        <div class="paging">
            <?php //echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
         | 	<?php //echo $paginator->numbers();?>
            <?php //echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
        </div>    
        -->
        
    </div>
    
    <script type="text/javascript">
        $(document).ready(function () {
            
            $('.colorbox-delete').colorbox({width:"60%", height: '220', opacity: 0.5, iframe: true});
            $('.colorbox-edit').colorbox({width:"60%", height: "300", opacity: 0.5, iframe: true});
            
            $("li.registros").mouseover(function() {
                $(this).css("background-color",'#F2FFE3');
            }).mouseout(function(){
                $(this).css("background-color",'#FFF');
            });
            
        });
                
    </script>
    
    
    
    
    

