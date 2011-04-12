 
    <div class="ganhos index">
        
        <div id="contentHeader">
            
            <h1>Movimentações</h1> 
            
        </div>
        
        <div class="balancoBotoesWraper">
            
        <div class="balancoBotoes">

        </div>
        
        </div>
        
        <div class="relatoriosWraper">
            
            <div id="relatorioRapido">
                
                <div class="titulos">
                    <h2>Relatórios <span>RÁPIDOS</span> </h2>
                </div>
                
            </div>
        
        </div>
        
        <?php   echo $this->Session->flash(); ?>
        
        <div class="tableWraper">
        
            <p class="saldoGeral">
            </p>
             
            <table cellpadding="0" cellspacing="0" class="tabelaListagem">
                <?php foreach ($moves as $move): ?>
                <tr id="moveId<?= $move['Move']['id'];?>" class="registros">
                    <td width="80">
                        <?= $this->Time->format('d-m-Y', $move['Move']['data']); ?>
                    </td>
                    <td width="20" class="<?= $move['Move']['color']; ?>">
                        <b><?= $move['Move']['tipo']; ?></b>
                    </td>
                    <td class="<?= $move['Move']['color']; ?>" width="100">
                        <?= $move['Move']['valor']; ?>
                    </td>
                    <td width="150">
                        <?= $move['Categoria']['nome']; ?>
                    </td>
                    <td>
                        <?= $move['Move']['obs']; ?>
                    </td>
                    <td class="actions">
                        <?= $this->Html->link('EDITAR',
                                    array('action' => 'edit', $move['Move']['id']),
                                    array('class' => 'colorbox-edit btneditar',
                                          'title' => 'Editar move')); ?> 
                        <?= $this->Html->link('DELETE', 
                                        array('action' => 'delete', $move['Move']['id']),
                                        array('class' => 'colorbox-delete btnexcluir',
                                              'title' => 'Excluir move')); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        
        </div>
        
    </div>
        
    <script type="text/javascript">
        // <![CDATA[
        $(document).ready(function () {
            $('.colorbox-delete').colorbox({width:"500", height: '220', opacity: 0.5, iframe: true});
            $('.colorbox-edit').colorbox({width:"800", height: "480", opacity: 0.5, iframe: true});
            
            $(".registros").mouseover(function() {
                $(this).css("background-color",'#F2FFE3');
            }).mouseout(function(){
                $(this).css("background-color",'#FFF');
            });
        });
        // ]]>
    </script>